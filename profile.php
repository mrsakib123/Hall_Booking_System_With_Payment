<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['obbsuid'];
    $AName=$_POST['fname'];
    $mobno=$_POST['mobno']; 
 
  $sql="update tbluser set FullName=:name,MobileNumber=:mobno where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

echo '<body>
	<div class="alertpos">
	<div class="alert alert-success">
  <strong>Success!</strong>
  Profile has been updated!.

</div> 
</div> 
</body>';

       

     

  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall | User Profile</title>

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
   left: 20%;
  width: 50%;
  
  
  

}
</style>

</head>
<body>
	
		<div class="agileinfo-dot">
			<?php include_once('includes/header.php');?>
			<div class="wthree-heading">
				<h2 style="color:#24F479">Profile</h2>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				<br>
				<br>
				<br>
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 style="color:#e6e6e6;" >User Profile </h3>
					</div>
					<div class="agileinfo-contact-form-grid">
						<form method="post">
							 <?php
$uid=$_SESSION['obbsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?><div class="form-group row">
                                                <label class="col-form-label col-md-4" style="color:#e6e6e6;">Full Name:</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control" >
                                    </div></div>
                                                <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Mobile Number</label>
                                    <div class="col-md-12">
                                        <input type="text" name="mobno" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
                                    </div>
                                </div>
                                                 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Email Address</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" value="<?php  echo $row->Email;?>" name="email" required="true" readonly title="Email can't be edit">
                                    </div>
                                </div>
                                                <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;" >Registration Date</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php  echo $row->RegDate;?>" class="form-control" name="password" readonly="true">
                                    </div>
                                </div><?php $cnt=$cnt+1;}} ?>
                                              <br>
                                                <div class="tp">
                                                    
                                                     <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                                </div>
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
</html><?php }  ?>