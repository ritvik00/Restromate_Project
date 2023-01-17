<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
    use HasFactory;
    protected $table='departments';
    protected $primarykey ='id';
    protected $fillable = [
        'department_name',
        'is_active',
        'createdby',
        'modifiedby',
        'companyid'
    ];
}
