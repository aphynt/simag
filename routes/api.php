<?php

use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Get user detail
Route::get('/users/{id}', [ChatController::class, 'getUserDetail']);

// Get messages between two users
Route::get('/messages/{userId}/{targetUserId}', [ChatController::class, 'getMessagesBetweenUsers']);

// Ambil semua pesan
Route::get('/messages/{user_id}', [ChatController::class, 'getMessages']);

// Kirim pesan
Route::post('/messages/send', [ChatController::class, 'sendMessage']);

Route::post('/messages/send-file', [ChatController::class, 'sendFile']);