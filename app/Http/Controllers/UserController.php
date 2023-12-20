<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public Function Index (Request $request)
       {
       // $users =\App\Models\User::pagination(10);
       $users = DB::table('users')
       ->when($request->input('name'), function ($query, $name) {
        return $query->where('name','like','%' . $name . '%');
       })
       ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.users.index', compact('users'));
       }
public function create()
{
    return view('pages.users.create');
}

public function store(StoreUserRequest $request)
{

    //dd($request->all());
    $data = $request->all();
    $data['password'] = Hash::make($request->password);
    \App\models\User::create($data);
    return redirect()->route('users.index')->with('success');
}

public function edit($id)
{
    $user = \app\Models\User::findOrFail($id);
    //$user = User::find($id);
    //$user = Post::findOrFail($id);
    return view('pages.users.edit', compact ('user'));
}

public function update(UpdateUserRequest $request, user $user)
{

    //dd($request->all());
    $data = $request->validated();
    //$user = \app\Models\Users::findOrFail($id);
    $user->update($data);
    return redirect()->route('users.index')->with('success');
}

}
