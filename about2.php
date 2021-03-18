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
     
   
       
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="pace.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-bez@1.0.11/src/jquery.bez.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
     
     <title>About Us</title>
     <link rel="stylesheet" href="about3.css">
     

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!-- bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

     <!-- Google fonts -->
     <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&family=Play:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>
</head>
<body>

  <a href="logout.php"><i style="font-size: 2.5rem;" id="logout" class="fas fa-sign-out-alt"></i></a>
  <a href="contact_us.php"><i style="font-size: 2.5rem;" id="contact" class="fas fa-phone-square-alt"></i></a>
  <a href="home.php"><i style="font-size: 2.5rem;" id="home" class="fas fa-home"></i></a>

  <div id="csqr">C - S Q U A R E</div>
  


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



   
   <!-- Modal -->
   <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Kaustubh</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
          Hi there!<br>
          I am Kaustubh and I'm 19.<br>
          Currently in second year of my Bachelor of Technology (B.Tech) course in computer science.<br>
          I've been into web development for quite a good time now and made this website for fun.
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="https://github.com/Kaustubh0204"><button type="button" class="btn btn-primary ">View Github</button></a>
         </div>
       </div>
     </div>
   </div>
   <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Anuj</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
          Hello!<br>
I am Anuj and I'm 19.<br>
Currently pursuing computer engineering.<br>
I've got my major interests in vector art and creating unique illustrations.
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="https://github.com/bapuz"><button type="button" class="btn btn-primary ">View Github</button></a>
         </div>
       </div>
     </div>
   </div>
   <div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content bg-dark text-light">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Darshan</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
          Hey!<br>
I am Darshan and I'm 19.<br>
Completed two years of computer science btech course, two more to go.<br>
I've got my hands on app development and I enjoy watching anime.
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="https://github.com/Darshan120501"><button type="button" class="btn btn-primary ">View Github</button></a>
         </div>
       </div>
     </div>
   </div>

     <div class="bhendi">
     <div id="preloader">
          <div class="p"><h2>LOADING</h2></div>
      </div>

      

</div>

  <!--  <div class="bhendi">  -->

          <div class="content">
               <h1>Meet the team</h1>

               <div class="row">
                    <div class="cardd col-lg-5 card1">
                         <h5>Kaustubh Utturwar</h5>
                         <p>Web Developer</p>
                         <div data-toggle="modal" data-target="#exampleModal"><a href="#" >View profile</a></div>
                    </div>
               </div>
               
               <div class="row">
                    <div class="cardd col-lg-5 card2">
                         <h5>Anuj Patil</h5>
                         <p>Creative Designer</p>
                         <div data-toggle="modal" data-target="#exampleModal2"><a href="#">View profile</a></div>
                    </div>
               
               </div>

               <div class="row">
                    <div class="cardd col-lg-5 card3">
                         <h5>Darshan Rao</h5>
                         <p>App Developer</p>
                         <div data-toggle="modal" data-target="#exampleModal3"><a href="#">View profile</a></div>
                    </div>
               
               </div>
                    
               
          </div>
    
    <!--- </div> ------->

</body>
</html>