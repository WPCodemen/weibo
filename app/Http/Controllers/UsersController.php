<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{

    //Laravel 内置了一些中间件，例如身份验证，CSRF 保护等，所有中间件文件都放在
    // app/Http/Middleware 文件夹中 
    //我们使用 Laravel 提供的身份验证 （Auth）中间件来过来未登录用户的 edit , update 动作

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    //用户列表
    public function index()
    {
        //获取所有的用户数据
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

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
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        //数据入库的操作
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //让用户直接登录
        Auth::login($user);

        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        return redirect()->route('users.show', [$user]);
    }

    //编辑用户信息
    public function edit(User $user)
    {
        //添加验证
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    //用户信息的更新操作
    public function update(User $user, Request $request)
    {
        //添加更新验证
        $this->authorize('update', $user);  

        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        //实例化一个数组
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success', '个人资料更细成功！');

        return redirect()->route('users.show', $user->id);   
    }

}
