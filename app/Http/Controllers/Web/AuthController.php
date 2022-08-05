<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\NewUserSignup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => ["required",'regex:/^[a-zA-Z ]*$/'],
            'role' => 'required',
            'jurisdiction' => 'required',
            'email' => ["required","regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/", "unique:users,email"],
            'phone_number' => 'required',
            'password' => ["required","confirmed", "min:8", "regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-+]).{8,}$/"]
        ],[
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

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        $upload= $req->all();
        $upload['password'] = Hash::make($upload['password']);
        $user = User::create($upload);
        $user->assignRole('User');
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password]) ) {
            $adminMail = User::role('Admin')->first();
            Mail::to($adminMail->email)->send(new NewUserSignup());
            return redirect()->route('home');
        }
    }
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(),[
                'email' => ['required',"regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/"],
                'password' => 'required'
            ],[
                'email.required' => "What's your email",
                'email.regex' => 'Invalid email',
                'password.required' => 'You can not login without password'
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = User::whereEmail($req->email)->first();
            if ($user->hasRole('User')) {
                return redirect()->route('home');
            }
            Auth::logout();
            $validator->errors()->add('email','Unauthorized');
            return back()->withErrors($validator)->withInput();
        }else{
            $validator->errors()->add('email','Your credentials are not corrent');
            return back()->withErrors($validator);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('splash');
    }
}
