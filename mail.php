<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
     $message=$_POST['message'];
    $sql="insert into tblcontact(Name,Email,Message)values(:name,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
	   echo '<body>
	<div class="alertpos">
	<div class="alert alert-success">
  <strong>Success!</strong>
  Your message was sent successfully!.

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

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.alertpos {
	
  position: absolute;
  top: 200px;
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
				<h2 style="color:#24F479">Contact</h2>
			</div>
		</div>
	</div>
	
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				<div class="col-md-6 contact-form-left">
					<div class="w3layouts-contact-form-top">
						<h3 style="color:#e6e6e6;" >Get in touch</h3>
						<p style="color:#e6e6e6;">We would love to hear from you, incase you have any questions, comments, suggestions or you just want to say hi.  We are all ears :)</p>
					</div>
					<div class="agileits-contact-address">
						<ul>
							<?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
							<li ><i class="fa fa-phone" aria-hidden="true"></i> <span style="color:#e6e6e6;">+<?php  echo htmlentities($row->MobileNumber);?></span></li>
							<li ><i class="fa fa-phone fa-envelope" aria-hidden="true"></i> <span style="color:#e6e6e6;"><?php  echo htmlentities($row->Email);?></span></li>
							<li ><i class="fa fa-map-marker" aria-hidden="true"></i> <span style="color:#e6e6e6;"><?php  echo htmlentities($row->PageDescription);?>.</span></li><?php $cnt=$cnt+1;}} ?>
						</ul>
					</div>
				</div>
				<br>
				<br>
				<br>
				
				
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 style="color:#e6e6e6;">Send us a message</h3>
					</div>
					<div class="agileinfo-contact-form-grid">
						<form action="#" method="post">
							<input  placeholder="Full Name " name="name" type="text" required="true" style="color:#fff;">
							<input  placeholder="Email" name="email" type="email" required="true" style="color:#fff;">
							<textarea name="message" placeholder="Message" required="" style="color:#fff;"></textarea>
							<button class="btn1" name="submit">Submit</button>
						</form>
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