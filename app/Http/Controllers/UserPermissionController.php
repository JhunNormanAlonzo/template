<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $my_id = Auth::user()->id;
        $users = User::whereNot('id', $my_id)
            ->whereHas('roles', function ($query){
                $query->where('name', 'Staff');
            })
            ->get();

        $permissions = Permission::all();

        return view('user-permissions.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('user-permissions.edit', compact('permissions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            $user = User::find($id);
            $permissions = $request->permissions ?? null;
            if($permissions === null){
                $user->syncPermissions([]);
            }else{
                $ids = array_map('intval', $permissions);
                $user->syncPermissions($ids);
            }


        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('user-permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
