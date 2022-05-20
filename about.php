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
	<link rel="shortcut icon" href="./images/logo-removebg-preview.png" >
	<title>About | HFDS-San Diego</title>
		<link rel="stylesheet" href="./css/reset.css">
		<link rel="stylesheet" href="./css/styles.css">
		<link rel="stylesheet" href="./css/globalStyles.css">
		<link rel="stylesheet" href="./css/components.css">
		<link rel="stylesheet" href="./css/about.css">
		<link rel="stylesheet" href="./css/loginpopup.css"/>
		<!-- aos library css  -->
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		  <!-- Add your custom css -->
		<link rel="stylesheet" href="./css/menu.css">
		<link rel="stylesheet" href="./css/home.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
  
   <!--<div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      
      </div>
    </div>
  </div> -->
  <!-- End Nav Section -->
  <!-- Our Story Section -->
  <section id="ourStory" data-aos="fade-up">
    <div class="container">
      <div class="ourStory__wrapper">

        <div class="ourStory__img">
          <img src="./images/myteam.jpg" alt="HFDS">
        </div>
        <div class="ourStory__info">
          <h3 class="ourStory__title">
            Our Story
          </h3>
          <p class="ourStory__subtitle">
            It's all started since 1998
          </p>
          <p class="ourStory__text">
            Welcome to HFDS-San Diego. We take pride in delivering warm, friendly service and creating mouth-watering
            culinary delights for all. Using only the freshest locally sourced ingredients, we’ll ensure you have a
            dining
            experience to remember.
            <br><br>
            Since 1998, we are the perfect place for a romantic meal for two, a catch-up with friends, family parties,
            business meetings, and bringing loved ones together. With comfortable surroundings, affordable prices, and
            seating for up to 65 guests, we can cater for all occasions.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Our Story Section -->
  <!-- Our Goals -->
  <section id="ourGoals" data-aos="fade-down">
    <div class="container">
      <div class="ourGoals__info">
        <h3 class="ourGoals__title">
          Our Goals
        </h3>
		<h5 class="ourStory__subtitle">Good Food & Eat Right</h5>
        <p class="ourGoals__text">We believe healthy and nutritious food is a human right. 
Every aspect of our business was designed to make fresh, delicious food available to everyone, every table. <br>Our HFDS -San Diego kitchen allows us to chef-prepare meals efficiently and price them according to what each community can afford. 
Then we’ll bring the ready-to-eat meals to you at home, work, school, or on the go. Together we can build a just food system, where good food is affordable and accessible to all. 
<br><br>Will you join us in the fight for food justice?
        </p>
      </div>
      <div class="ourGoals__imgs__wrapper" data-aos="fade-up">
        <div class="ourGoals__img1">
          <img src="./images/myteam1.jpg" alt="kitchen img">
        </div>
        <div class="ourGoals__img2">
          <img src="./images/myteam2.jpg" alt="kitchen img">
        </div>
        <div class="ourGoals__img3">
          <img src="./images/myteam3.jpg" alt="kitchen img">
        </div>
      </div>
    </div>
  </section>
  <!-- End Our Goals -->
   <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer__wrapper">
        <div class="footer__col1">
          <div class="footer__logo">
            <img src="./images/logo-removebg-preview.png" alt="Healthy Food Delivery Service">
          </div>
          <p class="footer__desc">
            Fresh and delicious traditional Healthy Food Delivery Service's(HFDS-San Diego) food to delight the whole family.
          </p>
          
        </div>
        <div class="footer__col2">
          <h3 class="footer__text__title">
            Links
          </h3>
          <ol class="footer__text">
            <li>
              <a href="./index.php">Home</a>
            </li>
            <li>
              <a href="./menu.php">Menu</a>
            </li>
            <li>
              <a href="./about.php">About Us</a>
            </li>
            <li>
              <a href="./contact.php">Contact Us</a>
            </li>
          </ol>
        </div>
        <div class="footer__socials">
            <h4 class="footer__socials__title">Follow us</h4>
            <ol class="footer__socials__list">
              <li>
                <a href="https://www.facebook.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-instagram">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                  </svg>
                </a>
              </li>
            </ol>
          </div>
      </div>
    </div>
  </footer>

  <!-- End Footer -->

  <!-- aos scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom scripts -->
  <script src="./main.js"></script>
</body>

</html>