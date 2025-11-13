<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    //
    public function index()
    {
        $authId = Auth::id();

        $allUser = User::where('id', '!=', $authId)
            ->get()
            ->map(function($u) use ($authId) {

                // Last message
                $u->lastMessage = \App\Models\Message::where(function($q) use ($authId, $u) {
                    $q->where('from_user_id', $authId)
                    ->where('to_user_id', $u->id);
                })->orWhere(function($q) use ($authId, $u) {
                    $q->where('from_user_id', $u->id)
                    ->where('to_user_id', $authId);
                })
                ->orderBy('created_at', 'desc')
                ->first();

                // Unread count (pesan dari user itu ke kita)
                $u->unreadCount = \App\Models\Message::where('from_user_id', $u->id)
                    ->where('to_user_id', $authId)
                    ->where('is_read', false)
                    ->count();

                return $u;
            });

        return view('dashboard.konsultasi.index', compact('allUser'));
    }



}
