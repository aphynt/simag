<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function list()
    {

        $data = User::all();
        return view('dashboard.user.list', compact('data'));
    }

    public function listInsert(Request $request)
    {

        $request->validate([
            'nim'       => 'nullable|string|max:50|unique:users,nim',
        ],
        [
            'nim.unique' => 'Maaf, NIP/NIM sudah ada!'
        ]);

        try {

            // Insert user
            $userId = User::insertGetId([
                'name'      => $request->name,
                'nim'       => $request->nim,
                'password'  => Hash::make('12345'),
                'role'      => $request->role,
                'avatar'    => 'default.jpg',
            ]);

            return redirect()->back()->with('success', 'User berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Gagal menambah user: ' . $e->getMessage());
        }
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

    public function resetPassword($id)
    {
        try {
            User::where('id', $id)->update([
                'password'  => Hash::make('12345'),
            ]);

            return redirect()->back()->with('success', 'Berhasil reset password');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Gagal reset password: ' . $th->getMessage());
        }
    }

    public function gantiPassword(Request $request)
    {

        $request->validate([
            'passwordLama' => 'required',
            'passwordBaru' => 'required|min:6',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (!Hash::check($request->passwordLama, $user->password)) {
            return back()->with('info', 'Password lama yang Anda masukkan salah.');
        }


        $user->password = Hash::make($request->passwordBaru);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
