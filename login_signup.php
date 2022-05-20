<?php
include_once "config/Database.php";

/*$eleId = “signup”;
$dom = new DOMDocument();
$dom->loadHTML($_SERVER['REQUEST_URI']);
$target_elem = $dom->getElementById($eleId);
if ($target_elem) {
    $target_elem-> setAttribute('style','display: block;');
}*/

$connection = Database::getConnection();

$error = '';
$stmt = '';
if (isset($_POST['signup'])) {
//$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$first_name = '';
$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

/*if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
$first_name_error = "First Name must contain only alphabets and space\n";
$error='1';
}*/
if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
$last_name_error = "Name must contain only alphabets and space";
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

if(strlen($error)==0){
	
			$stmt = $connection->prepare("
			INSERT INTO customer(`name`,`email`,`password`,`mobile`,`address`)
			VALUES(?,?,?,?,?)");
			
			$name = $last_name;
			$password = md5($password);
			
			$stmt->bind_param("sssss", $name,  $email, $password, $mobile, $address);			
			if($stmt->execute()){
				
				echo '<script>alert("Account was created successfully.")</script>';
			}
}
else{
	echo '<script>alert("Account was not created successfully.")</script>';
}

mysqli_close($connection);
}
?>
<div id="id01" class="modal">
  
  <form class="modal-content animate" role="form" action="" method="POST">
  
		<div class="container">
		
		  <div class="whyUs__item__icon">
		  <img src="./images/logo-removebg-preview_50.png"/>
		  </div>
		  
		  <label class="storeInfo__title"><b>Email</b></label>
		  <input class="storeInfo__text" type="text" name="email"id="email" placeholder="Enter your registered eMail Address" name="uname" required>

		  <label class="storeInfo__title"><b>Password</b></label>
		  <input class="storeInfo__text" type="password" name="password" id="password" placeholder="Enter your password" name="psw" required>
		  <input type="submit" style="font-family: Poppins;outline:none;font-weight: 500;font-size: 1.8rem;background: var(--orange-1);color: var(--white-1)" name="login" value="Login"/>
		  <!-- <button class="btn primary-btn" type="submit" name="login" value="Login" >Login</button> -->
		  <div>
			<label class="storeInfo__text"><b><br><br></b></label>
			<span class="storeInfo__text">Don't have an account? <a id="signuplink" href=""  style="color: orange" >Register Here</a></span>
			<span
			<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
			<?php } ?>
			</span>
			</div>
		</div>
	
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" role="form" action="" method="POST">
  
		<div class="container">
		
		  <div class="whyUs__item__icon">
		  <img src="./images/logo-removebg-preview_50.png"/>
		  </div>
		  
		 

		  <div class="form-group ">
		  <label class="storeInfo__title"><b>Name</b></label>
		  <input class="storeInfo__text" type="text" name="last_name"  placeholder="Enter your last name" name="uname" required>
		  <label class="text-danger"><?php if (isset($last_name_error)) echo $last_name_error; ?></label>
		  </div>

		  <div class="form-group ">		  
		  
		  <label class="storeInfo__title"><b>Address</b></label>
		  <input class="storeInfo__text" type="text" name="address" placeholder="Enter your delivery address" name="uname" required>
		  <label class="text-danger"><?php if (isset($address_error)) echo $last_name_error; ?></label>
		  </div>

		  <div class="form-group ">		  
		  <label class="storeInfo__title"><b>Email ID</b></label>
		  <input class="storeInfo__text" type="text" name="email" placeholder="Enter your email id" name="uname" required>
		  <label class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></label>
		  </div>

		  <div class="form-group ">		  
		  <label class="storeInfo__title"><b>Mobile No</b></label>
		  <input class="storeInfo__text" type="text" name="mobile" placeholder="Enter your mobile number" name="uname" required>
		  <label class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></label>
		  </div>

		  <div class="form-group ">		  
		  <label class="storeInfo__title"><b>Password</b></label>
		  <input class="storeInfo__text" type="password" name="password" placeholder="Enter the password" name="psw" required>
		  <label class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></label>
		  </div>
	  
		  <input 
				type="submit"  onsubmit="return false;"
				style="font-family: Poppins;outline:none;font-weight: 500;
				font-size: 1.8rem;background: var(--orange-1);
				color: var(--white-1)" 
				name="signup" id="signup" value="Signup"
		  />
		  
		  <div>
			<label class="storeInfo__text"><b><br><br></b></label>
			<!-- <span class="storeInfo__text">Already have a account? <a id="loginlink" href=""  style="color: orange" >Click Here</a></span>-->
			<span
			<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
			<?php } ?>
			</span>
			</div>
		</div>
	
  </form>
</div>

<script>
    window.addEventListener("load", () => {
        document.querySelector("#signuplink").addEventListener("click", e => {
            //alert("Clicked!");
            // Can also cancel the event and manually navigate
            e.preventDefault();
			
			return false;
            //window.location = e.target.href;
        });
		
		/*document.querySelector("#signup").addEventListener("click", e => {
            //alert("Clicked!");
            // Can also cancel the event and manually navigate
            e.preventDefault();
			
			return false;
            //window.location = e.target.href;
        });*/
    });
</script>

<script>
// Get the modal
var loginmodal = document.getElementById('id01');
var signupmodal = document.getElementById('id02');
var signuplink = document.getElementById('signuplink');
var loginlink = document.getElementById('loginlink');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == loginmodal) {
        loginmodal.style.display = "none";
    }
	else if(event.target == signupmodal){
		signupmodal.style.display = "none";
	}
	else if(event.target == signuplink){
		
		loginmodal.style.display = "none";
		signupmodal.style.display = "block";
	}
	
}
</script>

<?php  
if(isset($_POST["login"])){  

if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $pass=$_POST['password'];  
  
	$connection = Database::getConnection();
	
	$stmt = $connection->prepare("
			SELECT * FROM customer WHERE email='".$email."' AND password='12".$pass."'");
	
	$statement->execute();
	$result = $statement->fetchAll();
	$data = array();
	$row_count = $statement->rowCount();
	if($row_count){
		
		echo '<script>alert("Account was created successfully.")</script>';
	}
	
	else {  
		echo "Invalid username or password!";  
		//parent.window.location.reload();
    }  
  
} else {  
	$loginMessage = "failed";
    echo "All fields are required!";  
	
}  
}  
?>