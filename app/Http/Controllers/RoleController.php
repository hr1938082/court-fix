<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function createRole()
    {
        Role::create(['name'=>'User']);
    }

    public function assignRole()
    {
        $user = User::whereEmail('admin@court.com')->first();
        $user->assignRole('Admin');
    }


        
}
