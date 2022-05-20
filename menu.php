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
include_once 'inc/header.php';
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
		<title>Menu | HFDS-San Diego</title>
		<link rel="stylesheet" href="./css/reset.css"/>
		<link rel="stylesheet" href="./css/styles.css"/>
		<link rel="stylesheet" href="./css/globalStyles.css"/>
		<link rel="stylesheet" href="./css/components.css"/>
		<link rel="stylesheet" href="./css/about.css"/>
		<link rel="stylesheet" href="./css/loginpopup.css"/>
		<!-- aos library css  -->
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		  <!-- Add your custom css -->
		<link rel="stylesheet" href="./css/menu.css">
		<link rel="stylesheet" href="./css/home.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<style>
			.table-striped tbody tr:nth-child(odd) td,
			.table-striped tbody tr:nth-child(odd) th {
				background-color: #DFF0D8;
				font-size: 16px;
			}
			.table-striped tbody tr:nth-child(even) td,
			.table-striped tbody tr:nth-child(even) th {
				background-color: #FFFFFF;
				font-size: 16px;
			}
		</style>
		
	</head>
	<body>
	<!-- add login_signup.php here-->
	<?php 
	include_once 'inc/login_signup.php';
	?>
	<!-- Nav Section -->
		<div class="nav">
			<div class="container">
			  <div class="nav__wrapper">
				<a href="./index.php" class="logo">
				  <img src="./images/logo-removebg-preview_50.png" alt="Healthy Food Delivery Service">
				</a>
				<nav>
				  <div class="nav__icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					  class="feather feather-menu">
					  <line x1="3" y1="12" x2="21" y2="12" />
					  <line x1="3" y1="6" x2="21" y2="6" />
					  <line x1="3" y1="18" x2="21" y2="18" />
					</svg>
				  </div>
				  <div class="nav__bgOverlay"></div>
				  <ol class="nav__list">
					<div class="nav__close">
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="feather feather-x">
						<line x1="18" y1="6" x2="6" y2="18" />
						<line x1="6" y1="6" x2="18" y2="18" />
					  </svg>
					</div>
					
					<div class="nav__list__wrapper">

					<li><a class="nav__link" href="./index.php">Home</a></li>
					<li><a class="nav__link" href="./about.php">About</a></li>
					<li><a class="nav__link" href="./contact.php">Contact</a></li>
					<li><a class="btn primary-btn" onclick="document.getElementById('id01').style.display='block'" >Place Order</a></li>
					</div>
					
					
				  </ol>
				</nav>
			  </div>
			</div>
		</div>
		<div class="container box">
			<div class="table-responsive">
				<br />
				<div class="whyUs__left" data-aos="fade-right">
          <h2 class="whyUs__title">
           The #1 Healthiest Menu Option
          </h2>
          <p class="whyUs__text">
            Personal taste, family preferences, cultural influences, emotional reasons, health concerns, societal pressures, convenience, cost, and variety and quantity of the available offerings all come into play when we choose what to eat.
			We will guide you what is best for your health how to choose food based on your taste and preferences.
          </p>
        </div>
				<br /><br />
				<table id="foodlist_data" class="table table-bordered table-striped">
				<!-- <table id="foodlist_data" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"> -->
					<thead>
						<tr>
							<th></th>
							<th>Food</th>
							<th>Price($)</th>
							<th>Description</th>
							<th>Category</th>
							<th>Calories</th>
							<th>Fat</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Food Image</th>
							<th>Food</th>
							<th>Price($)</th>
							<th>Description</th>
							<th>Category</th>
							<th>Calories</th>
							<th>Fat</th>
						</tr>
					</tfoot>
				</table>
				
			</div>
		</div>
	 <!-- Footer -->


  <!-- End Footer -->

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>

	</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	
	var dataTable = $('#foodlist_data').DataTable({
		 "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0],
				"orderable":false,
			},
		],

	});
	
	
});
</script>