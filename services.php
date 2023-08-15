<?php
  session_start();
  
	$db = mysqli_connect('localhost', 'root', '', 'kaduambulance_db');

	// initialize variables
	$fistname = "";
	$lastname = "";
	$number = "";
  $email = "";
  $address = "";

	if (isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

		mysqli_query($db, "INSERT INTO users (firstname, lastname, phonenumber, email, address) VALUES ('$firstname', '$lastname', '$number', '$email', '$address')"); 
		$_SESSION['message'] = "Request saved"; 
		header('location: index.php');
  }
  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
   <meta name="description" content="Shifter App">
    <meta name="keywords" content="Transportation Services, Parcel Delivery, Logistics">
  	<meta name="author" content="Brad Traversy">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Northways Travel Agencies </title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
  
            <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Northways</span>Travel Agencies</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="current"><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <article id="main-col">
          <h1 class="page-title">Services</h1>
          <ul id="services">
            <li>
              <h3>Passenger Transport</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulputate id lorem. Nulla facilisi.</p>
              <p>Pricing: $1,000 - $3,000</p>
            </li>
            <li>
              <h3>Logistics</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulputate id lorem. Nulla facilisi.</p>
              <p>Pricing: $250 per month</p>
            </li>
            <li>
              <h3>Vehicle Hiring</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies at, vulputate id lorem. Nulla facilisi.</p>
              <p>Pricing: $25 per month</p>
            </li>
          </ul>
        </article>

        <aside id="sidebar">
          <div class="dark">
            <h3>Book a Ticket</h3>
            <form class="quote" method="POST" action="#">
              <div>
                <label>First Name</label><br>
                <input type="text" placeholder="Firstname" name="firstname" required>
              </div>
              <div>
                <label>Last Name</label><br>
                <input type="text" placeholder="Lastname" name="lastname" required>
              </div>
              <div>
                <label>Email</label><br>
                <input type="email" placeholder="Email address" name="email" required>
              </div>
              <div>
                <label>Phone Number</label><br>
                <input type="number" placeholder="Phonenumber" name="number" required>
              </div>
              <div>
                <label>Address</label><br>
                <input type="text" placeholder="Address" name="address" required>
              </div>
              <button class="button_1" type="submit" name="submit">Submit</button>
          </form>
          </div>
        </aside>
      </div>
    </section>

     <footer> 
            <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     Copyright &copy;:
    <a class="text-white" href="https://northways.org/" target="blank">Northways.org</a> 2021 All Rights Reserved

  </div>
     </footer>

  <script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
 </body>
</html>
 
