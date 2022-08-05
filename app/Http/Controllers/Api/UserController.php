<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::select(
                'id',
                'name',
                'role',
                'jurisdiction',
                'email',
                'email_varified as verified',
                'phone_number',
                'deleted_at as status'
            )
                ->with('images')
                ->with('roles')
                ->withTrashed()
                ->orderByDesc('id')
                ->get()->toArray();
            if (count($users) > 0) {
                $data = [];
                foreach ($users as $key => $value) {
                    if ($value['roles'][0]['name'] === 'Admin') {
                        continue;
                    }
                    array_push($data, $value);
                    $dataindex = count($data) - 1;
                    $data[$dataindex] = $value;
                    $data[$dataindex]['images'] = $value['images'] ? $value['images']['path'] : '';
                    $data[$dataindex]['verified'] = $value['verified'] === 0 ? false : true;
                    $data[$dataindex]['status'] = $value['status'] ? false : true;
                }
            }
            return response()->json(['status' => true, 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function TotalUsers()
    {
        try {
            $User = User::all();
            $total = count($User);
            return response()->json(['status' => true, 'data' => $total]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function create(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'name' => ["required", 'regex:/^[a-zA-Z ]*$/'],
                'role' => 'required',
                'jurisdiction' => 'required',
                'email' => ["required", "regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/", "unique:users,email"],
                'phone_number' => 'required',
                'password' => ["required", "min:8", "regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-+]).{8,}$/"]
            ], [
                'name.required' => "What's your name",
                'name.regex' => 'Only alphabetic characters are allowed',
                'role.required' => 'Please tell us your role',
                'jurisdiction.required' => 'What is your jurisdiction',
                'email.required' => "What's your email",
                'email.regex' => 'Invalid Email',
                'phone_number' => 'What is your phone number',
                'password.required' => 'What will be the password that you choose',
                'password.min' => 'Password should be 8 characters long',
                'password.regex' => 'Password should have atleast an upperercase, lowercase, digit and symbol'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
            }

            $upload = $req->all();
            $upload['password'] = Hash::make($upload['password']);
            $user = User::create($upload);
            $user->assignRole('User');
            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function StatusChange($id)
    {
        try {
            if ($id) {
                $user = User::withTrashed()->where('id', $id)->first();
                if ($user) {
                    if ($user->deleted_at === null) {
                        $user->delete();
                    } else {
                        $user->deleted_at = null;
                        $user->save();
                    }
                    return response()->json(['status' => true]);
                }
                return response()->json(['status' => false, 'type' => 'developer', 'message' => 'Not Found']);
            }
            return response()->json(['status' => false, 'type' => 'developer', 'message' => 'Id is required']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function ChangePassword(Request $req)
    {
        try {
            if ($req->id) {
                $validator = Validator::make($req->all(), [
                    'password' => ["required", "min:8", "regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-+]).{8,}$/"]
                ], [
                    'password.required' => 'What will be the password that you choose',
                    'password.min' => 'Password should be 8 characters long',
                    'password.regex' => 'Password should have atleast an upperercase, lowercase, digit and symbol'
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
                }

                $user = User::find($req->id);
                if ($user) {
                    $password = Hash::make($req->password);
                    $user->password = $password;
                    $user->save();
                    return response()->json(['status' => true]);
                }
            }
            return response()->json(['status' => false, 'type' => 'developer', 'message' => 'Id is required']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function VerifyUser($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->email_varified = 1;
                $user->save();
                return response()->json(['status'=>true]);
            }
            return response()->json(['status'=>false, 'type'=>'developer', 'message'=>'Not Found']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
}
