<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiter extends Model
{
    use HasFactory;
    protected $table='waiter';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'restaurant_name',
        'image',
        'start_date',
        'verified'
    ];

}
