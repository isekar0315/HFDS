<?php 
include_once 'config/database.php';
include_once 'class/Customer.php';

$db = Database::getConnection();

$customer = new Customer($db);

if($customer->loggedIn()) {	
	header("Location: foodlist.php");	
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {	
	$customer->email = $_POST["email"];
	$customer->password = $_POST["password"];	
	
	if($customer->login()) {
		header("Location: foodlist.php");	
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} //else {
	//$loginMessage = 'Fill all fields.';
//}
include('inc/header.php');
?>


<?php include('inc/container.php');?>
<div class="container">
			<h1></h1>
			</div>
<div class="content"> 
	<div class="container-fluid" style="padding-top:225px">			
        <div class="col-md-6">                    
		<div class="panel panel-info" >
			<div class="panel-heading" style="background:#FF9933">
				<div class="panel-title" ><b>HFDS-San Diego<b/> Food Order Portal</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal"  role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="Customer e-Mail Address" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="Enter the password" required>
					</div>						
					
					<!-- <div style="margin-bottom: 25px" > <a href="login.php"> Create New Account</a> </div> -->
					
					
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" style="background:#FF9933" name="login" value="Login" class="btn btn-info">
					</div>					
					<div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
					
					
				</form>   
			</div>                     
		</div>  
	</div>       
    </div>        
		
<?php include('inc/footer.php');?>
