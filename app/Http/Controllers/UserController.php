<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::with('domains', 'plan')->latest()->paginate(20);
        return view('layouts.users', compact('users'));
    }
}
