<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use App\RoleUser;


use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        $data = [
            'roles' => $roles,  
            'users' => $users,
        ];
        return view('roleusers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('roleusers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('roleusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('roleusers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('roleusers');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userToChangeRole = User::find($id);
        $roleToChange = Role::find($request->role_id);

        if ($userToChangeRole->roles->where('id', $request->role_id)->count() == 0 && isset($roleToChange))
        {
            $userToChangeRole->roles()->save($roleToChange);
        }
        else if ($userToChangeRole->roles->where('id', $request->role_id)->count() > 0)
        {
            // $userToChangeRole->roles->where('id', $request->role_id)->delete();
            $userToChangeRole->roles()->detach($roleToChange);
        }
        return redirect('roleusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('roleusers');
    }
}
