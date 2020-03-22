<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    //用户的创建
	public function create()
	{
		return view('users.create');
	}

	//展示用户的方法
	public function show(User $user) 
	{
		return view('users.show', compact('user'));
	}

}
