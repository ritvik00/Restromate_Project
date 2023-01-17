<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table='partners';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'type',
        'profile',
        'workingdays',
        'description',
        'city',
        'cookingtime',
        'address',
        'addressproof',
        'latitude',
        'longitude',
        'verified',
        'owner_name',
        'owner_mobile',
        'owner_email',
        'password',
        'owner_identity',
        'licence_name',
        'licence_code',
        'licence_proof',
        'licence_approval',
        'tax_name',
        'tax_number',
        'account_number',
        'account_name',
        'bank_code',
        'bank_name',
        'user_id'
    ];
}
