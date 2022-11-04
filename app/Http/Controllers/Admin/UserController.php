<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      public function index()
    {
        $users = User::query()->paginate(6);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show',[
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'is_admin' => 'required',
        ]);
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
}
