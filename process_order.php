<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';
include_once 'class/Order.php';

$db = Database::getConnection();

$customer = new Customer($db);
$order = new Order($db);

if(!$customer->loggedIn()) {	
	header("Location: login.php");	
}
include('inc/header.php');
?>

  <link rel="stylesheet" type = "text/css" href ="css/foods.css">

<?php include('inc/container.php');?>
<div class="container">
			<h1></h1>
			</div>
<div class="content">

	<div class="container-fluid">	
	
	<div class="container">
			<h1></h1>
			</div>
		<div class='row'>
		
			<?php 
				$addressResult = $customer->getAddress();
				$count=0;
				while ($address = $addressResult->fetch_assoc()) { 
				
				$order->customer_id = $address["id"];
				$order->customer_name = $address["name"];
				$order->email = $address["email"];
				$order->mobile = $address["mobile"];
				$order->address = $address["address"];
				
				}
				//echo '<script type="text/javascript">alert("'.$order->customer_name.'");</script>';
			?>	
			
			<?php if(!empty($_GET['order'])) {			
				$total = 0;
				
				$order->order_id = $_GET['order'];
				
				$order->ordersinsert();
				if(isset($_SESSION["cart"])) {
					foreach($_SESSION["cart"] as $keys => $values){					
						$order->item_id = $values["item_id"];
						$order->item_name = $values["item_name"];
						$order->item_price = $values["item_price"];
						$order->quantity = $values["item_quantity"];
						
						$order->orderitemsinsert();
						
					}
					unset($_SESSION["cart"]);	
				}				
			?>
			
			</div>
				<div class="container">
					<div class="jumbotron">
						<h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed Successfully.</h1>
					</div>
				</div>
				<br>
				<h2 class="text-center"> Thank you for Ordering! The ordering process is now complete.</h2>
				
				<h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: orange;"><?php echo $_GET['order']; ?></span> </h3>
				
				<h3 class="text-center">Enjoy our <a href="foodlist.php" style="color: orange">Food Items!</a></h3>
			<?php } else { ?>
				<h3 class="text-center">Enjoy our <a href="foodlist.php"  style="color: orange">Food Items!</a></h3>
			<?php } ?>	 
		</div>	  
    </div>	
<?php include('inc/footer.php');?>
