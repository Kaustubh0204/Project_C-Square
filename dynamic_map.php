<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
<link rel="stylesheet" href="style6.css">
<link rel="stylesheet" href="marker2.css">

    
<title>Dynamic Map</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" id="csqrfont" >C - S q u a r e</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item dropdown active">
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
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Contact us</a>
            </li>
            <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
            
          </ul>
        </div>-->
        <a href="logout.php"><i style="font-size: 2.5rem;" id="logout" class="fas fa-sign-out-alt"></i></a>
        <a href="home.php"><i style="font-size: 2.5rem;" id="home" class="fas fa-home"></i></a>
      </nav>

      
    
    <div id='map' style='width: 100vw; height: 1000px;' class="my-1">
    <div id="legend" class="image-fluid" ><img src="legend-01.png" width="200px" height="200px" ></div>
  </div>
<script type="module" src="app.js"></script>
 

<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center bg-dark">
        <span class="text-muted">Copyright &copy;2020  |  Kaustubh Utturwar</span>
    </div>
</footer>

</body>
</html>