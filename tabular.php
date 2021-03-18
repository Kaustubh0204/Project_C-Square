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
    <head><meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!--mapbox-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
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

<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>



<title>Tabular</title>

</head>

<body class="bg-light">





<div class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" id="csqrfont" >C - S q  u a r e</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
      <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        </div> -->
        <a href="logout.php"><i style="font-size: 2.5rem;" id="logout" class="fas fa-sign-out-alt"></i></a>
        <a href="home.php"><i style="font-size: 2.5rem;" id="home" class="fas fa-home"></i></a>
      </nav>


<style>
 body {
     margin: 0;
 }
</style>
</script>   
</head>

</script>


<div class="container my-5 ">
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

<div class="container bg-dark p-3 my-5 text-center border border-light">
    <h2 class="text-muted">"Prevention is the Cure."</h2>
    <p class="text-muted">Stay Indoors Stay Safe.</p>
</div>
</div>
<hr>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="thead-secondary">
                <tr>
                    <th scope="col">Countries</th>
                    <th scope="col">Confirmed</th>
                    <th scope="col">Recovered</th>
                    <th scope="col">Deceased</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <?php
                    foreach($data as $key => $value){
                        $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $key?> <?php if($increase != 0){ ?>
                                <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>  
                            <?php } ?></th> 
                        <td>
                            <?php echo $value[$days_count]['confirmed'];?>
                                
                        </td>
                        <td><?php echo $value[$days_count]['recovered'];?></td>
                        <td><?php echo $value[$days_count]['deaths'];?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php 
error_reporting(0);
file_put_contents("databas.json", "");
//$data1 .='"data:"';
$text1 .="{\n".'"data":[' ."\n";
$textend .='{}]}';
$fh = fopen('databas.json', "a") or die("Could not open log file.");
fwrite($fh, $text1) or die("Could not write file!");
foreach($data as $key=> $value) 
$text .= '{'.'"name":'.'"'.$key.'"'.",\n".'"confirmed":'.$value[$days_count]['confirmed'].",\n".'"recovered":'.$value[$days_count]['recovered'].",\n".'"deaths":'.$value[$days_count]['deaths'].",\n".'"confirmedm1":'.$value[$days_count-1]['confirmed'].",\n".'"recoveredm1":'.$value[$days_count-1]['recovered'].",\n".'"deathsm1":'.$value[$days_count-1]['deaths'].",\n".'"confirmedm2":'.$value[$days_count-2]['confirmed'].",\n".'"recoveredm2":'.$value[$days_count-2]['recovered'].",\n".'"deathsm2":'.$value[$days_count-2]['deaths'].",\n".'"confirmedm3":'.$value[$days_count-3]['confirmed'].",\n".'"recoveredm3":'.$value[$days_count-3]['recovered'].",\n".'"deathsm3":'.$value[$days_count-3]['deaths'].",\n".'"confirmedm4":'.$value[$days_count-4]['confirmed'].",\n".'"recoveredm4":'.$value[$days_count-4]['recovered'].",\n".'"deathsm4":'.$value[$days_count-4]['deaths'].",\n".'"confirmedm5":'.$value[$days_count-5]['confirmed'].",\n".'"recoveredm5":'.$value[$days_count-5]['recovered'].",\n".'"deathsm5":'.$value[$days_count-5]['deaths'].",\n".'"confirmedm6":'.$value[$days_count-6]['confirmed'].",\n".'"recoveredm6":'.$value[$days_count-6]['recovered'].",\n".'"deathsm6":'.$value[$days_count-6]['deaths'].",\n".'"confirmedm7":'.$value[$days_count-7]['confirmed'].",\n".'"recoveredm7":'.$value[$days_count-7]['recovered'].",\n".'"deathsm7":'.$value[$days_count-7]['deaths']."\n },\n";;
fwrite($fh, $text) or die("Could not write file!");
fwrite($fh, $textend) or die("Could not write file!");
fclose($fh);
?>
</div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script class="text-light">
    $(document).ready(function() {
    $('#myTable').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
  </script>

<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy;2020</span>
    </div>
</footer>

</body>
</html>