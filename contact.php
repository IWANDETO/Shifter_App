
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Shifter App">
	  <meta name="keywords" content="Transportation Services, Parcel Delivery, Logistics">
  	<meta name="author" content="Brad Traversy">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Northways Travel Agencies | About</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Northways</span> Travel Agencies</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="current"><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <hr>
<br>
<br>
<br>
<div class="container">
<div id="contact">
<form method="POST">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="firstname" class="form-control" name="first_name" required>
        <label class="form-label" for="firstname">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="lastname" class="form-control" name="last_name" required>
        <label class="form-label" for="lastname">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="address" class="form-control" name="address" required>
    <label class="form-label" for="address">Address</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" name="email" required>
    <label class="form-label" for="email">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="number" id="phone" class="form-control" name="phone" required>
    <label class="form-label" for="phone">Phone</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="message" name="message" rows="4"></textarea>
    <label class="form-label" for="message">Your Message</label>
  </div>

 

  <!-- Submit button -->
  <center><button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Shoot Us A Message</button></center>
</form>
</div>
</div>

<hr>



    <footer> 
      <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     Copyright &copy;:
    <a class="text-white" href="https://northways.org/" target="blank">Northways.org</a> 2021 All Rights Reserved

  </div>
  <!-- Copyright -->
</section>
      
    </footer>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
  </body>
</html>
