<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style3.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="pace.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-bez@1.0.11/src/jquery.bez.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>

        <!-- Google Fonts -->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&family=Play:wght@700&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
            <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

        <!-- My Stylesheet -->
            <link rel="stylesheet" href="cryptocurrency.css">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3e4892fa2e.js" crossorigin="anonymous"></script>

        <!--https://materialdesignicons.com-->
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
        <script src="home.js"></script>

         <!--clock-->
         <link rel="stylesheet" href="clock.css">
         <script src="clock.js"></script>




        

        <title>Home</title>

    </head>
    
    <body>

    
    
    
    
    

    
    
    
    <div id="clockContainer">
        <div id="hour"></div>
        <div id="minute"></div>
        <div id="second"></div>
    </div>
        
    
     
        <div id="preloader">
            <div class="p"><h1>LOADING</h1></div>
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

<i style="font-size: 3.5rem;" id="zorox" class="fas fa-table"></i>
<i style="font-size: 3.5rem;" id="zoroy" class="fas fa-map-marker-alt"></i>
<i style="font-size: 3.5rem;" id="zoroz" class="fas fa-users"></i>
<a href="logout.php"><i style="font-size: 2.5rem;" id="zorow" class="fas fa-sign-out-alt"></i></a>
<a href="graph.php"><i style="font-size: 2.4rem;" id="zorov" class="fas fa-chart-pie"></i></a>


<div id="content-container" >
    <div id="page_cryptocurrency_ek1"  >
        <div id="_bg__cryptocurrency_ek2"  ></div>
        <img src="mask_group_1.png" id="mask_group_1" />
        <div id="rectangle_386"  ></div>
        ><div href="#" id="rectangle_387"  ></div>
        <div id="rectangle_3871"  ></div>
        <img src="image_1.png" id="image_1" />

        <div id="group_1"  >
            <div id="c_square"  >
                C - S Q U A R E 
            </div>
            <div id="project" >
                PROJECT
            </div>

        </div>

        <div id="group_4"  >

            <div id="group_2"  >
                <div id="ellipse_1"  ></div>

                <div id="bar_chart_2"  >
                <div id="rectangle_374"  ></div>
                    <img src="path_1076.png" id="path_1076" />
                    <img src="path_1077.png" id="path_1077" />
                    <img src="path_1078.png" id="path_1078" />

                </div>

            </div>

            <div id="group_3"  >
                <div id="manage_assets" >
                    <a style="color: white" href= "tabular.php">Tabular</a>
                </div>
                <div id="trade_with_upto_5x_leverage_for_spot_trading" >
                    Check out the current covid stats in tabular format.
                </div>

            </div>

        </div>
        <img src="path_1100.png" id="path_1100" />
        <img src="path_1100.png" id="path_11001" />

        <div id="group_5"  >

            <div id="group_2_ek1"  >
                <div id="ellipse_1_ek1"  ></div>

                <div id="briefcase"  >
                    <div id="rectangle_384"  ></div>
                    <img src="path_1097.png" id="path_1097" />
                    <img src="path_1098.png" id="path_1098" />
                    <img src="path_1099.png" id="path_1099" />

                </div>

            </div>

            <div id="group_3_ek1"  >
                <div id="credit_card_payment" >
                    <a style="color: red" href= "dynamic_map.php">Dynamic Map</a>
                </div>
                <div id="buy_cryptocurrency_with_your_credit_card_via_our_certified_partner" >
                    Visualise all of it..!
                </div>

            </div>

        </div>

        <div id="group_6"  >

            <div id="group_2_ek2"  >
                <div id="ellipse_1_ek2"  ></div>

                <div id="backspace"  >
                    <div id="rectangle_373"  ></div>
                    

                </div>

            </div>

            <div id="group_3_ek2"  >
                <div id="secure_storage" >
                    <a style="color: white" href= "about2.php">About Us</a>
                </div>
                <div id="credit_funds_held_in_dedicated_multi_sign_code_wallet__24_7_monitoring_" >
                    Get to know us and connect with us via our 'contact us' services.
                </div>

            </div>

        </div>

    </div>
</div>

<!-- start webpushr code --> <script>(function(w,d, s, id) {if(typeof(w.webpushr)!=='undefined') return;w.webpushr=w.webpushr||function(){(w.webpushr.q=w.webpushr.q||[]).push(arguments)};var js, fjs = d.getElementsByTagName(s)[0];js = d.createElement(s); js.id = id;js.async=1;js.src = "https://cdn.webpushr.com/app.min.js";fjs.parentNode.appendChild(js);}(window,document, 'script', 'webpushr-jssdk'));webpushr('setup',{'key':'BI8mcM6H9qtMfRYgWVaz9J11XOQweMxqaN1C-HCX8LWKW2jR2cDIFG7k0MmWOZYwN7rJepjFQj7AwL0SV6RuekA' });</script><!-- end webpushr code -->


    </body>
    
</html>