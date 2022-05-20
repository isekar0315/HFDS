<?php
if (isset($_SESSION["name"])) {
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
          <ul class="nav__list">
            <div class="nav__close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
            </div>
			
			
            <div class="nav__list__wrapper">

              <li><label class="nav__link" ><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION["name"]; ?></label></li>
			  <li ><a class="nav__link" href="foodlist.php" ><span class="glyphicon glyphicon-cutlery"></span> Food List </a></li>
              <li><a class="nav__link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart  (<?php
				  if(isset($_SESSION["cart"])){
				  $count = count($_SESSION["cart"]); 
				  echo "$count"; 
					}
				  else
					echo "0";
				  ?>) 
			  </a></li>
			  
			  <li><a href="logout.php" style="color:  #26643b;font-family: Poppins;font-weight: 500;border-radius: 8px;font-size: 1.7rem;padding: 1.2rem 2rem;color: #e8e8e8;background: #26643b;"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
			</div> 
              
			
          </ul>
        </nav>
		
      </div>
    </div>
  </div>
<?php        
}
?>