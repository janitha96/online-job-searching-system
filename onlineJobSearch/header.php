<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="web.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Find a great hotel for your vacation.</title>
  </head>
<style type="text/css">


</style>
  <body>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js">
  
    </script>
    <script src="js/java.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiMT1b7ENi3YVqQgLWyE0HPIXYcsz-dOY&callback=initMap">
</script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.9.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/jd16948-firebase-adminsdk-6h9t5-595d9c2afe.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://jd16948.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();


?>
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCmRd-c2l2QCXGTi3TaKwG3qijYHpMMJEI",
    authDomain: "jd16948.firebaseapp.com",
    databaseURL: "https://jd16948.firebaseio.com",
    projectId: "jd16948",
    storageBucket: "jd16948.appspot.com",
    messagingSenderId: "741194248771",
    appId: "1:741194248771:web:2ab9199ef03ff9a33ddaf6"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>

<!------ Include the above in your HEAD tag ---------->
<?php 
  if (isset($_SESSION['u_name'])) {
    echo '<form action="includes/logout.inc.php" method="POST">
<div class="navbar navbar-expand-md navbar-light bg-transparent mb-4" role="navigation" id="navBarColor">
    <a class="navbar-brand" href="index.php">R I F</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th" style="font-size:24px"></i> More</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
            <li class="nav-item">
              <a class="nav-link" href="beahost.php" id="navBarLinks"><i class="fas fa-home" style="font-size:20px"></i>Be a host <span class="sr-only">(current)</span></a>
            </li>
                  <!--   <li class="dropdown-item" href="#"><a>Action 1</a></li> -->';?>
    <?php 

     $uname=$_SESSION['u_name'];
    $retrive="signupMembers";
    
        $data=  $database->getReference($retrive)->getValue();
              foreach ($data as $key => $row) {
         
        } 

     if ($row['uname']==$uname) {
       echo ' <li class="nav-item">
               <a class="nav-link" href="updateProfile.php" id="navBarLinks"><i class="fas fa-edit" style="font-size:20px"></i>   Update profile</a> 
              </li>';

       
     }else{
      echo '<li class="nav-item">
              <a class="nav-link" href="becomeHost.php" id="navBarLinks">Become a host</a>
            </li> ';

     }
      
 echo ' <li class="nav-item">
              <a class="nav-link" href="yourBookings.php" id="navBarLinks"><i class="far fa-file" style="font-size:20px"></i>&nbsp;&nbsp;Bookings</a>
            </li>
            <li class="nav-item dropdown dmenu">
            <a class="nav-link" href="viewProfile.php" id="navBarLinks" ><i class="far fa-eye" style="font-size:20px"></i> Veiw profile</a>

          </li>

          ';?>
                                  <?php 
     $uname=$_SESSION['u_name'];
    $retrive="signupMembers";
    
        $data=  $database->getReference($retrive)->getValue();
              foreach ($data as $key => $row) {
          
        } 


     if ($row['uname']==$uname) {
       echo '<li class="nav-item">
              <a class="nav-link" href="admin.php" id="navBarLinks"><i class="far fa-user" style="font-size:20px"></i> Admin</a>
            </li>';

       
     }else{
      echo '

      ';

     }
      
echo ''; 

  echo ' 
              <li class="nav-item "><i class="fas fa-power-off" style="font-size:20px"></i>
               <button class="" type="submit" id="" name="submit-logout">Log out</button>
              </li>
              <br>
               <li class="nav-item  ">
               <p class=""><b>Hello  </b>'.$_SESSION["u_name"].'</P>
              </li>

  

                </ul>
            </li>

        </ul>

    </div>
</div>   </form>';
}else{
        echo ' <form action="includes/login.inc.php" method="POST">
                   <div class="navbar navbar-expand-md navbar-light bg-transparent mb-4" role="navigation" id="navBarColor">
   
            <a class="navbar-brand" href="#">J O B</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


 <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown ml-auto">
            

         <a class="btn btn-link btn-sm mr-sm-3" id="signin_button" href="login.php" >Sign in</a>              
        </li>
       </ul>

        </div> 
        
        </div>
       </form>';
}

?>

<style type="text/css">
  .navbar .dropdown-toggle, .navbar .dropdown-menu a {
    cursor: pointer;
}

.navbar .dropdown-item.active, .navbar .dropdown-item:active {
    color: inherit;

    text-decoration: none;
    background-color: inherit;
}

.navbar .dropdown-item:focus, .navbar .dropdown-item:hover {
    color: #16181b;
    text-decoration: none;
    background-color: #f8f9fa;
}
/*
@media (min-width: 767px) {
    .navbar .dropdown-toggle:not(.nav-link)::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .5em;
        vertical-align: 0;
        border-bottom: .3em solid transparent;
        border-top: .3em solid transparent;
        border-left: .3em solid;
    }
}*/
.dropdown-menu{
  width: 200px;
}
.nav-item{
  margin-left: 10px;
}
.collapse navbar-collapse{
  float: right;
}
</style>


<script type="text/javascript">
  $(document).ready(function () {

    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });

});
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


<style type="text/css">
  .ml6 {
 /* position: relative;*/
  font-weight: 900;
  font-size: 15px;
}

.ml6 .text-wrapper {

}

.ml6 .letter {
  display: inline-block;
  line-height: 1em;
}
</style>

<script type="text/javascript">
  // Wrap every letter in a span
var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>