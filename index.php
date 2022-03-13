<?php

$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nom=$_POST['name'];
    $mail=$_POST['email'];
    $sub=$_POST['subject'];
    $msg=$_POST['message'];
	$query="INSERT INTO `msg`(`nom`, `email`, `sujet`, `message`) VALUES ('$nom','$mail','$sub','$msg');";
mysqli_query($con,$query);}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="fonts/fonts.css" rel="stylesheet">

    <title>Bibliothèque en ligne</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">



  </head>

<body>

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
                      <a href="index.php" class="logo">
                          E-Biblio
                      </a>
                      <!-- ***** Menu Start ***** --->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top">Accueil</a></li>
                          
                          <li class="has-sub">
                              <a href="javascript:void(0)">Cours</a>
                              <ul class="sub-menu">
							  
                                 <?php
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);
$query="SELECT * from `article` GROUP BY `idCours` ;";
$res=mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($res)){echo"<li><a >".strtoupper($row['titre'])."</a></li>"; if($i==5)break;  $i++;} 
                                  
?>
                          </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
                         
						  
						  <?php 
						  session_start();
						  if(empty($_SESSION['idUser'])) {echo"<li class=''><a href='sign_up.php'>S'inscrire Maintenant</a></li> <li class=''><a href='login.php' class='active'>Se connecter</a></li> "; }
						  else {  
						  $id=$_SESSION['idUser'];
						  $host="localhost";
						  $user="root";
						  $pw="";
						  $ndb="elearn";
						  $con=mysqli_connect($host,$user,$pw,$ndb);
						  $result = mysqli_query($con ,"SELECT * FROM `users` where `idUser` ='$id' ;") ;
						  $row = mysqli_fetch_array($result);
						  if(strcmp($id,$row['idUser'])==0) echo" <li class=''><a href='out.php' class='active'>Se déconnecte</a></li> ";}					  ?>
                          
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

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/fst.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Bienvenu chez nous</h6>
              <h2>Welcome to E-Learning FST-BM</h2>
              <p>Notre plateforme vous aide a trouver votre formation convenable à partir de vos appareils et les suivez chez vous.</p>
              <div class="main-button-red">
                  <a href="sign_up.php">Inscrivez-vous maintenant</a>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div>
              <div class="down-content">
                <h4>Meilleure Fromation</h4>
                <p>Notre cours enligne ont une approche academique professionel qui vous aide a bien comprendre vos cours.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Meilleurs enseignants</h4>
                <p>Nos enseignants sont des professeurs competant et de qualité avec une experience de plus de 5 ans.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Meilleurs etudiants</h4>
                <p>La plupart de nos laureat ont pu améliore leur carriere academique d'une façons exponentiel.</p>
              </div>
            </div>
          
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Meilleur reseau</h4>
                <p>Nous sommes pas les premiers mais nous sommes les meilleurs!!. </p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Nos Cours</h2>
          </div>
        </div>
        <div class='col-lg-4'>
          <div class="categories">
            <h4>Cours</h4>
            <ul>
			<?php
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);
$query="SELECT * from `article` GROUP BY `idCours` ;";
$res=mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($res)){echo"<li><a >".strtoupper($row['titre'])."</a></li><br>"; if($i==5)break;  $i++;}

            echo"</ul>
            <div class='main-button-red'>
              <a href='cours.php'>Tout nos cours</a>
            </div>
          </div>
        </div>
        <div class='col-lg-8'>
          <div class='row'>";
 $res=mysqli_query($con,$query);        
$i=0;
while($row = mysqli_fetch_array($res) ){
	 echo"<div class='col-lg-6'>
              <div class='meeting-item'>
                <div class='thumb'>
                  <div class='price'>
                    <span>".rand(3,5)."/5</span>
                  </div>
                  <a ><img src='".$row['img']."'></a>
                </div>
                <div class='down-content'>
                
                  <a ><h4>".$row['titre']."</h4></a>
                  ";
				  if($i%2==0)echo"<p>Cours complet ".$row['titre']." From zero to Hero</p>";
				  else echo"<p>Tout apprendre sur ".$row['titre']."</p>";
				echo"
                </div>
              </div>
            </div>";
	if($i==4)break;
	$i++;
}

