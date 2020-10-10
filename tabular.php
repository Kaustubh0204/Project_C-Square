<?php

include 'logic.php';

?>

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

<title>Tabular</title>

<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand" href="#">C-Square</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      
      
    </ul>
  </div>
</nav>



<style>
 body {
     margin: 0;
 }
</style>
</script>   
</head>

</script>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-4 text-warning">
            <h5>Confirmed</h5>
            <?php echo $total_confirmed;?>
        </div>
        <div class="col-4 text-success">
            <h5>Recovered</h5>
            
            <?php echo $total_recovered;?>
            
        </div>
        <div class="col-4 text-danger">
            <h5>Deceased</h5>
            <?php echo $total_deaths;?>
        </div>
    </div>
</div>

<div class="container bg-info p-3 my-5 text-center">
    <h2 class="text-muted">"Prevention is the Cure."</h2>
    <p class="text-muted">Stay Indoors Stay Safe.</p>
</div>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Countries</th>
                    <th scope="col">Confirmed</th>
                    <th scope="col">Recovered</th>
                    <th scope="col">Deceased</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <?php
                    foreach($data as $key => $value){
                        $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $key?></th>
                        <td>
                            <?php echo $value[$days_count]['confirmed'];?>
                            <?php if($increase != 0){ ?>
                                <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>  
                            <?php } ?>    
                        </td>
                        <td><?php echo $value[$days_count]['recovered'];?></td>
                        <td><?php echo $value[$days_count]['deaths'];?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy;2020  |  Kaustubh Utturwar</span>
    </div>
</footer>

</body>
</html>