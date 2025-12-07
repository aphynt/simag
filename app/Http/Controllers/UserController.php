<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $request->validate([
            'email' => 'nullable|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,gif|max:5120',
        ]);

        try {

            $userId = Auth::id();
            $updateData = [
                'email'          => $request->email,
                'program_studi'  => $request->program_studi,
                'no_hp'          => $request->no_hp,
                'semester'          => $request->semester,
                'ipk'          => $request->ipk,
                'updated_at'     => now(),
            ];

            if ($request->hasFile('avatar')) {

                $avatar     = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('profile'), $avatarName);

                $updateData['avatar'] = $avatarName;
            }

            User::where('id', $userId) ->update($updateData);

            return back()->with('success', 'Profil berhasil diperbarui');

        } catch (\Throwable $th) {

            return back()->with('error', 'Profil gagal diperbarui: ' . $th->getMessage());
        }
    }
}
