<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    /**
     * Store a newly created resource in storage.
     */
   
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       // Fetch available roles (you may adjust this based on your role retrieval logic)
       $roles = \Spatie\Permission\Models\Role::pluck('name', 'id');
        
       return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     dd(auth()->user());
    //     $user->syncRoles($request->input('roles', []));

    //     return redirect()->route('users.index')->with('success', 'User roles updated successfully!');
    // }
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update-user'); // Check authorization using a gate
    
        $user->syncRoles($request->input('roles', []));
    
        return redirect()->route('users.index')->with('success', 'User roles updated successfully!');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    
    
}
