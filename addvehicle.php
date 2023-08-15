<?php
  session_start();
  if (!isset($_SESSION["session"]))
   {
      header("location: login.php");
   }
	$db = mysqli_connect('localhost', 'root', '', 'kaduambulance_db');

	// initialize variables
	$fistname = "";
	$lastname = "";
	$number = "";

	if (isset($_POST['submit'])) {
	$regno = $_POST['regno'];
    $carsize = $_POST['carsize'];
    $regcapacity = $_POST['regcapacity'];

		mysqli_query($db, "INSERT INTO vehicles (registrationnumber, vehiclesize, vehiclecapacity) VALUES ('$regno', '$carsize', '$regcapacity')"); 
		$_SESSION['message'] = "Request saved"; 
		header('location: admin.php');
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
    <title>Branch Hospital Services </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Branch</span> Ambulance Support</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="logout.php">LOGOUT</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="container">

          <div class="container">
            <h3>Add new Ambulance</h3>
            <form class="quote" method="POST" action="#">
  						<div>
  							<label>Registration Number</label><br>
  							<input type="text" placeholder="Registration Number" name="regno">
              </div>
              <br>
  						<div>
  							<label>Vehicle Size</label><br>
  							<input type="text" placeholder="vehicle size" name="carsize">
              </div>
              <br>
              <div>
  							<label>Vehicle Capacity</label><br>
  							<input type="number" placeholder="capacity" name="regcapacity">
              </div>
              <button class="button_1" type="submit" name="submit">Save</button>
              <a href="admin.php" class="btn btn-default">Cancel</a>
					</form>
          </div>
      </div>
    </section>

    <footer>
        <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     Copyright &copy;:
    <a class="text-white" href="https://northways.org/" target="blank">Northways.org</a> 2021 All Rights Reserved

  </div>
  <!-- Copyright -
    </footer>
  </body>
</html>
