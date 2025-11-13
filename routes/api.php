<?php

use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Get user detail
Route::get('/users/{id}', [ChatController::class, 'getUserDetail']);

// Ambil semua pesan
Route::get('/messages/{user_id}', [ChatController::class, 'getMessages']);
Route::post('/messages/send', [ChatController::class, 'sendMessage']);
Route::get('/messages/{userId}/{targetUserId}', [ChatController::class, 'getMessagesBetweenUsers']);
Route::post('/messages/send-file', [ChatController::class, 'sendFile']);
Route::get('/chat-list/{userId}', [ChatController::class, 'chatList']);
Route::post('/messages/mark-read', [ChatController::class, 'markReadMess']);

Route::get('/notifications/messages/{userId}', [ChatController::class, 'notifications']);
Route::post('/notifications/mark-read', [ChatController::class, 'markRead']);
