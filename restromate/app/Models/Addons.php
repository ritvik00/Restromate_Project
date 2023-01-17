<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;
    protected $table='addons';
    protected $primarykey ='id';
    protected $fillable = [
        'title',
        'image',
        'description',
        'verified',
        'calories',
        'price',
        'user_id'
        
    ];
}
