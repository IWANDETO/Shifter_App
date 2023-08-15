<?php
session_start();
if (!isset($_SESSION["session"]))
 {
    header("location: login.php");
 }
// Include config file
require_once "config.php";
$db = mysqli_connect('localhost', 'root', '', 'kaduambulance_db');
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['usubmit'])){
    // Get hidden input value

        $id =  $_POST['uvehicle'];
        
        // Prepare a select statement
        $sql = "SELECT * FROM vehicles WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $uvehiclereg_no = $row["registrationnumber"];
                    $ucapacity = $row["vehiclecapacity"];
                    $usize = $row["vehiclesize"];
                    $userid = $_POST['userid'];
                  
                
                    mysqli_query($db, "INSERT INTO ambulance_vehicle (vehicle_reg, customer_id, capacity, size) VALUES ('$uvehiclereg_no', '$userid', '$ucapacity', '$usize')"); 

                    $sql = "UPDATE vehicles SET availability = 0 WHERE id= '$id'";

                    if ($db->query($sql) === TRUE) {
                      echo "Record updated successfully";
                    } else {
                      echo "Error updating record: " . $db->error;
                    }

                    $_SESSION['message'] = "Request saved"; 
                    header('location: admin.php');

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $rowname = $row["firstname"];
                    $rownumber = $row["phonenumber"];
                    $rowemail = $row["email"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
    <title>Northways Travel Agencies</title>
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
          <h1><span class="highlight">Northways</span> Travel Agencies</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="logout.php">LOGOUT</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="uname" class="form-control" value="<?php echo $rowname; ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Phonenumber</label>
                            <textarea name="unumber" class="form-control"><?php echo $rownumber; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="uemail" class="form-control" value="<?php echo $rowemail; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="select_drp">
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM vehicles WHERE availability = '1'");
                            echo '<select class="select_drp" name="uvehicle" required>';
                            echo '<option value="">Choose Vehicle</option>';
                            while ($row = mysqli_fetch_array($query)) {
                                echo '<option value="' . $row['id'] . '">' . $row['registrationnumber'] . '</option>';
                            }
                            echo '</select>';
                            echo "<br/><br/>";
                            ?>
                        </div>

                        <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit" name="usubmit">
                        <a href="admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
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
