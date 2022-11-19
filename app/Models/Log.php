<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $timestamp = false;

    protected $guarded = [];

    public static function writeLog($subject, $description, $admin)
    {
        return self::insert([
            'subject' => $subject,
            'description' => $description,
            'admin' => $admin,
        ]);
    }
}
