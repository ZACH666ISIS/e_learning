<?php


session_start();
if(isset($_SESSION['idUser'])){
$id=$_SESSION['idUser'];
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);
$result = mysqli_query($con ,"SELECT * FROM `users` where `idUser` ='$id' ;") ;
$row = mysqli_fetch_array($result);
if(strcmp($id,$row['idUser'])==0)$t=1;
else
	header('Location: sign_up.php');
}
else
	header('Location: sign_up.php');


?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education - List des cours</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

   

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
<p><em>Université Sultan Moulay Slimane</em></p>          </div>
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
                          <li class="has-sub">
                              <a href="javascript:void(0)">Cours</a>
                              <ul class="sub-menu">
                                  <li><a href="##">Informatique</a></li>
                                  <li><a href="##">Mathematique</a></li>
                                  <li><a href="##">Physique</a></li>
                                  <li><a href="##">Chimie</a></li>

                          </ul>
                          </li>
                          <li class=""><a href="out.php">Déconnexion</a></li> 
                          
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
          <h6>Bienvenu <?php echo ($row['nom'].", ".$row['prenom']);?></h6>
          <h2>Nos Cours</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="filters">
                <ul>
                  <li data-filter="*"  class="active">Tout</li>
                  <?php $host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);
$result = mysqli_query($con ,"SELECT titre,count(titre) as nbr FROM `article` GROUP BY `titre`;") ;
 while($row = mysqli_fetch_array($result)) echo"<li data-filter='.$row[titre]'>$row[titre]</li>"; 
?>
                  
				  
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row grid">
                
               
          
              
               
               <?php
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);

$result = mysqli_query($con ,"SELECT * FROM `ARTICLE` ;") ;
$nb=mysqli_num_rows($result);
// for($i=0;$i<$nb;$i++){
	
    while($row = mysqli_fetch_array($result)) {

        echo"<div class='col-lg-4 templatemo-item-col all ".$row['titre']."'>
                  <div class='meeting-item'>
                    <div class='thumb'>
						<div class='price'>
					  <a href='".$row['pdf']."'  download> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
  <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
  <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
</svg></a></div>
                      <a href='".$row['pdf']."' target='_blank' ><img src='".$row['img']."' ></a>
					
				
					  
                    </div>
                    <div class='down-content'>
                     
                      <a href='".$row['pdf']."' target='_blank' ><h4>".$row['titre']."</h4></a>
                      <p class='d-inline-block text-truncate' style='max-width: 200px; max-width: 200px;' >".$row['matiere']."</p>
                    </div>
                  </div>
                </div>";
    }
// }



?>
             
                
                
              </div>
            </div>
            <div class="col-lg-12">
              <div class="pagination">
                <ul>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
    <script src="assets/js/isotope.js"></script>
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
