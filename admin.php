<?php 
$host="localhost";
$user="root";
$pw="";
$ndb="elearn";
$con=mysqli_connect($host,$user,$pw,$ndb);

if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $mail=$_POST['email'];
  $pass=$_POST['password'];
  $result = mysqli_query($con ,"SELECT * FROM `moderateur` WHERE email='$mail' ") ;
  $row = mysqli_fetch_array($result);
  

  if( $row['password']==$pass){
  session_start();
  $_SESSION=$row;
  header('Location: cpanel.php');
  }
  ELSE {echo"<script>alert('mot de passe incorrect')</script>";}

  
  
}
  

  ?>


<!doctype html>
<html lang="en">
<head>
    <title>Login</title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<style>body{padding-top: 60px;}</style>

    <link href="login/css/bootstrap.css" rel="stylesheet" />

	<link href="login/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="login/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="login/js/bootstrap.js" type="text/javascript"></script>
	<script src="login/js/login-register.js" type="text/javascript"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">My CPannel</a>
            <div class="col-sm-4"></div>
        </div>


		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Admin Log</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                
                               
                                <div class="error"></div>
                                <div class="form loginBox">
								 <div class="division">
								   <div class="division1">
                                    <div class="line l"></div>
                                      <span>Login</span>
                                    <div class="line r"></div>
									</div>
                                </div>
                                    <form method="POST" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <button type="submit" class="btn btn-primary center" >CONNECTER</button>
                                    </form>
                                </div>
                             </div>
                        </div>
                      
                    </div>
                  
    		      </div>
		      </div>
		  </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>


</body>
</html>
