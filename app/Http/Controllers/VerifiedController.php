<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class VerifiedController extends Controller
{
    //
    public function index($encodedNik)
    {
        $uuid = base64_decode($encodedNik);

        $data = Pengajuan::where('uuid', $uuid)->first();

        $user = User::where('id', $data->user_id)->first();
        return view('verified.index', compact('user'));
    }
}
