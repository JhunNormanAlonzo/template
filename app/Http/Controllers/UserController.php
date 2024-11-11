<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function App\Providers\warningDelete;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $my_id = Auth::user()->id;
        $users = User::whereNot('id', $my_id)
            ->whereHas('roles')
            ->get();
        warningDelete();
        return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required",
        ]);
        $role = Role::find($request->role_id);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles([$role]);


        if($role->name = "Administrator"){
            $permissions = Permission::all();
            $user->syncPermissions($permissions);
        }


        Alert::success('Success', 'Created Successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => "required",
            "email" => "required|email|unique:users,email,{$user->id}",
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $role = Role::find($request->role_id);

        $user->syncRoles([$role]);


        if($role->name = "Administrator"){
            $permissions = Permission::all();
            $user->syncPermissions($permissions);
        }

        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        Alert::success('Success', 'Deleted Successfully');
        return redirect()->route('users.index');
    }

    public function passwordReset(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($id);
        $password = Str::random(10);
        return view('users.password-reset', compact('user', 'password'));

    }

    public function updatePassword(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'password' => 'required'
        ]);


        $user->password_reset = $request->password_reset;
        $user->password = Hash::make($request->password);
        $user->save();


        Alert::success('Success', 'Password Updated Successfully');
        return redirect('home');
    }

    public function changePassword(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('users.password-change', compact('user'));
    }
}
