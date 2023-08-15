<?php
   session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional Transport Support">
	  <meta name="keywords" content="Transportation Services, Parcel Delivery, Logistics">
  	<meta name="author" content="Brad Traversy">
    <title>Northways Shifter Application | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Northways</span>Travel Agencies</h1>
        </div>
       
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Shifter Support System</h1>
        <p>Welcome to the support staff Login Portal.</p>
      </div>
    </section>

      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username'])  && !empty($_POST['password'])) {

                $db = mysqli_connect('localhost', 'root', '', 'kaduambulance_db');

                $myusername = mysqli_real_escape_string($db,$_POST['username']);
                $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

                
                $sql = "SELECT * FROM admin WHERE email = '$myusername' and password = '$mypassword'";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                $count = mysqli_num_rows($result);
                
                // If result matched $myusername and $mypassword, table row must be 1 row
                    
                if($count == 1) {
                    $_SESSION['login_user'] = $myusername;
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['session'] = '';
                    
                    header("location: admin.php");
                }else {
                    $error = "Your Login Name or Password is invalid";
                }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" action = "#" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username"  required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
         
      </div>

    

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
