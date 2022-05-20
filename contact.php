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
  <title>Contact | HFDS-San Diego</title>
		<link rel="stylesheet" href="./css/reset.css">
		<link rel="stylesheet" href="./css/styles.css">
		<link rel="stylesheet" href="./css/globalStyles.css">
		<link rel="stylesheet" href="./css/components.css"/>
		<link rel="stylesheet" href="./css/about.css"/>
		<link rel="stylesheet" href="./css/loginpopup.css"/>
		<!-- aos library css  -->
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<!-- Add your custom css -->
		<link rel="stylesheet" href="./css/menu.css">
		<link rel="stylesheet" href="./css/home.css">
  <!-- Add your custom css -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
  <!-- End Nav Section -->
  <!-- Store Info Section -->
  <section id="storeInfo" data-aos="fade-up">
    <div class="container">
      <div class="storeInfo__wrapper">
        <div class="storeInfo__item">
          <div class="storeInfo__icon">
            <img src="./images/wall-clock-icon.svg" alt="clock icon">
          </div>
          <h3 class="storeInfo__title">
            11 AM - 10 PM
          </h3>
          <p class="storeInfo__text">
            Opening Hour
          </p>
        </div>
        <div class="storeInfo__item">
          <div class="storeInfo__icon">
            <img src="./images/address-icon.svg" alt="clock icon">
          </div>
          <h3 class="storeInfo__title">
            Alcala Park<BR> <BR>San Diego, CA
          </h3>
          <p class="storeInfo__text">
            Location
          </p>
        </div>
        <div class="storeInfo__item">
          <div class="storeInfo__icon">
            <img src="./images/phone-icon.svg" alt="clock icon">
          </div>
          <h3 class="storeInfo__title">
            +9283 8456
          </h3>
          <p class="storeInfo__text">
            Call Now
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Store Info Section -->
  <!-- Contact Form Section -->
  <section id="form" data-aos="fade-down">
    <div class="container">
      <h3 class="form__title">
        Contact & Inquiry
      </h3>
      <div class="form__wrapper">
        <form id="contact_form" name="contact" method="POST" netlify>
          <div class="form__group">
            <label for="firstName">First Name</label>
            <input type="text" name="First_Name" id="First_Name" required>
          </div>
          <div class="form__group">
            <label for="lastName">Last Name</label>
            <input type="text" name="Last_Name" id="Last_Name" required>
          </div>
          <div class="form__group">
            <label for="email">Email</label>
            <input type="text" name="Email" id="Email" required>
          </div>
          <div class="form__group">
            <label for="subject">Subject</label>
            <input type="text" name="Subject" id="Subject" required>
          </div>
          <div class="form__group form__group__full">
            <label for="message">Message</label>
            <textarea name="Message" id="Message" cols="30" rows="10" required></textarea>
          </div>
          <button type="submit" class="btn primary-btn" id="contactsend" >Send</button>
		  
        </form>
		
		
		<script type="text/javascript"
		  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

		<script type="text/javascript">
		  emailjs.init('UqiJZLc-fp0iVTjpT')
		</script>


      </div>
    </div>
  </section>
  <!-- End Contact Form Section-->
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


  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>
  <script src="./contactmail.js"></script>

</body>

</html>