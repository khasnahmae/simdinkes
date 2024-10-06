<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'message', 'is_read'];

    // public static function createNotification($userId, $message)
    // {
    //     return self::create([
    //         'user_id' => $userId,
    //         'message' => $message,
    //     ]);
    // }
}
