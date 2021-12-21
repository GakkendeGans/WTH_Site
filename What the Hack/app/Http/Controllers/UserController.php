<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        return view('index', [
            'data' => User::all(),
            'cols' => ['name', 'email'],
            'desc' => ['Name', 'E-mail'],
            'route' => 'user'
        ]);
    }

    public function show() {
        dd('show');
    }

    public function create() {
        return view('create', [
            'cols' => ['name', 'email', 'password'],
            'desc' => ['Name', 'E-mail', 'Password'],
            'input_types' => ['text', 'email', 'password'],
            'route' => 'user'
        ]);
    }

    public function edit($id) {
        $user = User::where('id', $id)->first();
        return view('create', [
            'data' => $user,
            'cols' => ['name', 'email'],
            'desc' => ['Name', 'E-mail'],
            'input_types' => ['text', 'email'],
            'route' => 'user'
        ]);
    }

    public function store() {
        $request = request();
        if (isset($request->id)) { // edit
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
            ]);
            $user = User::where('id', $request->id)->first();
            $user->update($validatedRequest);
            return redirect('/user/index');
        } else { // create
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', Rules\Password::defaults()]
            ]);
            User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => Hash::make($validatedRequest['password'])
            ]);
            return redirect('/user/index');
        }
    }

    public function destroy($id) {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/user/index');
    }
}
