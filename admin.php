<?php
   ob_start();
   session_start();
  if (!isset($_SESSION["session"]))
   {
      header("location: login.php");
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
    <title>Northways Travel Agencies | Welcome</title>
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
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Administrator</span></h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="logout.php">LOGOUT</a></li>
          </ul>
        </nav>
        
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Branch Administrator Section</h1>
      </div>
    </section>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Users Request Details</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Firstname</th>";
                                        echo "<th>Lastname</th>";
                                        echo "<th>Phonenumber</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['phonenumber'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='edituser.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Vehicle Records</h2>
                        <a href="addvehicle.php" class="btn btn-success pull-right">Add New Vehicle</a>
                    </div>
                    <?php
                    // Include config file
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM vehicles";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Registraiton Number</th>";
                                        echo "<th>Vehicle Size</th>";
                                        echo "<th>Vehicle Capacity</th>";
                                        echo "<th>Availability</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['registrationnumber'] . "</td>";
                                        echo "<td>" . $row['vehiclesize'] . "</td>";
                                        echo "<td>" . $row['vehiclecapacity'] . "</td>";
                                        echo "<td>";

                                        if($row['availability'] == 1){
                                            echo "Available";
                                         } else {
                                            echo "Not Available";
                                         }


                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">User Vehicle Record</h2>
                    </div>
                    <?php
                    // Include config file
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ambulance_vehicle";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Registraiton Number</th>";
                                        echo "<th>User</th>";
                                        echo "<th>Vehicle Capacity</th>";
                                        echo "<th>Size</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['vehicle_reg'] . "</td>";

                                        $db = mysqli_connect('localhost', 'root', '', 'kaduambulance_db');
                                        $cusid = $row['customer_id'];
                                        $query = mysqli_query($db, "SELECT * FROM users WHERE id = '$cusid'");
                                        while ($roww = mysqli_fetch_array($query)) {
                                            echo "<td>" . $roww[1] . "</td>";
                                            //printf ("(%s)\n", $row[1]);
                                        }

                                        echo "<td>" . $row['capacity'] . "</td>";
                                        echo "<td>" . $row['size'] . "</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
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
  <!-- Copyright ->
    </footer>
  </body>
</html>
