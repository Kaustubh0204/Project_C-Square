<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-mapbox-->

<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<!-- My Stylesheet -->
<link rel="stylesheet" href="style.css">

<title>Covid-19 Tracker</title>

<body class="bg-dark">



<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand" href="#">C-Square</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
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
      
      <li class="nav-item">
                <a class="nav-link" href="Contact_us.html">Contact us</a>
      </li>
      
      
    </ul>
  </div>
</nav>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Welcome!</strong> to my covid counter hope you like it...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div id="carouselExampleCaptions" class="carousel slide my-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="text-white bg-dark">Mask is better than ventilator</h2>
        <h3 class="text-white bg-dark">Home is better than hospital</h3>
   
      </div>
    </div>
    <div class="carousel-item">
      
    <img src="1.jpeg" class="d-block w-100 h-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="text-white bg-primary">Staying home</h2>
        <h3 class="text-white bg-primary">saves lives</h3>
    
   
        
      </div>
    </div>
    <div class="carousel-item my-100">
      <img src="3.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h2 class="text-white bg-danger">We are in this together</h2>
        <h3 class="text-white bg-danger">and we will get through this together</h3>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="jumbotron jumbotron-fluid bg-info my-2">
  <div class="container overflow-auto" style="height: 200px; ">
    <h1 class="display-4">C-Square</h1>
    <p class="lead">Project C-square, derived from the terms ‘Covid Counter’ is a website developed to keep track of country wise data based on covid-19 statistics which includes number of active cases, number of people recovered from this deadly virus and also the count of deaths caused due this disease.
      The analysis is displayed in format of a well structured table and also a dynamic world map which reflects the contamination level of active cases region wise and gets automatically updated on the daily basis. The skeleton of thewebsite is formed by the standard markup language well knowned by the name HTML (Hyper Text Markup Language) and is styled using CSS (Cascading Style Sheet) language as well as majorly used Bootstrap named framework and the back end logic is written using PHP programming language. The external resources that were used to complie this project were Mapbox web application, Github coding platform, Font awesome web application.</p>
  </div>
</div>

<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy;2020  |  Kaustubh Utturwar</span>
    </div>
</footer>

</body>
</html>