?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>Certifiez-vous maintenant</h3>
                <p>Apres que vous metrisez nos cours vous pouvez vous certifier tout on passent un test.</p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#top">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h3>Acces a nos bibliotheque</h3>
                <p>Plus que 300 cours vous attends !!.</p>
                <div class="main-button-yellow">
                  <div class="scroll-to-section"><a href="#top">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            <article class="accordion">
                <div class="accordion-head">
                    <span>a propos de FST</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>La Faculté des Sciences et Techniques de Beni Mellal (FSTBM) relevant de l’Université Sultan Moulay Slimane a été créée en 1994. C’est un établissement public d’enseignement supérieur scientifique et technique à accès régulé dont le but est de développer des programmes d’enseignement et de recherche répartis sur quatre cycles (Licence, Master, Cycle d’Ingénieur et Doctorat) offerts par neuf départements : Sciences de la Vie, Sciences de la Terre, Chimie et Environnement, Physique, Mathématiques, Informatique, Génie Electrique, Génie Mécanique et Langues et Communication.</p>
                    </div>
                </div>
            </article>
            <article class="accordion">
                <div class="accordion-head">
                    <span>Mot du doyen</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Avant tout, je suis fier de diriger la Faculté des Sciences et Techniques de Beni Mellal (FSTBM) relevant de L’Université Sultan Moulay Slimane (USMS). C’est un grand défi pour moi et un grand honneur. Qui plus est, assumer une telle responsabilité exige détermination, crédibilité et de grands sacrifices. Ainsi, je suis prêt à relever tous les défis grâce à l’implication inclusive du corps professoral et administratif et des opérateurs concernés.<br>Ouverte sur son environnement extérieur, autant sur le plan national qu’international, la FSTBM est une source d’enseignements, de connaissances, de formations et de recherches qui participe à la promotion tous azimuts de la recherche scientifique et de l’innovation.<br>L’USMS, dont relève la FSTBM, a toujours œuvré sur le plan national et international dans l’optique de participer à la promotion de la Recherche scientifique et de l’innovation tout en plaidant pour le renforcement des relations de coopération avec tous les partenaires et les opérateurs socioéconomiques concernés en vue de s’ouvrir davantage sur son environnement extérieur.<br>Et dans le dessein de participer au développement de la Recherche et de la Formation, la FSTBM a élaboré une stratégie à même de répondre aux besoins croissants socioéconomiques de Recherche et de formation de la Région de Beni Mellal Khénifra tout en mettant en avant ses initiatives innovantes de valorisation, d’orientation et de suivi en vue de la conceptualisation de ses projets pédagogiques de grande envergure. La FSTBM met aussi en exergue la réalisation de ses activités sportives et culturelles en vue de booster l’épanouissement et l’intégration de l’étudiant dans son entourage universitaire.</p>
                    </div>
                </div>
            </article>
    
            <article class="accordion last-accordion">
                <div class="accordion-head">
                    <span>Partagez avec vos collegues</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Notre site rendre l'information plus proche a vous </p>
                    </div>
                </div>
            </article>
        </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Nos professeurs</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <?php
				$query="select * from prof;";
				$res= mysqli_query($con,$query);
				while($row = mysqli_fetch_assoc($res)) {				
				  echo" <div class='item'>
              <img src='$row[img]'>
              <div class='down-content'>
                <h4>$row[nom] $row[prenom]</h4>
                <div class='info'>
                  <div class='row'>
                    <div class='col-8'>
                      <ul>";
					  $nb=intval($row['score']);
					  $sc=$nb*20;
					  for($i=0;$i<$nb;$i++){
					  echo"<li><i class='fa fa-star'></i></li>";
					  }
					  echo"</ul>
                    </div>
                    <div class='col-4'>
                       <span>".$sc."%</span>
                    </div>
                  </div>
                </div>
              </div>
				</div>";}
			?>
			
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>Nos chiffres</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit"><?php 
$query="SELECT count(`idUser`) as T from `users`;";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
					echo ($row['T']);   ?></div>
                    <div class="count-title">Utilisateurs</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">6537</div>
                    <div class="count-title">Lauréats</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit"><?php 
$query="SELECT count(`idProf`) as T from `prof`;";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
					echo ($row['T']);   ?></div>
                    <div class="count-title">Enseignants</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit"><?php 
$query="SELECT count(`idAdmin`) as T FROM  `moderateur` where grade='SA';";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
					echo ($row['T']);   ?></div>
                    <div class="count-title">Fonctionnaires</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="https://www.youtube.com/watch?v=xpPIE2JrWAk" target="_blank"><img src="assets/images/play-icon.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Contactez nous</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="NOM*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]+@[^ @]+[.][a-zA-Z]{2,3}{" placeholder="exemple@domain.com*" required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUJET" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="VOTRE MESSAGE" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>

              <li>
                <h6>Telephone</h6>
                <span> +212 (0) 523 48 51 12</span>
              </li>
              <li>
                <h6>Adresse email</h6>
                <span>fstbm@usms.ma</span>
              </li>
              <li>
                <h6>Adresse du Campus</h6>
                <span>Campus  Mghilla,  BP 523  ,  23000  Béni Mellal</span>
              </li>
              <li>
                <h6>Site officiel</h6>
                <span>www.fstbm.ac.ma</span>
              </li>
            </ul>
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