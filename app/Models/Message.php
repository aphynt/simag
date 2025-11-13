<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
    ];

    /**
     * User pengirim pesan
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    /**
     * User penerima pesan
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function scopeChatBetween($query, $authId, $userId)
    {
        return $query->where(function($q) use ($authId, $userId) {
            $q->where('from_user_id', $authId)->where('to_user_id', $userId);
        })->orWhere(function($q) use ($authId, $userId) {
            $q->where('from_user_id', $userId)->where('to_user_id', $authId);
        });
    }

}
