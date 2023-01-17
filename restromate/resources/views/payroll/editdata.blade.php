<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Update payroll Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background-image: radial-gradient( rgba(255,0,0,0), rgba(116, 153, 235, 0.788));
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 550px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: rgba(66, 64, 64, 0.774);
	border-radius: 3px;
	margin-bottom: 15px;
	background: #86868d71;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form action="/updatedata/{{$payroll ->PayrollId}}" method="post">
    @csrf
		<h2>PAYROLL</h2>
        <div class="form-group">
			<div class="row">
				<div class="col">EmployeeId:-<input type="number" class="form-control" name="EmployeeId" value="{{$payroll ->EmployeeId}}" required="required"></div>
				<div class="col">RagularHour:-<input type="number" class="form-control" name="RagularHour" value="{{$payroll ->RagularHour}}" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">OverTime:-<input type="number" class="form-control" name="OverTime" value="{{$payroll ->OverTime}}"  required="required"></div>
				<div class="col">Bonus:-<input type="text" class="form-control" name="Bonus" value="{{$payroll ->Bonus}}"  required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">OtherEarning:-<input type="text" class="form-control" name="OtherEarning" value="{{$payroll ->OtherEarning}}" required="required"></div>
				<div class="col">SickPay:-<input type="number" class="form-control" name="SickPay" value="{{$payroll ->SickPay}}" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">VacationHours:-<input type="number" class="form-control" name="VacationHours" value="{{$payroll ->VacationHours}}" required="required"></div>
				<div class="col">Comission:-<input type="text" class="form-control" name="Comission" value="{{$payroll ->Comission}}"  required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        Tax:-<input type="text" class="form-control" name="Tax" value="{{$payroll ->Tax}}"  required="required">
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">Pay Date:-<input type="datetime-local" class="form-control" name="PayDate" value="{{$payroll ->PayDate}}"  required="required"></div>
                <div class="col">IsActive:- 
                    <select name="IsActive"  class="form-control">
                    <option disabled="disabled" selected="selected"> Choose Option</option>
                    <option value="true" >TRUE</option>
                    <option value="false" >FALSE</option>
                  </select>
                </div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">CreatedOn:-<input type="datetime-local" name="CreatedOn" value="{{$payroll ->CreatedOn}}" class="form-control"   required="required"/></div>
                <div class="col">ModifiedOn:-<input type="datetime-local" name="ModifiedOn" value="{{ $payroll ->ModifiedOn}}" class="form-control"   required="required"/></div>
			</div>        	
			</div>        	
        <div class="form-group">
			<div class="row">
            <div class="col">CreatedBy:-<input type="number" class="form-control" name="CreatedBy" value="{{$payroll ->CreatedBy}}" required="required" /></div>
			<div class="col">ModifiedBy:-<input type="number" class="form-control" name="ModifiedBy" value="{{$payroll ->ModifiedBy}}" required="required"></div>
			</div>        	
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
</div>
</body>
</html>