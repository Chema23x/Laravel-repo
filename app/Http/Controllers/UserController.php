<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $users = User::all();
    return view('users.index', compact('users'));
    }

    public function show($id)
    {
    $user = User::findOrFail($id);
    return view('users.show', compact('user'));
    }

    public function create()
    {
    return view('users.create');
    }

    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'date_of_birth' => 'required|date',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'date_of_birth' => 'required|date',
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
    return redirect()->route('users.index')->with('success', 'El usuario ha sido eliminado correctamente.');
    }

    public function searchByName($name)
         {
         $users = User::where('name', 'like', '%' . $name . '%')->get();
         return response()->json($users);
    }

    public function filterByDateOfBirth(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $users = User::whereBetween('date_of_birth', [$start_date, $end_date])->get();
        return response()->json($users);
    }
}
