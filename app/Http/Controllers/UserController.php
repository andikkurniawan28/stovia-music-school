<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $roles = Role::all();
        return view('user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        return User::handleRequestStore($request);
    }

    public function show($id)
    {
        $user = User::whereId($id)->get()->last();
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::whereId($id)->get()->last();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        return User::handleRequestUpdate($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return User::handleRequestDelete($request, $id);
    }
}
