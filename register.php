<?php
require_once "config/Database.php";

$database = new Database();
$connection = $database->getConnection();

$error = '';
$stmt = '';
if (isset($_POST['signup'])) {
$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']); 
if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
$first_name_error = "First Name must contain only alphabets and space";
$error='1';
}
if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
$last_name_error = "First Name must contain only alphabets and space";
$error='1';
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please enter valid email id.";
$error='1';
}
if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
$error='1';
}       
if(strlen($mobile) < 10) {
$mobile_error = "Mobile number must be minimum of 10 characters";
$error='1';
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
$error='1';
}

if(strlen($error)==0){
	$sql="INSERT INTO customer(name, email, ,password) VALUES('$first_name', '$email', 'md5($password)')";
	mysqli_query($connection, $sql);
	
	
			$stmt = $connection->prepare("
			INSERT INTO customer(`name`,`email`,`password`)
			VALUES(?,?,?)");
			
			$name = $first_name . ' '. $last_name;
			$password = md5($password);
			
			$stmt->bind_param("sss", $name,  $email, $password);			
			if($stmt->execute()){
				
				
				
				echo '<script>alert("Account was created successfully.")</script>';
				
				
			}
}
else{
	echo "Error";
}

mysqli_close($connection);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HFDS-Create Account</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
<div class="content"> 
<div class="container-fluid" style="padding-top:150px;padding-left:225px">
 <div class="col-md-6"> 
<div class="panel panel-info" >
<div class="panel-heading" style="background:#FF9933">
 <div class="panel-title" >Create Account</div>                        
</div> 

<div style="padding-top:30px" class="panel-body" >
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group">
<label>First Name</label>
<input type="text" name="first_name" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($first_name_error)) echo $first_name_error; ?></span>
</div>
<div class="form-group">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($last_name_error)) echo $last_name_error; ?></span>
</div>
<div class="form-group">
<label>Address</label>
<input type="textarea" name="address" class="form-control" value="" maxlength="200" rows="10" required="">
<span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
</div>
<div class="form-group ">
<label>Email</label>
<input type="email" name="email" class="form-control" value="" maxlength="30" required="">
<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
</div>
<div class="form-group">
<label>Mobile</label>
<input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
<span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
</div>  
<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
</div>
<input type="submit" class="btn btn-primary" name="signup" value="Create">
<!--
<input type="submit" class="btn btn-primary" name="signup" value="submit">
Already have a account?<a href="login.php" class="btn btn-default">Login</a> -->
<div class="text-center">Already have a account? <a href="login.php">Click Here</a></div>
</form>
</div>
</div>
</div>    
</div>
</div>
</div>
</body>
</html>