<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        User::where('id', Auth::user()->id)->update(['last_activity' => now()]);
        
        return view('dashboard.index');
    }
}
