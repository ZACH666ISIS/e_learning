<?php 
function imageResize($imageResourceId,$width,$height) {


    $targetWidth =370;
    $targetHeight =225;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
session_start();
if($_SESSION['idAdmin']===NULL){
header('Location: admin.php');}
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
if(strcmp($grd,"SA")==0)header ('Location: addprof.php');
else{
if($_SERVER['REQUEST_METHOD']=='POST'){
	$titre=$_POST['titre'];
	$matiere=$_POST['mat'];
	$query="SELECT * from cours where `titre` = '$titre' ;";
	$res=mysqli_query($con,$query);
	$row = mysqli_fetch_array($res);
	if(strcmp("",$row['titre'])==0){ 
	$query="INSERT INTO `cours`(`titre` ) VALUES ('$titre');";	
	if(!mysqli_query($con,$query))print_r(mysqli_error_list($con));
}
    $query="SELECT * from cours where `titre` = '$titre' ;";
	$res=mysqli_query($con,$query);
	$row = mysqli_fetch_array($res);
	$idcours=$row['idCours'];
	if(isset($_FILES['img']) ){
   // upload image
	$doc='img/';
	$tmp_name=$_FILES['img']['tmp_name'];
	$doc2='pdf/';
	$tmp_pdf=$_FILES['pdf']['tmp_name'];
	$NvNom = time();
	$ext1 = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
	$pdf_dir=$doc2.$NvNom."_pdf.".$ext1;
	$pdf_type=$_FILES['pdf']['type'];
	if ($pdf_type=="application/pdf"){
	
	move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_dir);
		
		
	$sourceProperties = getimagesize($tmp_name);
	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
	$imageType = $sourceProperties[2];
	
        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$doc. $NvNom. "_article.". $ext);
                break;


            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$doc. $NvNom. "_article.". $ext);
                break;


            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($tmp_name); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$doc. $NvNom. "_article.". $ext);
                break;


            default:
                echo "<script> alert('Invalid Image type');</script>";
                exit;
                break;
        }
	$date=date("Y-m-d");
	$img_dir=$doc. $NvNom. "_article.". $ext;
        $query="INSERT INTO `article`( `idCours`,`titre`, `img`, `date_pub` ,`matiere`, `pdf`) VALUES('$idcours','$titre','$img_dir', '$date' ,'$matiere','$pdf_dir') ;";
		if(mysqli_query($con,$query))echo"<script>alert('Article bien Ajoute');</script>";
		}
	}else echo"<script>alert('Taille d'\image superieur à 1MO');</script>";
}
		
}
}
else header('Location: admin.php');


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
	<td><label>Titre</label></td>
	<td><input name="titre" placeholder="titre d'article" ></td>
	</tr>
	<tr>
	<td><label>Matiere</label></td>
	<td><input name="mat" placeholder="la matiere d'article" ></td>
	</tr>

	<tr>
	<td><label>Image de couverture</label></td>
	<td><input type="file" name="img" ></td>
	</tr>
	<tr>
	<td><label>Cours PDF</label></td>
	<td><input name="pdf" type="file"  >
</td>
	</tr>
	
	

	
	
	<tr>
	<td><input class="btn btn-primary" type="submit" id="send" value="Envoyer"></td>
	<td><input class="btn btn-default" type="reset"></td>
	</tr></table></form></div>
	</div></body></html>