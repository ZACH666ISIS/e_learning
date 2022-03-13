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
echo"";}else header('Location: admin.php');

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
	<td><input name="id" placeholder="CIN ou id" ></td>
	</tr>
	
	<tr id="modifier" >
	<td><label>Type</label></td>
	<td><select name="qui" id="act" onblur="getVal()" >
	    <option value="all">Tout</option>
        <option value="prof">professeur</option>
        <option value="users">etudiant</option>
        </select>
    </td>
	
	</tr>	
	<tr>
	<td><input class="btn btn-primary" type="submit" id="send" value="chercher"></td>
	<td><input class="btn btn-default" type="reset"></td>
	</tr></table></form></div>
	
	
	<?php
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$type=$_POST['qui'];
	$v="all";
	$id_user = $_POST['id'];
	if(strcmp("",$id_user)!=0){
	
	if(strcmp($v,$type)==0){ 
         $t=1;
	     $query1="SELECT * FROM `users` where`CIN`='$id_user' || `idUser`='$id_user';";
		 $query2="select *  FROM `prof` where `CIN`='$id_user' || `idProf`='$id_user';";
	}
	else {$t=0;
	    if(strcmp("prof",$type)==0)$query="select * FROM $type WHERE `CIN`='$id_user' || `idProf`='$id_user';"; 
		else  $query="select * FROM $type WHERE `CIN`='$id_user' || `idUser`='$id_user' ;";
		} 
		
	}
	else{
		  if(strcmp($v,$type)==0){ 		
		  $t=1; 
          $query1="select * FROM `users` ;";
	      $query2="select * FROM `prof`;";
		}
	    else {$t=0; 
		    $query="select * FROM $type;"; 
		
		}
	
	}
	             
	if($t==1){
	$res= mysqli_query($con,$query1);
	if(!$res)print_r(mysqli_error_list($con));
	   echo"<table class='table table-striped table-dark'>";
		            echo"<tr><td>Id Etudiant</td>";
					echo"<td>Nom</td>";
					echo"<td>Prenom</td>";
					echo"<td>Email</td>";
					echo"<td>Date de naissance</td>";
					echo"<td>Sexe</td>";
					echo"<td>Telephone</td></tr>";
	
				while($row = mysqli_fetch_assoc($res)) {
					
					echo"<tr><td>$row[idUser]</td>";
					echo"<td>$row[nom]</td>";
					echo"<td>$row[prenom]</td>";
					echo"<td>$row[email]</td>";
					echo"<td>$row[ddn]</td>";
					echo"<td>$row[sexe]</td>";
					echo"<td>+212$row[telephone]</td></tr>";
				}
					   echo"</table>";
	$res= mysqli_query($con,$query2);
	
	 echo"<table class='table table-striped'>";
		            echo"<tr><td>Id Professeur</td>";
					echo"<td>Nom</td>";
					echo"<td>Prenom</td>";
					echo"<td>Email</td>";
					echo"<td>Date d'inscription</td>";
					echo"<td>CIN</td></tr>";
				while($row = mysqli_fetch_assoc($res)) {
					
					echo"<tr><td>$row[idProf]</td>";
					echo"<td>$row[nom]</td>";
					echo"<td>$row[prenom]</td>";
					echo"<td>$row[email]</td>";
					echo"<td>$row[date_inscrp]</td>";
					echo"<td>$row[CIN]</td></tr>";
				}
				echo"</table>";
	}
	else{
		$res= mysqli_query($con,$query);
		if(!$res)print_r(mysqli_error_list($con));
			if(strcmp("prof",$type)==0){
			 echo"<table class='table table-striped'>";
		            echo"<tr><td>Id Professeur</td>";
					echo"<td>Nom</td>";
					echo"<td>Prenom</td>";
					echo"<td>Email</td>";
					echo"<td>Date d'inscription</td>";
					echo"<td>CIN</td></tr>";
				while($row = mysqli_fetch_assoc($res)) {
					
					echo"<tr><td>$row[idProf]</td>";
					echo"<td>$row[nom]</td>";
					echo"<td>$row[prenom]</td>";
					echo"<td>$row[email]</td>";
					echo"<td>$row[date_inscrp]</td>";
					echo"<td>$row[CIN]</td></tr>";
				}
				echo"</table>";
			
			}
			else{
			  echo"<table class='table table-striped table-dark'>";
		            echo"<tr><td>Id Etudiant</td>";
					echo"<td>Nom</td>";
					echo"<td>Prenom</td>";
					echo"<td>Email</td>";
					echo"<td>Date de naissance</td>";
					echo"<td>Sexe</td>";
					echo"<td>Telephone</td></tr>";
	
				while($row = mysqli_fetch_assoc($res)) {
					echo"<tr><td>$row[idUser]</td>";
					echo"<td>$row[nom]</td>";
					echo"<td>$row[prenom]</td>";
					echo"<td>$row[email]</td>";
					echo"<td>$row[ddn]</td>";
					echo"<td>$row[sexe]</td>";
					echo"<td>+212$row[telephone]</td></tr>";
				}
					   echo"</table>";
			}
}
	
	
	}	
	
	?>
	
	
	
	
	</table>
</div>
</body>

</html>