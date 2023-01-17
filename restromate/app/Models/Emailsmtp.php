<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailsmtp extends Model
{
    use HasFactory;
    protected $table='emailsmtp';
    protected $primarykey ='id';
    protected $fillable = [
        'email',
        'password',
        'smtphost',
        'smtpport',
        'contenttype',
        'smtpencryption',
        'user_id'
    ];
}
