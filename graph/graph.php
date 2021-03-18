<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Graphs</title>
    <link href="https://unpkg.com/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.css" rel="stylesheet">

    <link rel="stylesheet" href="graph.css">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

</head>

<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light bg-mute">
        <a class="navbar-brand" id="csqr" >C - S q u a r e</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
       
        <a href="logout.php"><i style="font-size: 2.5rem;" id="logout" class="fas fa-sign-out-alt"></i></a>
        <a href="home.php"><i style="font-size: 2.5rem;" id="home" class="fas fa-home"></i></a>
      </nav>
 


    <div class="container my-5 ">

   <div class="jumbotron bg-secondary">
    <div>

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-4 mr-auto form-group">
                    <select id="status" class="form-control">
                        <option disabled selected>-- Select Status --</option>
                        <option value="confirmed">Confirmed Cases</option>
                        <option value="deaths">Deaths</option>
                        <option value="recovered">Recoveries</option>
                    </select>
                </div>
            </div>
            <div class="card card-body">
                <canvas id="myChart" style="width:100%; height:500px;"></canvas>
            </div>
        </div>
    
       
    
        <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- github.com/chartjs/Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <!-- Chart.bundle.min.js -->
        <script>
            var countries = [{
                title: 'United States',
                slug: 'united-states',
                backgroundColor: '#ffb0c1',
                borderColor: '#ff6384'
            }, {
                title: 'India',
                slug: 'india',
                backgroundColor: '#ffcf9f',
                borderColor: '#ff9f40'
            }, {
                title: 'Brazil',
                slug: 'brazil',
                backgroundColor: '#ffe6aa',
                borderColor: '#ffcd56'
            }, {
                title: 'Germany',
                slug: 'germany',
                backgroundColor: '#a4dfdf',
                borderColor: '#4bc0c0'
            }, {
                title: 'France',
                slug: 'france',
                backgroundColor: '#9ad0f5',
                borderColor: '#36a2eb'
            }, {
                title: 'Spain',
                slug: 'spain',
                backgroundColor: '#e4e5e7',
                borderColor: '#c9cbcf'
            }, {
                title: 'Russia',
                slug: 'russia',
                backgroundColor: '#b99cf2',
                borderColor: '#9562fb'
            }, {
                title: 'UK',
                slug: 'united-kingdom',
                backgroundColor: '#8aff80',
                borderColor: '#43b339'
            }, {
                title: 'Turkey',
                slug: 'turkey',
                backgroundColor: '#f29292',
                borderColor: '#b33939'
            }, {
                title: 'Italy',
                slug: 'italy',
                backgroundColor: '#887ef7',
                borderColor: '#3c31bb'
            }];
            var store = localStorage;
            var getStore = store.getItem('myStatus') ? store.getItem('myStatus') : 'confirmed';
    
            var mychart = myChart();
            statusData(getStore, countries, mychart);
    
            $('#status').on('change', function() {
                store.setItem('myStatus', $(this).val());
                window.location.reload();
            });
    
            function statusData(status, country, chart) {
                getLabelData(chart);
                country.forEach(function(item, index) {
                    getCountryData(item.slug, status, chart, index);
                });
            }
    
            function getLabelData(chart) {
                axios.get('https://api.covid19api.com/total/country/italy/status/confirmed').then(function(response) {
                    chart.data.labels = formatData(response.data, 'label');
                    chart.update();
                })
            }
    
            function getCountryData(country, status, chart, index) {
                axios.get('https://api.covid19api.com/total/country/' + country + '/status/' + status).then(function(response) {
                    chart.data.datasets[index].data = formatData(response.data, 'data');
                    chart.update();
                }).catch(function(error) {
                    console.log(error);
                });
            }
    
            function formatData(data, type) {
                var list = [];
                data.forEach(function(item) {
                    if (type == 'data') {
                        list.push(item.Cases);
                    } else if (type == 'label') {
                        list.push(new Date(item.Date).getDate());
                    }
                });
                return list.slice(data.length - 7, data.length);
            }
    
            function myChart() {
                var myBasicChart = new Chart('myChart', {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: dataSets(countries)
                    },
                    options: {
                        responsive: true,
                        elements: {
                            point: {
                                radius: 0
                            }
                        },
                        title: {
                            display: true,
                            text: 'Global COVID-19 statistics | C-square'
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                            }],
                            yAxes: [{
                                display: true,
                            }]
                        }
                    }
                });
                return myBasicChart;
            }
    
            function dataSets(data) {
                var sets = [];
                data.forEach(function(item) {
                    sets.push({
                        label: item.title,
                        data: [],
                        backgroundColor: item.backgroundColor,
                        borderColor: item.borderColor,
                        borderWidth: 3,
                        fill: false
                    });
                });
                return sets;
            }
        </script>
    
    </div>
        <hr class="my-4">
        
        
        <p>The above graph represents the COVID-19 statistics of last seven days of top ten countries on the basis of highest number of confirmed corona cases in the world. Scroll down to check out individual data of every country.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="tabular.php" role="button">Learn more</a>
        </p>
      </div>

    </div>


            <div class="container">
    

    <div >
  <img class="illus" src="graphbg1.png" style="width:600px;height:550px;">
  </div>

  <div class="card bg-info" id="cb"style="width: 18rem;">
  <img src="https://i.pinimg.com/originals/c9/91/72/c99172c17b83d3c620b997858351b2a5.gif" class="card-img-top" alt="...">
  <div class="card-body" >
  <h5 class="card-title">Graph</h5>
  <p class="card-text">The figures and statistics are pushed through various mathematical formulaes and sprinkled with some amazing animated front end to provide you the best user experience and application interface we could.</p>
    
  <!-- Button trigger modal -->

  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" >C</button>
  
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2" >R</button>

  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3" >D</button>

  </div>
 </div>



