<?php 
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);


$crypted_password="BR";
if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $mail=$_POST['email'];
  $pass=$_POST['mdp'];
  $result = mysqli_query($con ,"SELECT * FROM users WHERE email='$mail' ") ;
  $row = mysqli_fetch_array($result);
  session_start();
  $_SESSION=$row;

  if( $_SESSION['mdp']==crypt($pass,$crypted_password)){
  header('Location: cours.php');
  
  }
  ELSE { echo"<script>alert('mot de passe incorrect');</script>";}
  
  
}
  

  ?>





<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Inscription- E-learning FST</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  </head>

<body>

   

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p><em>Université Sultan Moulay Slimane</em></p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="https://www.facebook.com/La-Facult%C3%A9-des-Sciences-et-Techniques-Beni-Mellal-100463131652150"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://plus.google.com/101221301471084901394"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.php" class="logo">
                          E-FST
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class=""><a href="index.php">Accueil</a></li>
                          <li class=""><a href="sign_up.php">S'inscrire Maintenant</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Cours</a>
                              <ul class="sub-menu">
                                  <li><a href="##">Informatique</a></li>
                                  <li><a href="##">Mathematique</a></li>
                                  <li><a href="##">Physique</a></li>
                                  <li><a href="##">Chimie</a></li>

                          </ul>
                          </li>
                          <li class=""><a href="index.php#contact">Contact Us</a></li> 
                          
                      </ul>                
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>CONNECTEZ-VOUS</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <section class="contact-us" id="contact">
    <div class="container">
                
       <div class="col-lg-12 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact"  method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 align="center">Connexion</h2>
                  </div>         
                  <div class="col-lg-3">
                    <fieldset>
                      <label>Email :</label>
                    </div>
                  <div class="col-lg-5">
                      <input name="email" type="text" id="name" pattern="^[a-zA-Z0-9]+[@]{1}[a-zA-Z0-9]+[.][a-zA-Z]{2,3}$" placeholder="Votre Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4 clearfix">
                  </div>
                  <div class="col-lg-3">
                    <fieldset>
                      <label>Mot de passe :</label>
                    </div>
                    <div class="col-lg-5">
                    <input name="mdp" type="password" id="pwd" pattern="[-a-zA-Z0-9-_@./\]]{8,}" placeholder="Votre Mot de passe" required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4 clearfix">
                  </div>
                    
                
                  <div class="col-lg-12 " align="center">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">CONNEXION</button>
                    </fieldset>
                  </div>
                </div>
              </form>
          
            </div>
            </div>
            </div>
            </div>
            </section>

              
      

            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="index.php#top">Retour à l'acceuil</a>
              </div>
            </div>
        
   

    
    <div class="footer">
      <p>Copyright © Faculté des Sciences et Techniques 
          <br>Design: <a href="#ZACH666" >ZACHQAFFOU</a></p>
		  </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>


  </body>

</html>
