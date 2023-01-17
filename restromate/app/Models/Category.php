<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'image',
        'banner_image',
        'verified',
        'user_id'
        
    ];
}
