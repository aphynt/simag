<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function update(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'email' => 'nullable|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,gif|max:5120',
        ]);

        $user = Auth::user();

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('profile'), $avatarName);
            $user->avatar = $avatarName;
        }


        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
