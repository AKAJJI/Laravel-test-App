<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit.users')){
            return redirect(route('admin.users.index'));
        }
        $role = Role::pluck('name','id');
        return view("admin.users.edit",compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input('role'));
        // dd($request->role);
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);
        $user->update($request->except('_token','_method')); //u can access every input data by using $request->name_of_the field ex: $request->role , $request->name
        $user->roles()->sync($request->input('role'));
            return redirect('/admin/users')->with('success','L\'article a bien été sauvegardé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete.users')){
            return redirect(route('admin.users.index'));
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')->with('success','L\'élément a bien été supprimé');
    }
}
