<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall|| View Booking </title>

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

<body>
	
		<div class="agileinfo-dot">
		<?php include_once('includes/header.php');?>
			<div class="wthree-heading">
				<h2 style="color:#24F479" >View Booking</h2>
			</div>
		</div>
	</div>
	
	<div class="about-top">
		<div class="container">
			<div class="wthree-services-bottom-grids">
				
				<p class="wow fadeInUp animated" data-wow-delay=".5s" style="color:#e6e6e6;">View Your Booking Details.</p>
					<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
						 <?php
                  $uid=$_SESSION['obbsuid'];

$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.BookingFrom,tblbooking.totalCost,tblbooking.BookingTo,tblbooking.EventType,tblbooking.Numberofguest,tblbooking.Message, tblbooking.Remark,tblbooking.Status,tblbooking.UpdationDate,tblservice.ServiceName,tblservice.SerDes,Remark from tblbooking join tblservice on tblbooking.ServiceID=tblservice.ID join tbluser on tbluser.ID=tblbooking.UserID  where tblbooking.UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <table border="1" class="table table-bordered ">
                                <tr>
                                    <th colspan="5" style="text-align: center;font-size: 20px;color:red;">Booking Number: <?php  echo $row->BookingID;?>
                                        
                                    </th>
                                </tr>
                                            <tr>
    <th style="color:#e6e6e6;">Client Name</th>
    <td style="color:#e6e6e6;"><?php  echo $row->FullName;?></td>
     <th style="color:#e6e6e6;">Mobile Number</th>
    <td style="color:#e6e6e6;"><?php  echo $row->MobileNumber;?></td>
  </tr>
  

  <tr>
    
   <th style="color:#e6e6e6;">Email</th>
    <td style="color:#e6e6e6;"><?php  echo $row->Email;?></td>
     <th style="color:#e6e6e6;">Booking From</th>
    <td style="color:#e6e6e6;"><?php  echo $row->BookingFrom;?></td>
  </tr>

   <tr>
   <th style="color:#e6e6e6;">Booking To</th>
    <td style="color:#e6e6e6;"><?php  echo $row->BookingTo;?></td>
    <th style="color:#e6e6e6;">Number of Guest</th>
    <td style="color:#e6e6e6;"><?php  echo $row->Numberofguest;?></td>
  </tr>
 
  <tr>
    
    <th style="color:#e6e6e6;">Event Type</th>
    <td style="color:#e6e6e6;"><?php  echo $row->EventType;?></td>
    <th style="color:#e6e6e6;">Message</th>
    <td style="color:#e6e6e6;"><?php  echo $row->Message;?></td>
  </tr>
  <tr>
    
    <th style="color:#e6e6e6;">Service Name</th>
    <td style="color:#e6e6e6;"><?php  echo $row->ServiceName;?></td>
    <th style="color:#e6e6e6;">Service Description</th>
    <td style="color:#e6e6e6;"><?php  echo $row->SerDes;?></td>
  </tr>
   <tr>
    <th style="color:#e6e6e6;" >Service Price</th>
    <td style="color:#e6e6e6;">$<?php  echo $row->totalCost;?></td>
    <th style="color:#e6e6e6;">Apply Date</th>
    <td style="color:#e6e6e6;" ><?php  echo $row->BookingDate;?></td>
  </tr>

  <tr>
    
     <th style="color:#e6e6e6;">Order Final Status</th>

    <td style="color:#e6e6e6;"> <?php  $status=$row->Status;
    
if($row->Status=="Approved")
{
  echo "Approved";
}

if($row->Status=="Cancelled")
{
 echo "Cancelled";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
     <th style="color:#e6e6e6;" >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td style="color:#e6e6e6;">  <?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td style="color:#fff;"><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?>
  </tr>
  
 
<?php $cnt=$cnt+1;}} ?>

</table> 
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