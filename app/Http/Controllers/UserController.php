<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $users = User::findOrFail($id);

        return view('edituser', [
            'users' => $users
        ]);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->update($request->all());
    
        return redirect('/dashboard/user')->with('edituser', 'Berhasil update ' . $user->username);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if ($user) {

            $user->rents()->delete();

            $user->delete();

            return redirect('/dashboard/user')->with('destroyuser', 'Berhasil menghapus user');
        } else {
            return redirect('/dashboard/user')->with('destroyuser', 'User tidak ditemukan');
        }
    }

    public function edituserpassword($id){
        return view('edituserpassword', [
            'userId' => $id
        ]);

    }

    public function userpassword($id, Request $request){
        $user = User::find($id);

        $validated = $request->validate([
            'password' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return redirect('/dashboard/user');
    }

}
