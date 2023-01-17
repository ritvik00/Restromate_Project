<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payroll;
class PayrollController extends Controller
{
    function getData(Request $req)
    {
     $req->validate([
          'FirstName'=>'required  | max:10',
          'EmailId'=>'required  | min:15',
          'Password'=>'required  | min:5'
      ],
  [
      'name.required'=>'enter username',
      'password.min'=>'password min length  5'
  ]);
    // dd($req->all());
    $payroll= new payroll;
    $payroll ->EmployeeId=$req->EmployeeId;
    $payroll ->RagularHour=$req->RagularHour;
    $payroll ->OverTime=$req->OverTime;
    $payroll ->Bonus=$req->Bonus;
    $payroll ->OtherEarning=$req->OtherEarning;
    $payroll ->SickPay=$req->SickPay;
    $payroll ->VacationHours=$req->VacationHours;
    $payroll ->Comission=$req->Comission;
    $payroll ->PayDate=$req->PayDate;
    $payroll ->Tax=$req->Tax;
    $payroll ->IsActive=$req->IsActive;
    $payroll ->CreatedBy=$req->CreatedBy;
    $payroll ->CreatedOn=$req->CreatedOn;
    $payroll ->ModifiedBy=$req->ModifiedBy;
    $payroll ->ModifiedOn=$req->ModifiedOn;
    $payroll->save();
    
    return back()->with("success","Record inserted!!!");
    return redirect('showdata');
    //dd($req->all());
    }

    public function showdata(payroll  $payroll)
   {
        $payroll=payroll::all();
        return view('payroll.showdata',['payroll'=>$payroll]);
   }
   public function destroydata(payroll  $payroll,$PayrollId)
   {
        $payroll=payroll::find($PayrollId);
        $payroll->delete();
        return redirect('showdata');
   }

   public function editdata(payroll  $payroll,$PayrollId)
   {
        $payroll=payroll::find($PayrollId);
        return view('payroll.editdata',['payroll'=>$payroll]);
//$student->delete();
        return redirect('showdata');
   }
   public function updatedata(Request $req,payroll  $payroll,$PayrollId)
   {
           $payroll=payroll::find($PayrollId);
            $payroll ->EmployeeId=$req->get('EmployeeId');
            $payroll ->RagularHour=$req->get('RagularHour');
            $payroll ->OverTime=$req->get('OverTime');
            $payroll ->Bonus=$req->get('Bonus');
            $payroll ->OtherEarning=$req->get('OtherEarning');
            $payroll ->SickPay=$req->get('SickPay');
            $payroll ->VacationHours=$req->get('VacationHours');
            $payroll ->Comission=$req->get('Comission');
            $payroll ->PayDate=$req->get('PayDate');
            $payroll ->Tax=$req->get('Tax');
            $payroll ->IsActive=$req->get('IsActive');
            $payroll ->CreatedBy=$req->get('CreatedBy');
            $payroll ->CreatedOn=$req->get('CreatedOn');
            $payroll ->ModifiedBy=$req->get('ModifiedBy');
            $payroll ->ModifiedOn=$req->get('ModifiedOn');
        $payroll->save();
      return redirect('showdata');
      return back()->with("success","Record pdated!!!"); 
   }
}