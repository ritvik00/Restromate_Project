<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>payroll Form</title>
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
    <form action="payrolls" method="post">
    @csrf
		<h2>PAYROLL</h2>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="number" class="form-control" name="EmployeeId" placeholder="Employee Id" >
				<span style="color:red">@error('FirstName'){{$message}}@enderror</span> </div>
				<div class="col"><input type="number" class="form-control" name="RagularHour" placeholder="Ragular Hour" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="number" class="form-control" name="OverTime" placeholder="Over Time" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="Bonus" placeholder="Bonus" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="OtherEarning" placeholder="Other Earning" required="required"></div>
				<div class="col"><input type="number" class="form-control" name="SickPay" placeholder="Sick Pay" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="number" class="form-control" name="VacationHours" placeholder="Vacation Hours" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="Comission" placeholder="Comission" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        <input type="number" class="form-control" name="Tax" placeholder="Tax" required="required">
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">Pay Date:-<input type="datetime-local" class="form-control" name="PayDate" placeholder="Pay Date" required="required"></div>
                <div class="col">IsActive:-
                    <select name="IsActive" class="form-control">
                    <option disabled="disabled" selected="selected">Choose Option</option>
                    <option value="true" >TRUE</option>
                    <option value="false" >FALSE</option>
                  </select>
                </div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col">CreatedOn:-<input type="datetime-local" name="CreatedOn" class="form-control"   required="required"/></div>
                <div class="col">ModifiedOn:-<input type="datetime-local" name="ModifiedOn" class="form-control"   required="required"/></div>
			</div>        	
			</div>        	
        <div class="form-group">
			<div class="row">
            <div class="col"><input type="number" class="form-control" name="CreatedBy"  placeholder="CreatedBy"  required="required" /></div>
			<div class="col"><input type="number" class="form-control" name="ModifiedBy" placeholder="ModifiedBy" required="required"></div>
			</div>        	
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
</div>
</body>
</html>