
<?php
$host="localhost";
$user="root";
$pw="";
$ndb="e_learning";
$con=mysqli_connect($host,$user,$pw,$ndb);

$crypted_password="BR";
if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $mail=$_POST['email'];
  $pass=$_POST['password'];
  $result = mysqli_query($con ,"SELECT * FROM moderateur WHERE email='$mail' ") ;
  $row = mysqli_fetch_array($result);
  session_start();
    $_SESSION=$row;

  if( $_SESSION['password']==$pass){
  header('Location: cpanel.php');
  }
  ELSE { echo"<script>alert('mot de passe incorrect');</script>";}

  
  
}
?>