<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Enter the name of the country</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">

        <?php
          if(isset($_POST['submit'])){
            $name = $_POST["username"];
          }
          ?>



         <form action="confirmed_graph.php" method="post">
         Country: <input list="usernames"   type="text" name="username" id="username">

         <datalist id="usernames">
        
          <option value="Afghanistan">
          <option value="Albania">
          <option value="Algeria">
          <option value="Andorra">
          <option value="Angola">
          <option value="Antigua and Barbuda">
          <option value="Argentina">
          <option value="Armenia">
          <option value="Australia">
          <option value="Austria">
          <option value="Azerbaijan">
          <option value="Bahamas">
          <option value="Bahrain">
          <option value="Bangladesh">
          <option value="Barbados">
          <option value="Belarus">
          <option value="Belgium">
          <option value="Belize">
          <option value="Benin">
          <option value="Bhutan">
          <option value="Bolivia">
          <option value="Bosnia and Herzegovina">
          <option value="Botswana">
          <option value="Brazil">
          <option value="Brunei">
          <option value="Bulgaria">
          <option value="Burkina Faso">
          <option value="Burma">
          <option value="Burundi">
          <option value="Cabo Verde">
          <option value="Cambodia">
          <option value="Cameroon">
          <option value="Canada">
          <option value="Central African Republic">
          <option value="Chad">
          <option value="Chile">
          <option value="China">
          <option value="Colombia">
          <option value="Comoros">
          <option value="Congo (Brazzaville)">
          <option value="Congo (Kinshasa)">
          <option value="Costa Rica">
          <option value="Cote d'Ivoire">
          <option value="Croatia">
          <option value="Cuba">
          <option value="Cyprus">
          <option value="Czechia">
          <option value="Denmark">
          <option value="Diamond Princess">
          <option value="Djibouti">
          <option value="Dominica">
          <option value="Dominican Republic">
          <option value="Ecuador">
          <option value="Egypt">
          <option value="El Salvador">
          <option value="Equatorial Guinea">
          <option value="Eritrea">
          <option value="Estonia">
          <option value="Eswatini">
          <option value="Ethiopia">
          <option value="Fiji">
          <option value="Finland">
          <option value="France">
          <option value="Gabon">
          <option value="Gambia">
          <option value="Georgia">
          <option value="Germany">
          <option value="Ghana">
          <option value="Greece">
          <option value="Grenada">
          <option value="Guatemala">
          <option value="Guinea">
          <option value="Guinea-Bissau">
          <option value="Guyana">
          <option value="Haiti">
          <option value="Holy See">
          <option value="Honduras">
          <option value="Hungary">
          <option value="Iceland">
          <option value="India">
          <option value="Indonesia">
          <option value="Iran">
          <option value="Iraq">
          <option value="Ireland">
          <option value="Israel">
          <option value="Italy">
          <option value="Jamaica">
          <option value="Japan">
          <option value="Jordan">
          <option value="Kazakhstan">
          <option value="Kenya">
          <option value="Korea, South">
          <option value="Kosovo">
          <option value="Kuwait">
          <option value="Kyrgyzstan">
          <option value="Laos">
          <option value="Latvia">
          <option value="Lebanon">
          <option value="Lesotho">
          <option value="Liberia">
          <option value="Libya">
          <option value="Liechtenstein">
          <option value="Lithuania">
          <option value="Luxembourg">
          <option value="MS Zaandam">
          <option value="Madagascar">
          <option value="Malawi">
          <option value="Malaysia">
          <option value="Maldives">
          <option value="Mali">
          <option value="Malta">
          <option value="Marshall Islands">
          <option value="Mauritania">
          <option value="Mauritius">
          <option value="Mexico">
          <option value="Micronesia">
          <option value="Moldova">
          <option value="Monaco">
          <option value="Mongolia">
          <option value="Montenegro">
          <option value="Morocco">
          <option value="Mozambique">
          <option value="Namibia">
          <option value="Nepal">
          <option value="Netherlands">
          <option value="New Zealand">
          <option value="Nicaragua">
          <option value="Niger">
          <option value="Nigeria">
          <option value="North Macedonia">
          <option value="Norway">
          <option value="Oman">
          <option value="Pakistan">
          <option value="Panama">
          <option value="Papua New Guinea">
          <option value="Paraguay">
          <option value="Peru">
          <option value="Philippines">
          <option value="Poland">
          <option value="Portugal">
          <option value="Qatar">
          <option value="Romania">
          <option value="Russia">
          <option value="Rwanda">
          <option value="Saint Kitts and Nevis">
          <option value="Saint Lucia">
          <option value="Saint Vincent and the Grenadines">
          <option value="Samoa">
          <option value="San Marino">
          <option value="Sao Tome and Principe">
          <option value="Saudi Arabia">
          <option value="Senegal">
          <option value="Serbia">
          <option value="Seychelles">
          <option value="Sierra Leone">
          <option value="Singapore">
          <option value="Slovakia">
          <option value="Slovenia">
          <option value="Solomon Islands">
          <option value="Somalia">
          <option value="South Africa">
          <option value="South Sudan">
          <option value="Spain">
          <option value="Sri Lanka">
          <option value="Sudan">
          <option value="Suriname">
          <option value="Sweden">
          <option value="Switzerland">
          <option value="Syria">
          <option value="Taiwan*">
          <option value="Tajikistan">
          <option value="Tanzania">
          <option value="Thailand">
          <option value="Timor-Leste">
          <option value="Togo">
          <option value="Trinidad and Tobago">
          <option value="Tunisia">
          <option value="Turkey">
          <option value="US">
          <option value="Uganda">
          <option value="Ukraine">
          <option value="United Arab Emirates">
          <option value="United Kingdom">
          <option value="Uruguay">
          <option value="Uzbekistan">
          <option value="Vanuatu">
          <option value="Venezuela">
          <option value="Vietnam">
          <option value="West Bank and Gaza">
          <option value="Yemen">
          <option value="Zambia">
          <option value="Zimbabwe">
      </datalist>
          
          </div>
         <div class="modal-footer">
         <input type="submit" class="btn btn-primary" value="Get graph">
         </div>
       </div>
      
      </form>
         
        </div>
      </div>
   </div>

   


   <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Enter the name of the country</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">

        <?php
          if(isset($_POST['submit'])){
            $name = $_POST["username"];
          }
          ?>



         <form action="recovered_graph.php" method="post">
         Country: <input list="usernames"   type="text" name="username" id="username">

         <datalist id="usernames">
        
          <option value="Afghanistan">
          <option value="Albania">
          <option value="Algeria">
          <option value="Andorra">
          <option value="Angola">
          <option value="Antigua and Barbuda">
          <option value="Argentina">
          <option value="Armenia">
          <option value="Australia">
          <option value="Austria">
          <option value="Azerbaijan">
          <option value="Bahamas">
          <option value="Bahrain">
          <option value="Bangladesh">
          <option value="Barbados">
          <option value="Belarus">
          <option value="Belgium">
          <option value="Belize">
          <option value="Benin">
          <option value="Bhutan">
          <option value="Bolivia">
          <option value="Bosnia and Herzegovina">
          <option value="Botswana">
          <option value="Brazil">
          <option value="Brunei">
          <option value="Bulgaria">
          <option value="Burkina Faso">
          <option value="Burma">
          <option value="Burundi">
          <option value="Cabo Verde">
          <option value="Cambodia">
          <option value="Cameroon">
          <option value="Canada">
          <option value="Central African Republic">
          <option value="Chad">
          <option value="Chile">
          <option value="China">
          <option value="Colombia">
          <option value="Comoros">
          <option value="Congo (Brazzaville)">
          <option value="Congo (Kinshasa)">
          <option value="Costa Rica">
          <option value="Cote d'Ivoire">
          <option value="Croatia">
          <option value="Cuba">
          <option value="Cyprus">
          <option value="Czechia">
          <option value="Denmark">
          <option value="Diamond Princess">
          <option value="Djibouti">
          <option value="Dominica">
          <option value="Dominican Republic">
          <option value="Ecuador">
          <option value="Egypt">
          <option value="El Salvador">
          <option value="Equatorial Guinea">
          <option value="Eritrea">
          <option value="Estonia">
          <option value="Eswatini">
          <option value="Ethiopia">
          <option value="Fiji">
          <option value="Finland">
          <option value="France">
          <option value="Gabon">
          <option value="Gambia">
          <option value="Georgia">
          <option value="Germany">
          <option value="Ghana">
          <option value="Greece">
          <option value="Grenada">
          <option value="Guatemala">
          <option value="Guinea">
          <option value="Guinea-Bissau">
          <option value="Guyana">
          <option value="Haiti">
          <option value="Holy See">
          <option value="Honduras">
          <option value="Hungary">
          <option value="Iceland">
          <option value="India">
          <option value="Indonesia">
          <option value="Iran">
          <option value="Iraq">
          <option value="Ireland">
          <option value="Israel">
          <option value="Italy">
          <option value="Jamaica">
          <option value="Japan">
          <option value="Jordan">
          <option value="Kazakhstan">
          <option value="Kenya">
          <option value="Korea, South">
          <option value="Kosovo">
          <option value="Kuwait">
          <option value="Kyrgyzstan">
          <option value="Laos">
          <option value="Latvia">
          <option value="Lebanon">
          <option value="Lesotho">
          <option value="Liberia">
          <option value="Libya">
          <option value="Liechtenstein">
          <option value="Lithuania">
          <option value="Luxembourg">
          <option value="MS Zaandam">
          <option value="Madagascar">
          <option value="Malawi">
          <option value="Malaysia">
          <option value="Maldives">
          <option value="Mali">
          <option value="Malta">
          <option value="Marshall Islands">
          <option value="Mauritania">
          <option value="Mauritius">
          <option value="Mexico">
          <option value="Micronesia">
          <option value="Moldova">
          <option value="Monaco">
          <option value="Mongolia">
          <option value="Montenegro">
          <option value="Morocco">
          <option value="Mozambique">
          <option value="Namibia">
          <option value="Nepal">
          <option value="Netherlands">
          <option value="New Zealand">
          <option value="Nicaragua">
          <option value="Niger">
          <option value="Nigeria">
          <option value="North Macedonia">
          <option value="Norway">
          <option value="Oman">
          <option value="Pakistan">
          <option value="Panama">
          <option value="Papua New Guinea">
          <option value="Paraguay">
          <option value="Peru">
          <option value="Philippines">
          <option value="Poland">
          <option value="Portugal">
          <option value="Qatar">
          <option value="Romania">
          <option value="Russia">
          <option value="Rwanda">
          <option value="Saint Kitts and Nevis">
          <option value="Saint Lucia">
          <option value="Saint Vincent and the Grenadines">
          <option value="Samoa">
          <option value="San Marino">
          <option value="Sao Tome and Principe">
          <option value="Saudi Arabia">
          <option value="Senegal">
          <option value="Serbia">
          <option value="Seychelles">
          <option value="Sierra Leone">
          <option value="Singapore">
          <option value="Slovakia">
          <option value="Slovenia">
          <option value="Solomon Islands">
          <option value="Somalia">
          <option value="South Africa">
          <option value="South Sudan">
          <option value="Spain">
          <option value="Sri Lanka">
          <option value="Sudan">
          <option value="Suriname">
          <option value="Sweden">
          <option value="Switzerland">
          <option value="Syria">
          <option value="Taiwan*">
          <option value="Tajikistan">
          <option value="Tanzania">
          <option value="Thailand">
          <option value="Timor-Leste">
          <option value="Togo">
          <option value="Trinidad and Tobago">
          <option value="Tunisia">
          <option value="Turkey">
          <option value="US">
          <option value="Uganda">
          <option value="Ukraine">
          <option value="United Arab Emirates">
          <option value="United Kingdom">
          <option value="Uruguay">
          <option value="Uzbekistan">
          <option value="Vanuatu">
          <option value="Venezuela">
          <option value="Vietnam">
          <option value="West Bank and Gaza">
          <option value="Yemen">
          <option value="Zambia">
          <option value="Zimbabwe">
      </datalist>
          
          </div>
         <div class="modal-footer">
         <input type="submit" class="btn btn-primary" value="Get graph">
         </div>
       </div>
      
      </form>
         
        </div>
      </div>
   </div>



   <div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Enter the name of the country</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">

        <?php
          if(isset($_POST['submit'])){
            $name = $_POST["username"];
          }
          ?>



         <form action="deaths_graph.php" method="post">
          Country: <input list="usernames"   type="text" name="username" id="username">

         <datalist id="usernames">
        
          <option value="Afghanistan">
          <option value="Albania">
          <option value="Algeria">
          <option value="Andorra">
          <option value="Angola">
          <option value="Antigua and Barbuda">
          <option value="Argentina">
          <option value="Armenia">
          <option value="Australia">
          <option value="Austria">
          <option value="Azerbaijan">
          <option value="Bahamas">
          <option value="Bahrain">
          <option value="Bangladesh">
          <option value="Barbados">
          <option value="Belarus">
          <option value="Belgium">
          <option value="Belize">
          <option value="Benin">
          <option value="Bhutan">
          <option value="Bolivia">
          <option value="Bosnia and Herzegovina">
          <option value="Botswana">
          <option value="Brazil">
          <option value="Brunei">
          <option value="Bulgaria">
          <option value="Burkina Faso">
          <option value="Burma">
          <option value="Burundi">
          <option value="Cabo Verde">
          <option value="Cambodia">
          <option value="Cameroon">
          <option value="Canada">
          <option value="Central African Republic">
          <option value="Chad">
          <option value="Chile">
          <option value="China">
          <option value="Colombia">
          <option value="Comoros">
          <option value="Congo (Brazzaville)">
          <option value="Congo (Kinshasa)">
          <option value="Costa Rica">
          <option value="Cote d'Ivoire">
          <option value="Croatia">
          <option value="Cuba">
          <option value="Cyprus">
          <option value="Czechia">
          <option value="Denmark">
          <option value="Diamond Princess">
          <option value="Djibouti">
          <option value="Dominica">
          <option value="Dominican Republic">
          <option value="Ecuador">
          <option value="Egypt">
          <option value="El Salvador">
          <option value="Equatorial Guinea">
          <option value="Eritrea">
          <option value="Estonia">
          <option value="Eswatini">
          <option value="Ethiopia">
          <option value="Fiji">
          <option value="Finland">
          <option value="France">
          <option value="Gabon">
          <option value="Gambia">
          <option value="Georgia">
          <option value="Germany">
          <option value="Ghana">
          <option value="Greece">
          <option value="Grenada">
          <option value="Guatemala">
          <option value="Guinea">
          <option value="Guinea-Bissau">
          <option value="Guyana">
          <option value="Haiti">
          <option value="Holy See">
          <option value="Honduras">
          <option value="Hungary">
          <option value="Iceland">
          <option value="India">
          <option value="Indonesia">
          <option value="Iran">
          <option value="Iraq">
          <option value="Ireland">
          <option value="Israel">
          <option value="Italy">
          <option value="Jamaica">
          <option value="Japan">
          <option value="Jordan">
          <option value="Kazakhstan">
          <option value="Kenya">
          <option value="Korea, South">
          <option value="Kosovo">
          <option value="Kuwait">
          <option value="Kyrgyzstan">
          <option value="Laos">
          <option value="Latvia">
          <option value="Lebanon">
          <option value="Lesotho">
          <option value="Liberia">
          <option value="Libya">
          <option value="Liechtenstein">
          <option value="Lithuania">
          <option value="Luxembourg">
          <option value="MS Zaandam">
          <option value="Madagascar">
          <option value="Malawi">
          <option value="Malaysia">
          <option value="Maldives">
          <option value="Mali">
          <option value="Malta">
          <option value="Marshall Islands">
          <option value="Mauritania">
          <option value="Mauritius">
          <option value="Mexico">
          <option value="Micronesia">
          <option value="Moldova">
          <option value="Monaco">
          <option value="Mongolia">
          <option value="Montenegro">
          <option value="Morocco">
          <option value="Mozambique">
          <option value="Namibia">
          <option value="Nepal">
          <option value="Netherlands">
          <option value="New Zealand">
          <option value="Nicaragua">
          <option value="Niger">
          <option value="Nigeria">
          <option value="North Macedonia">
          <option value="Norway">
          <option value="Oman">
          <option value="Pakistan">
          <option value="Panama">
          <option value="Papua New Guinea">
          <option value="Paraguay">
          <option value="Peru">
          <option value="Philippines">
          <option value="Poland">
          <option value="Portugal">
          <option value="Qatar">
          <option value="Romania">
          <option value="Russia">
          <option value="Rwanda">
          <option value="Saint Kitts and Nevis">
          <option value="Saint Lucia">
          <option value="Saint Vincent and the Grenadines">
          <option value="Samoa">
          <option value="San Marino">
          <option value="Sao Tome and Principe">
          <option value="Saudi Arabia">
          <option value="Senegal">
          <option value="Serbia">
          <option value="Seychelles">
          <option value="Sierra Leone">
          <option value="Singapore">
          <option value="Slovakia">
          <option value="Slovenia">
          <option value="Solomon Islands">
          <option value="Somalia">
          <option value="South Africa">
          <option value="South Sudan">
          <option value="Spain">
          <option value="Sri Lanka">
          <option value="Sudan">
          <option value="Suriname">
          <option value="Sweden">
          <option value="Switzerland">
          <option value="Syria">
          <option value="Taiwan*">
          <option value="Tajikistan">
          <option value="Tanzania">
          <option value="Thailand">
          <option value="Timor-Leste">
          <option value="Togo">
          <option value="Trinidad and Tobago">
          <option value="Tunisia">
          <option value="Turkey">
          <option value="US">
          <option value="Uganda">
          <option value="Ukraine">
          <option value="United Arab Emirates">
          <option value="United Kingdom">
          <option value="Uruguay">
          <option value="Uzbekistan">
          <option value="Vanuatu">
          <option value="Venezuela">
          <option value="Vietnam">
          <option value="West Bank and Gaza">
          <option value="Yemen">
          <option value="Zambia">
          <option value="Zimbabwe">
      </datalist>
          
          </div>
         <div class="modal-footer">
         <input  type="submit" class="btn btn-primary" value="Get graph">
         
    
         </div>
       </div>
      
      </form>
         
        </div>
      </div>
   </div>

    

      
        </div>

 

    
</body>

</html>