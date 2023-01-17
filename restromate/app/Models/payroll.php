<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    protected $table = 'payrolls';
    protected $primaryKey = 'PayrollId';
    protected $fillable = ['EmployeeId', 'RagularHour', 'OverTime','Bonus','OtherEarning','SickPay','VacationHours','Comission','PayDate','Tax','IsActive','CreatedBy','CreatedOn','ModifiedBy','ModifiedOn','RoleId']; 
    use HasFactory;
}
