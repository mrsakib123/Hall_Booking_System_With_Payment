<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>OCastle Convention Hall|| About </title>

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

<style>

 .ulax {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
  
}


 .lix {
  float: down;
}




.downb
{
  float: down;
}

 .liax {
  display: block;
  color: white;
  text-align: center ;
  padding-top: 18px;
  padding-right: 124.5px;
  padding-bottom: 18px;
  padding-left: 125px;
  text-decoration: none;
  font-size: 19px;
  
  border-collapse:collapse;
  
  
}
.lib {
  display: block;
  color: white;
  text-decoration: none;
  font-size: 18px;
  
}

.lix a:hover {
  background-color: #565652;
  text-decoration: none;
  color:#FFFFFF;
}



 
</style>

</head>
<body>
	
		<div class="agileinfo-dot">
		<?php include_once('includes/header.php');?>
		<div class="wthree-heading">
				<h2 style="color:#24F479">Services</h2>
			</div>
		<br>
		<br>
		<br>
			<?php
$sql="SELECT * from tblservice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

		  <ul class="ulax"  >
		 
	  
		              
								            
                                            <li class="lix" >
                                            <?php    if($_SESSION['obbsuid']==""){?>											
											<a class="liax"href="login.php">
											<img src="<?php  echo htmlentities($row->ServiceImg);?>" alt="weeding_pic" width="600" height="333"><br><br>
											<h3>Serial No.: <?php echo htmlentities($cnt);?></h3>
											
											<h3>Service Name: <?php  echo htmlentities($row->ServiceName);?></h3>
											
											<h3>Service Description: <?php  echo htmlentities($row->SerDes);?></h3>
											</a>
											<?php } else {?>
											</li>
											
											<li class="lix" >
											
											<a class="liax"href="book-services1.php?bookid=<?php echo $row->ID;?>">
											<img src="<?php  echo htmlentities($row->ServiceImg);?>" alt="weeding_pic" width="600" height="333"><br><br>
											<h3>Serial No.: <?php echo htmlentities($cnt);?></h3>
											
											<h3>Service Name: <?php  echo htmlentities($row->ServiceName);?></h3>
											
											<h3>Service Description: <?php  echo htmlentities($row->SerDes);?></h3>
											
											</a>
											<?php }?>
											 
											</li>
											<?php $cnt=$cnt+1;}} ?>
											
									        
                                           


                                        </ul>
										
										
			
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