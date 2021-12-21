<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        $user->password = '';
        return view('create', [
            'data' => $user,
            'cols' => ['name', 'email', 'password'],
            'desc' => ['Name', 'E-mail', 'Password'],
            'input_types' => ['text', 'email', 'password'],
            'route' => 'user'
        ]);
    }

    public function store() {
        $request = request();
        if (isset($request->id)) { // edit
            if (is_null($request->password)) {
                $validatedRequest = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
                ]);
            } else {
                $validatedRequest = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
                    'password' => ['required', Password::defaults()]
                ]);
                $validatedRequest['password'] = Hash::make($validatedRequest['password']);
            }
            $user = User::where('id', $request->id)->first();
            $user->update($validatedRequest);
            return redirect('/user');
        } else { // create
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', Password::defaults()]
            ]);
            User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => Hash::make($validatedRequest['password'])
            ]);
            return redirect('/user');
        }
    }

    public function destroy($id) {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/user');
    }
}
