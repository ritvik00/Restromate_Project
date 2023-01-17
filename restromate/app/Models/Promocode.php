<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $table='promocode';
    protected $primarykey ='id';
    protected $fillable = [
        'promocode',
        'image',
        'message',
        'verified',
        'start_date',
        'end_date',
        'discount',
        'discount_type',
        'repeat_use',
        'createdby',
        'modifiedby'
    ];
}
