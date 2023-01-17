<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickettype extends Model
{
    use HasFactory;
    protected $table='tickettype';
    protected $primarykey ='id';
    protected $fillable = [
        'ticket_name',
        'createdby',
        'modifiedby'
    ];
}
