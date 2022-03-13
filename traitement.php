<?php 
$host="localhost";
$user="root";
$pw="";
$ndb="firstform";
$con=mysqli_connect($host,$user,$pw,$ndb);

$crypted_password="BR";
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$mail=$_POST['mail'];
	$pass=$_POST['mdp'];
	$result = mysqli_query($con ,"SELECT email, mdp, nom, prenom FROM users WHERE email='$mail' ") ;
	$row = mysqli_fetch_array($result);
	session_start();
    $_SESSION=$row;

	if( $_SESSION['mdp']==crypt($pass,$crypted_password)){
	header('Location: profil.php');
	}
	ELSE {header('Location: connexion.php'); echo"<script>alert('mot de passe incorrect')</script>";}

	
	
}
	

	?>