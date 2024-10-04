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
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'level' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->input('password')),
            'level' => $request->level,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID

        ]);

        return redirect()->route('user.index')->with('success', 'Data User berhasil ditambahkan.');
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
    public function edit(string $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'level' => 'required|string|in:admin,operator,pemimpin',
        ]);

        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->update([
            'username' => $request->input('username'),
            'level' => $request->input('level'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect()->route('user.index')->with('success', 'Data User telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data User telah dihapus.');
    }
}
