<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\Base64ToImage;

class AuthController extends Controller
{
    public function Login(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'email' => ['required', "regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/"],
                'password' => 'required'
            ], [
                'email.required' => "What's your email",
                'email.regex' => 'Invalid email',
                'password.required' => 'You can not login without password'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
            }

            $user = User::whereEmail($req->email)->with('roles')->first();
            if ($user && Hash::check($req->password, $user->password)) {
                if ($user->hasRole('Admin')) {
                    $token = $user->createToken('Admin');
                    return response()->json(['status' => true, 'data' => ['token' => $token->plainTextToken]]);
                }
                $validator->errors()->add('permission', 'unautorized');
                return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
            }
            $validator->errors()->add('email', 'Credentials are not matched');
            return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function getUserData()
    {
        try {
            $user = Auth::user();
            $data = [
                "name" => $user->name,
                "email" => $user->email,
                "isEmailVerified" => $user->email_varified ? true : false,
                "image" => $user->Images ? 'image/'.$user->Images->path : ""
            ];
            return response()->json(['status' => true, 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function Logout(Request $req)
    {
        try {
            $req->user()->currentAccessToken()->delete();
            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function updateProfile(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => ["required",'regex:/^[a-zA-Z ]*$/'],
        ],[
            'name.required' => "What's your name",
            'name.regex' => 'Only alphabetic characters are allowed',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        $user = $req->user();
        $upload = $req->all();
        if (!(count(explode('.',$upload['image'])) > 1)) {
            $image_data = $user->images()->first();
            if ($image_data) {
                $name = $image_data->path;
                Base64ToImage::singleBase64ToImage($upload['image'], $image_data, $name);
            }else{
                $imageableData = [
                    'imageable_type' => 'App\Models\User',
                    'imageable_id' => $user->id,
                ];
                Base64ToImage::singleBase64ToImage($upload['image'], $imageableData);
            }
        }
        $user->update($upload);
        return response()->json(['status'=>true]);
    }

    public function verifyUser(Request $req)
    {
        try {
            $validator = Validator::make($req->all(),[
                'password' => 'required'
            ],[
                'password.required' => 'Password is required'
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>false,'type'=>'user','message'=>$validator->getMessageBag()]);
            }

            $user = $req->user();
            if (Hash::check($req->password, $user->password)) {
                return response()->json(['status' => true]);
            }
            return response()->json(['status'=>false, 'type' => 'user', 'message' => ['password'=>['Incorrect Password']]]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
}
