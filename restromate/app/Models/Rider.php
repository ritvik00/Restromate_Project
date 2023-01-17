<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;
    protected $table='rider';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'address',
        'commission_method',
        'serviceble_city',
        'commission',
        'rating',
        'user_id'

    ];
}
