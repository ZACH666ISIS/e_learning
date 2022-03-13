<?php 
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

if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_user = $_POST['id'];
	if(isset($_POST['test'])){
	$query="DELETE FROM `users` WHERE CIN='$id_user' || idUser='$id_user' ;";
	$result=mysqli_query($con,$query);
	if(mysqli_affected_rows($con)===null)echo"<script>alert('element bien supprimer');</script>";
	else echo"<script>alert('Donnée incorrect');</script>";
	}
	else{
		$titre=$_POST['act'];
		$valeur=$_POST['mod'];
		$query="UPDATE `users` SET $titre='$valeur' WHERE CIN='$id_user' || idUser='$id_user' ;";
		$result=mysqli_query($con,$query);
		if($result)echo"<script>alert('element bien modifier');</script>";
	 else echo"<script>alert('Donnée incorrect');</script>";
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
 
	<form method="POST" >
	<table>
	<tr>
	<td><label>Enter identité d'utilisateur</label></td>
	<td><input name="id" placeholder="CIN ou id" required></td>
	</tr>
	<tr>
	<td><label>Cochez si tu veux supprimer</label></td>
	<td><input type="checkbox" onchange="getChecked()" id='check1' name="test" value="1">
</td>
	</tr>
	
	<tr id="modifier" >
	<td><label>La valeur a modifier</label></td>
	<td><select name="act" id="act" onblur="getVal()" >
        <option value="nom">Nom</option>
        <option value="prenom">Prenom</option>
        <option value="ddn">Date de naissance</option>
		<option value="sexe">Sexe</option>
        </select>
    </td>
	
	
	<td  > 
	<div id="enter_1"><input id="mod" type="" name="mod" ></div>
	<div id="enter_2" style="display:none" > 
	<input id="mod_2" type="radio" name="mod1" value="MAS" >Homme
	<input id="mod_2" type="radio" name="mod1" value="FEM" >Femme
	</div>
	</td>

	
	</tr>

	
	
	<tr>
	<td><input class="btn btn-primary" type="submit" id="send" value="Modifier"></td>
	<td><input class="btn btn-danger"  type="reset"></td>
	</tr></table></form></div>
	</div></body>

<script>
function getChecked() {
  const checkBox = document.getElementById('check1').checked;
  if (checkBox === true) {
      document.getElementById('modifier').style.visibility = "hidden";
	  document.getElementById('send').value = "Supprimer";
	  document.getElementById('enter_1').style.visibility = "hidden";
	  document.getElementById('enter_2').style.visibility = "hidden";


    } else {
      document.getElementById('modifier').style.visibility = "visible";
	  document.getElementById('send').value = "Modifier";
	  document.getElementById('enter_1').style.visibility = "visible";
	  document.getElementById('enter_2').style.visibility = "visible";
  }
}

function getVal() {
  var select = document.getElementById('act');
  var value = select.options[select.selectedIndex].value; 
  
  if(value==="sexe"){
	  document.getElementById('enter_2').style.display = "inline";
	  	  document.getElementById('enter_1').style.display = "none";

  }else{
	  document.getElementById('enter_2').style.display = "none";
	  	  document.getElementById('enter_1').style.display = "inline";
		  if(value=="ddn"){ document.getElementById('mod').type ="date"; }
		  else{ document.getElementById('mod').type ="text";}

  }
}
</script>

</html>