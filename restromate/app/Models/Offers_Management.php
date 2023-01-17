<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers_Management extends Model
{
    use HasFactory;
    protected $table='offers__management';
    protected $primarykey ='id';
    protected $fillable = [
        'type',
        'type_id',
        'image',
        'banner_image',
        'user_id',
        'verified'
        
    ];
}
