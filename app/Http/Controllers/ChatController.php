<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getMessages($userId)
    {
        $messages = Message::where('from_user_id', $userId)
            ->orWhere('to_user_id', $userId)
            ->with('sender', 'receiver')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($msg) {
                $msg->formatted_date = $msg->created_at->format('d-m-Y H:i');
                return $msg;
            });

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        try {
            $text = $request->message ?? '';
            if ($request->file('file')) {
                
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('chat_files', $fileName, 'public');

                $message = Message::create([
                    'from_user_id' => $request->from_user_id,
                    'to_user_id' => $request->to_user_id,
                    'message' => $text,
                    'file_path' => $filePath,
                    'file_name' => $file->getClientOriginalName(),
                    'file_size' => $file->getSize(),
                    'file_type' => $file->getMimeType(),
                ]);
            } else {
                $message = Message::create([
                    'from_user_id' => $request->from_user_id,
                    'to_user_id'   => $request->to_user_id,
                    'message'      => $text
                ]);
            }

            return response()->json([
                'status' => 'success',
                'data' => $message
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'detail' => $e,
            ], 500);
        }
    }

    
    public function getUserDetail($id)
    {
        $user = User::findOrFail($id);
        
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'is_online' => $user->is_online ?? false, // Sesuaikan dengan logic online Anda
        ]);
    }

    // Get messages between two users
    public function getMessagesBetweenUsers($userId, $targetUserId)
    {
        $messages = Message::where(function($query) use ($userId, $targetUserId) {
                $query->where('from_user_id', $userId)
                      ->where('to_user_id', $targetUserId);
            })
            ->orWhere(function($query) use ($userId, $targetUserId) {
                $query->where('from_user_id', $targetUserId)
                      ->where('to_user_id', $userId);
            })
            ->with('sender:id,name,avatar')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function($message) {
                return [
                    'id' => $message->id,
                    'message' => $message->message,
                    'from_user_id' => $message->from_user_id,
                    'to_user_id' => $message->to_user_id,
                    'file_path' => $message->file_path,
                    'file_name' => $message->file_name,
                    'file_size' => $message->file_size,
                    'file_type' => $message->file_type,
                    'created_at' => $message->created_at,
                    'formatted_date' => $message->created_at->format('H:i'),
                    'sender' => [
                        'id' => $message->sender->id,
                        'name' => $message->sender->name,
                        'avatar' => $message->sender->avatar,
                    ]
                ];
            });

        return response()->json($messages);
    }

    
    public function sendFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,txt|max:10240', // 10MB max
            'from_user_id' => 'required|integer',
            'to_user_id' => 'required|integer',
        ]);

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('chat_files', $fileName, 'public');

            $message = Message::create([
                'from_user_id' => $request->from_user_id,
                'to_user_id' => $request->to_user_id,
                'message' => $request->message,
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_type' => $file->getMimeType(),
            ]);

            // Load relationship untuk response
            $message->load('sender');

            return response()->json([
                'success' => true,
                'message' => $message,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error sending file: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function notifications($userId)
    {
        $messages = Message::where('to_user_id', $userId)
                            ->where('is_read', false)
                            ->with('sender')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return response()->json($messages);
    }

    public function markRead(Request $request)
    {
        Message::where('id', $request->id)->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function chatList($userId)
    {
        $authId = $userId;

        $allUser = User::where('id', '!=', $authId)
            ->get()
            ->map(function($u) use ($authId) {

                // last message
                $u->lastMessage = Message::where(function($q) use ($authId, $u) {
                    $q->where('from_user_id', $authId)
                    ->where('to_user_id', $u->id);
                })
                ->orWhere(function($q) use ($authId, $u) {
                    $q->where('from_user_id', $u->id)
                    ->where('to_user_id', $authId);
                })
                ->orderBy('created_at', 'desc')
                ->first();

                // unread count
                $u->unreadCount = Message::where('from_user_id', $u->id)
                    ->where('to_user_id', $authId)
                    ->where('is_read', false)
                    ->count();

                return $u;
            });

        return response()->json($allUser);
    }

    public function markReadMess(Request $request)
    {
        Message::where('from_user_id', $request->from_user_id)
            ->where('to_user_id', $request->to_user_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['status' => 'success']);
    }


}
