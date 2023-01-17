<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table='tag';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'verified',
        'user_id'
        
    ];
}
