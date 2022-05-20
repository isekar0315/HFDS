<?php
class Order {	
   
	private $ordersItemsTable = 'orderlist';
	private $ordersTable = 'orders';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function orderitemsinsert(){		
		if($this->item_name) {
			// , `order_date`
			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->ordersItemsTable."(`food_id`, `name`, `price`, `quantity`, `order_id`)
			VALUES(?,?,?,?,?)");
			$this->item_id = htmlspecialchars(strip_tags($this->item_id));
			$this->item_name = htmlspecialchars(strip_tags($this->item_name));
			$this->item_price = htmlspecialchars(strip_tags($this->item_price));
			$this->quantity = htmlspecialchars(strip_tags($this->quantity));
			
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
			//$this->order_id = "12345";			
			$stmt->bind_param("isiii", $this->item_id, $this->item_name, $this->item_price, $this->quantity, $this->order_id);	
			
			if($stmt->execute()){
				return true;
			}
			
		}
	}	
	
	public function ordersinsert(){		
		if($this->order_id) {
			// , `order_date`
			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->ordersTable."(`id`,`customer_id`,`name`,`email`,`mobile`,`address`)
			VALUES(?,?,?,?,?,?)");
			
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
			//$this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
			//echo '<script type="text/javascript">alert("'.$this->customer_name.'");</script>';
			$stmt->bind_param("sissss", $this->order_id, $this->customer_id, $this->customer_name,$this->email,$this->mobile,$this->address);			
			if($stmt->execute()){
				return true;
			}		
		}
	}	
}
?>