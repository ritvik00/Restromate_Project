<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $table='attributes';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'values',
        'verified'
        
    ];
}
