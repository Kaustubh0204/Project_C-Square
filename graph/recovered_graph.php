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






<?php
// Turn off all error reporting
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

      

        <title>graph</title>
    </head>
<body>


<?php  $country = $_POST["username"] ?>  





<?php foreach($data as $key => $value) { ?>
            
            <?php if($key == $country){ ?>
                                
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',
                
            
                    // The data for our dataset
                    data:   {
                        labels: ['Last 6 days', 'Last 5 days', 'Last 4 days', 'Last 3 days', 'Last 2 days', 'Last 1 day', 'Today'],
                        datasets:   [{
                            label: '<?php echo $key?> | recovered cases | csquare.ga',
                            backgroundColor: 'rgb(173,255,47)',
                            borderColor: 'rgb(100,140,17)',
                            data: [<?php echo $value[$days_count-6]['recovered'];?>, <?php echo $value[$days_count-5]['recovered'];?>, <?php echo $value[$days_count-4]['recovered'];?>, <?php echo $value[$days_count-3]['recovered'];?>, <?php echo $value[$days_count-2]['recovered'];?>, <?php echo $value[$days_count-1]['recovered'];?>, <?php echo $value[$days_count]['recovered'];?>]
                                    }]
                            },

                

                    // Configuration options go here
                    options: {}
                    
                    });
                
                </script>


            <?php } ?>

        <?php }?>
</body>
</html>