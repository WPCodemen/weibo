<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //创建用户
    public function create()
    {
    	return view('users.create');
    }

    //用户的展示
    public function show(User $user)
    {
    	return view('users.show', compact('user'));
    }

    //储存用户信息
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|uinque:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }

}
