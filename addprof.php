<?php 
function imageResize($imageResourceId,$width,$height) {


    $targetWidth =370;
    $targetHeight =225;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
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
if(strcmp($grd,"SA")!=0)header ('Location: addarticle.php');
else{
if($_SERVER['REQUEST_METHOD']=='POST'){
	$pnom=$_POST['pnom'];
	$pprenom=$_POST['pprenom'];
	$pmdp=$_POST['pmdp'];
	$pmail=$_POST['pmail'];
	$pcin=$_POST['pcin'];
	$score=$_POST['score'];
	$query="SELECT * from `moderateur` where `email` = '$pmail' ;";
	$res=mysqli_query($con,$query);
	$row = mysqli_fetch_array($res);
	if(isset($row['nom'])){ 
    echo"<script>alert('Moderateur déja ajouté');</script>";
    }
	else{
	$query="INSERT INTO `moderateur`( `nom`, `prenom`, `grade`, `email`, `password`) VALUES ('$pnom','$pprenom','PROF','$pmail','$pmdp');";
	if(mysqli_query($con,$query))echo"<script>alert('Moderateur Ajouté');</script>";
//Ajoute un professeur	
	if(isset($_FILES['pimg']) ){
   // upload image
	$doc='img/';
	$tmp_name=$_FILES['pimg']['tmp_name'];
	$sourceProperties = getimagesize($tmp_name);
	$ext = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
	$imageType = $sourceProperties[2];
	$NvNom = time();
	
        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$doc. $NvNom. "_index.". $ext);
                break;


            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$doc. $NvNom. "_index.". $ext);
                break;


            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$doc. $NvNom. "_index.". $ext);
                break;


            default:
                echo "<script> alert('Invalid Image type');</script>";
                exit;
                break;
        }
	
	$img_dir=$doc. $NvNom. "_index.". $ext;
	$date=date("Y-m-d");
	$query="SELECT * FROM `moderateur` WHERE `email`='$pmail' ;";
	$res=mysqli_query($con,$query);
	$row = mysqli_fetch_array($res);
	 $idAdmin=$row['idAdmin'];
	
    $query="INSERT INTO `prof`( `nom`, `prenom`, `email`, `password`, `CIN`, `date_inscrp`,`img`, `score`,`idAdmin`) VALUES ('$pnom','$pprenom','$pmail','$pmdp','$pcin','$date','$img_dir','$score',$idAdmin);";
		if(mysqli_query($con,$query))echo"<script>alert('Professeur ajouté');</script>";
		
		}
	}
	
}}
}
		
else header('Location: admin.php');}


?>

<html>
<head> 
    <link href="login/css/bootstrap.css" rel="stylesheet" />
    <link href="login/css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<script src="login/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="login/js/bootstrap.js" type="text/javascript"></script>
	<script src="login/js/login-register.js" type="text/javascript"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

	</head>
	<body>
	<div class="container">
	<div class="col-lg-12">
   <?php echo"<h2>Bienvenue: <em>$nom $prenom</em> <br> Grade: <em>$grd</em> </h2>"; ?>
   </div>
   <div class="col-lg-12">
 
	<form enctype="multipart/form-data" method ="post">
	<table>
	<tr>
	<td><label>Nom</label></td>
	<td><input name="pnom" placeholder="Nom du professeur" ></td>
	</tr>
	<tr>
	<td><label>Prenom</label></td>
	<td><input name="pprenom" placeholder="Prenom du professeur" ></td>
	</tr>
	<tr>
	<td><label>E-mail</label></td>
	<td><input name="pmail" placeholder="Mail du professeur" ></td>
	</tr>
	<tr>
	<td><label>Mot de pass</label></td>
	<td><input type="password" pattern="[^ ]{8,}" placeholder="Mot de passe" name="pmdp" ></td>
	</tr>
	<tr>
	<td><label>CIN</label></td>
	<td><input type="text" placeholder="Numero du carte d'identite " name="pcin">
	</tr>
	<td><label>Rating</label></td>
	<td><input type="number" pattern="^[012345]{1}$" placeholder="Entre 0 et 5" name="score">
	</tr>
	<tr>
	<td><label>L'image</label></td>
	<td><input type="file" name="pimg"></td>
	</tr>
	
	

	
	
	<tr>
	<td><input class="btn btn-primary" type="submit" id="send" value="Envoyer"></td>
	<td><input class="btn btn-default" type="reset"></td>
	</tr></table></form></div>
	</div></body></html>