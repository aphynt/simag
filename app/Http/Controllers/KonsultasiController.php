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
        User::where('id', Auth::user()->id)->update(['last_activity' => now()]);

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
                if ($u->last_activity) {
                    $lastActivity = \Carbon\Carbon::parse($u->last_activity); // Convert last_activity to Carbon object
                    $u->is_online = $lastActivity->diffInMinutes(now()) <= 5; // Check if the user is active in the last 5 minutes
                } else {
                    $u->is_online = false; // User is offline if no last_activity
                }

                return $u;
            });

        return view('dashboard.konsultasi.index', compact('allUser'));
    }



}
