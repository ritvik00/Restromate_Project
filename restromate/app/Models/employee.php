<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table='employees';
    protected $primarykey ='id';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'password',
        'address',
        'phone_no',
        'email',
        'department_id',
        'is_active',
        'createdby',
        'modifiedby',
        'date_of_brith',
        'home',
        'home_no',
        'work_phone',
        'hourly_rate',
        'salary',
        'start_date',
        'last_day_of_work',
        'companyid',
        'Photo'
    ];
    use HasFactory;
}
