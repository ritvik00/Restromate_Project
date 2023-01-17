<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firebase extends Model
{
    use HasFactory;
    protected $table='firebase';
    protected $primarykey ='id';
    protected $fillable = [
        'apikey',
        'authdomain',
        'databaseurl',
        'projectid',
        'storagebucket',
        'messagingsenderid',
        'appid',
        'user_id',
        'measurementid'
    ];
}
