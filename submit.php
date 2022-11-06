

<?php


session_start();
error_reporting(0);
include('includes/dbconnection.php');




                       $aid=$_SESSION['assignmentid'];
					   
                       $sql="SELECT * from  tblbooking where BookingID=:aid";
                       $query = $dbh -> prepare($sql);
                       $query->bindParam(':aid',$aid,PDO::PARAM_INT);
                       $query->execute();
                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                       
                       if($query->rowCount() > 0)
					   {
						   foreach($results as $row)
						   {
						    $totalCost= $row->totalCost;
						   }
						   
					   }
					   
					   
   
	
 
  $sqla="update tblbooking set Status='Approved',Remark='Online Payment' where BookingID=:aid";
     $query = $dbh->prepare($sqla);
    $query->bindParam(':aid',$aid,PDO::PARAM_INT);
     
$query->execute();



require('config.php');

if(isset($_POST['stripeToken'])){

\Stripe\stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];

$data=\Stripe\Charge::create(array(
"amount"=>$totalCost,
"currency"=>"USD",
"description"=>" Booking ID: $aid ",
"source"=>$token,



));


}

?>
<!DOCTYPE html>
<html lang="en">
<head><style>
body {
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("background.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  color:#fff;
}

.absb {
	background-image: url("6.gif");
	background-position: center;
  position: absolute;
  top: 20%;
  left: 23%;
  width: 45%;
  height: 65%;
  
  

}

.bannerh { 
  position: absolute;
  top: 100px;
  left: 120px;
 
}
</style>
</head>
<body>
<?php include_once('includes/header.php');?>

<div class="absb">
	             
							<div class="bannerh">
							<center>
							<p><i class="fa fa-check-circle" style="font-size:100px;color:green"></i></p>
							</center>
							
							<h1 style="text-align:center; color:black;">Succesfully paid</h1>
							<p style="text-align:center; font-size:20px ;color:black;"><b><i>Congratulations to our convention hall Service 
                            
                            
                            </b></i></p>
                                            </div>
                                                </div>
							
							
						
		</div>






</body>	
</html>
