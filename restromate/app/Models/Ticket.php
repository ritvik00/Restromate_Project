<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table='ticket';
    protected $primarykey ='id';
    protected $fillable = [
        'ticket_name',
        'user_id',
        'subject',
        'email',
        'description',
        'status'
    ];
}
