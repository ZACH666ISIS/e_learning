
<?php 
session_start();
if(empty($_SESSION['idAdmin'])){
header('Location: admin.php');}
else{
$id=$_SESSION['idAdmin'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$grd=$_SESSION['grade'];
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);
$result = mysqli_query($con ,"SELECT * FROM `moderateur` where `idAdmin` ='$id' ;") ;
$row = mysqli_fetch_array($result);

if(strcmp($id,$row['idAdmin'])==0){
echo"<script>alert('Bienvenu');</script>";}
else header('Location: admin.php');
}
 

	

?>

<html>
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="vendor/bootstrap/js/.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-lg-12">
<?php echo"Bienvenu $nom $prenom <br> Grade: $grd"; ?>
</div>

<div class="col-lg-3">
<a class="btn btn-primary" href="search.php">Chercher</a></button>
</div>
<div class="col-lg-3">
<?php if(strcmp($grd,"SA")==0)echo"<a  class='btn btn-primary' href='addprof.php' >Ajouter Professeur</a></button>";
       else echo"<a  class='btn btn-primary' href='addarticle.php' >Ajouter article</a></button>";

 ?>
</div>
<div class="col-lg-3">
<a class="btn btn-primary" href="gestion.php">Modifier utilisateur</a></button>
</div>
<div class="col-lg-3">
<a class="btn btn-danger" href="out.php" >Déconnexion</a></button>
</div>
</div>
</div>




</body>
</html>