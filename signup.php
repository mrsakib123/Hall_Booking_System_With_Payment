<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['signup']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	 echo '<body>
	<div class="alertpos">
	<div class="alert alert-success">
  <strong>Success!</strong>
  You have signup  Scuccessfully

</div> 
</div> 
</body>';


}
else
{
	echo'<body>
	<div class="alertpos">
	<div class="alert alert-warning">
  <strong>Warning!</strong>
  Something went wrong.Please try again

</div> 
</div> 
</body>';


}
}
 else
{
	
	
	echo'<body>
	<div class="alertpos">
	<div class="alert alert-info">
  <strong>Info !</strong>
 Email-id already exist. Please try again

</div> 
</div> 
</body>';


}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall | Mail</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 

	<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
}   

</script>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.alertpos {
	
  position: absolute;
  top: 210px;
  height:50px;
   left: 40%;
  width: 45%;
  
  
  

}
</style>
</head>
<body>
	
		<div class="agileinfo-dot">
			<?php include_once('includes/header.php');?>
			<div class="wthree-heading">
				<h2 style="color:#24F479">Register</h2>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				<div class="col-md-6 contact-form-left">
				
					<div class="agileits-contact-address">
				<img src="images/n8.gif" alt="" height="500" width="500">
					</div>
				</div>
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 style="color:#e6e6e6;">Register Yourself </h3>
					</div>
					<div class="agileinfo-contact-form-grid">
						<form method="post" name="signup" onsubmit="return checkpass();">
                                                <input style="color:#fff;" type="text" name="fname" placeholder="Full Name" required="true">
                                                <input style="color:#fff;" type="email" name="email" placeholder="E-mail" required="true">
                                                <input style="color:#fff;" type="text" name="mobno" placeholder="Mobile Number" required="true" maxlength="11" pattern="[0-9]+">
                                                <input style="color:#fff;" type="password"  name="password" placeholder="Password" required="true" id="password1">
                                                <br>
                                                <input style="color:#fff;" type="password"  name="confirmpassword" placeholder="Confirm Password" required="true" id="password2">
                                              <br>
                                                <div class="tp">
                                                    
                                                    <button class="btn1" name="signup">Register NOW</button>
                                                </div>
                                            </form>

					</div>
				</div>
				<br>
				<div class="col-md-6 contact-form-right">
					 <div class="forgot">
                                                            <a href="login.php">Already have an account!!!</a>
                                                        </div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			
		
		</div>
	</div>
	
	<?php include_once('includes/footer.php');?>
	
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

<script src="js/modernizr.custom.js"></script>

</body>	
</html>