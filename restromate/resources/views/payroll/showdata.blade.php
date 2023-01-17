@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
 
    <title>PAYROLL</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
</head>
<body>
    <div>
        <h2 align="center">PAYROLL INFORMATION</h2>
        <table  border="2px" class="table ">
            <tr class="thead-dark">
                <th>PayrollId</th>
                <th>EmployeeId</th>
                <th>RagularHour</th>
                <th>OverTime</th>
                <th>Bonus</th>
                <th>OtherEarning</th>
                <th>SickPay</th>
                <th>VacationHours</th>
                <th>Comission</th>
                <th>PayDate</th>
                <th>Tax</th>
                <th> IsActive </th>
                <th> CreatedBy </th>
                <th> CreatedOn </th>
                <th> ModifiedBy </th>
                <th> ModifiedOn </th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            @foreach($payroll as $payroll)
            <tr >
                <td scope="row">{{$payroll ->PayrollId}}</td>
                <td>{{$payroll ->EmployeeId}}</td>
                <td>{{$payroll ->RagularHour}}</td>
                <td>{{$payroll ->OverTime}}</td>
                <td>{{$payroll ->Bonus}}</td>
                <td>{{$payroll ->OtherEarning}}</td>
                <td>{{$payroll ->SickPay}}</td>
                <td>{{$payroll ->VacationHours}}</td>
                <td>{{$payroll ->Comission}}</td>
                <td>{{$payroll ->PayDate}}</td>
                <td>{{$payroll ->Tax}}</td>
                <td>{{$payroll->IsActive}}</td>
                <td>{{$payroll->CreatedBy}}</td>
                <td>{{$payroll->CreatedOn}}</td>
                <td>{{$payroll->ModifiedBy}}</td>
                <td>{{$payroll->ModifiedOn}}</td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/deletedata/{{$payroll->PayrollId}}">Delete</a></td>
                <td><a class="btn btn-warning" href="/editdata/{{$payroll->PayrollId}}">Update</td> 
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
<script>
    @if(Session::has('success'))
    toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{{session('success')}}")
    @endif
</script>