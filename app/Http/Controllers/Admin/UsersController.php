<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.users.index');
    }
    public function create()
    {
        $roles = Role::all();
        $modeEdit = true;
        return view('admin.users.create',compact('roles'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->roles()->sync($request->roles);

       /*  User::create($request->all()); */
        return view('admin.users.index');
    }
    public function show(User  $user)
    {


    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $modeEdit = true;
        return view('admin.users.edit',compact('user','modeEdit','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

;        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id),],
        ]);



        $user->update([
            'name' => $request->name,
            'email' =>$request->email
        ]);

        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit',$user);

    }
    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('admin.users.index')->with('info','El Trabajdor se elimino');
    }


}
