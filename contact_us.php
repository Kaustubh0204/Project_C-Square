<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<?php

include 'logic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="style3.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="pace.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-bez@1.0.11/src/jquery.bez.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
        
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!--mapbox-->

<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&family=Play:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<!-- My Stylesheet -->

    <link rel="stylesheet" href="style5.css">

    <title>Contact Us</title>

    </head>



<body class="bg-dark">

<div id="preloader">
            <div class="p"><h2>LOADING</h2></div>
        </div>

        <script>

        paceOptions = {
        ajax: true,
        document: true,
        eventLag: false
        };

        Pace.on('done', function() {
        $('.p').delay(500).animate({top: '30%', opacity: '0'}, 3000, $.bez([0.19,1,0.22,1]));


        $('#preloader').delay(1500).animate({top: '-100%'}, 2000, $.bez([0.19,1,0.22,1]));

        TweenMax.from(".title", 2, {
             delay: 1.8,
                  y: 10,
                  opacity: 0,
                  ease: Expo.easeInOut
            })
       });

      </script>


    <nav class="navbar navbar-expand-lg navbar-light bg-mute">
        <a class="navbar-brand"  id="csqrfont">C - S q u a r e</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
       <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                View
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="tabular.php">Tabular</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="dynamic_map.html">Dynamic Map</a>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Contact_us.php">Contact us</a>
            </li>
            <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
            
          </ul>
        </div> -->
        <a href="logout.php"><i style="font-size: 2.5rem;" id="logout" class="fas fa-sign-out-alt"></i></a>
        <a href="about2.php"><i style="font-size: 2.5rem;" id="back" class="fas fa-arrow-left"></i></a>
      </nav>
 
     
     



<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $_POST ['email'];
      $query = $_POST ['query'];
      $concern = $_POST ['concern'];

        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact_us";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `contact_us` (`email`, `query`, `concern`) VALUES ('$email', '$query', '$concern')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show my-2" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }

    
?>


<div class="container my-5 border border-danger p-4">
    <form action="contact_us.php" method="post">
      <div class="form-group">
          <label for="email" class="text-light">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        </div>
        <div class="form-group">
          <label for="query" class="text-light">Select your query</label>
          <select class="form-control" id="query" name="query">
            <option>Web</option>
            <option>Tech</option>
            <option>Suggestions</option>
            <option>Review</option>
            <option>Others</option>
          </select>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 text-light">Are you a member?</div>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label text-light" for="gridCheck1">
                  Yes
                </label>
              </div>
            </div>
          </div>
        <div class="form-group">
          <label for="concern" class="text-light">Elaborate Your Concern</label>
          <textarea class="form-control" id="concern" rows="3" name="concern"></textarea>
        </div>
      
      <button type="submit" class="btn btn-danger">Submit</button>
      </form>
    </div>
    

    <div class="container" style="width: 20000px;">
    <div class="jumbotron bg-secondary">
        <h1 class="display-4">Also</h1>
        <p class="lead">You can contact us on our gmail: </p>
        <hr class="my-4">
        <p>Click below:</p>
        <a class="btn btn-danger btn-lg" href="mailto:k.utturwar@gmail.com" role="button">Learn more</a>
      </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Copyright &copy;2020</span>
        </div>
    </footer>

    </body>