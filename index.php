<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall|| Home Page
</title>
<style>
.banner {
  background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url("images/n22.gif");
  position: absolute;
  top: 210px;
  left: 210px;
  width: 900px;
  height: 420px;
  background-color: #1739C3;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  color:#000000;
}


.bannerh { 
  position: absolute;
  top: 120px;
  left: 120px;
 
}
.absa {
  position: absolute;
  top: 770px;
  
  
}

 .aula {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
  background: rgba(255, 255, 255, 0.2);
}
.bula {
  
  overflow: hidden;
  background-color: #333333;
  background: rgba(255, 255, 255, 0.2);
  text-align: center ;
 
  
}




 .ali {
  float: left;
  display: block;
  text-align: center ;
  padding-top: 8px;
  padding-right: 105px;
  padding-bottom: 8px;
  padding-left: 105px;
  text-decoration: none;
  font-size: 17px;
  
}
.glass{
  background: rgba(255, 255, 255, 0.3);
  border-radius: 16px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border: 5px solid #E0B30F;
  text-align:center;
  
}
.absa {
  position: absolute;
  top: 650px;
  left: 0;
  width: 100%;
  
  
}


  
.absb {
	background-image: url("6.gif");
	background-position: center;
  position: absolute;
  top: 740px;
  left: 5%;
  width: 45%;
  height: 65%;
  
  

}
.absc {
	
  position: absolute;
  top: 740px;
  right: 1%;
  width: 45%;
  height: 65%;
  
  

}
.absd {
	
  position: absolute;
  top: 1200px;
  left: 0;
  width: 100%;
  color:#1BF2D3;
  
 
}


</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<marquee width="100%" direction="left" height="30px" style="color:red; font-size:20px;">
Enjoy a guaranteed seat with our online booking system and look forward to fabulous hair in a flash. Just select your style and if it’s a single treatment you’d like and more than 24 hours in advance, you can reserve your seat now.
</marquee>
<h1 style="text-align:center; color:#24F479" >Castle Convention Hall </h1>			
			
						

                                                 <?php include_once('includes/header.php');?>
												 
												 <div class="banner">
												 </div>
                                              
												

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
				 <div class="absa">	
                 <ul class="aula">
							<li class="ali"><i class=" fa fa-map-marker"  style="font-size:20px;color:#24F479;" ></i> <?php  echo htmlentities($row->PageDescription);?>.</li>											
							<li class="ali"><i class="fa fa-envelope" style="font-size:20px;color:#24F479"></i> <?php  echo htmlentities($row->Email);?></li>												
							<li class="ali"><i class="fa fa-phone" style="font-size:20px;color:#24F479"></i> <?php  echo htmlentities($row->MobileNumber);?></li>
			     </ul>	
				 </div>	
						
               					
               <?php $cnt=$cnt+1;}} ?>
				
	 <div class="absb">
	             
							<div class="bannerh"><h1 style="text-align:center; color:black;">Planning from start to finish</h1>
							<p style="text-align:center; font-size:20px ;color:black;"><b><i>I'm very happy<br>
                            enhanced monitoring procedures.<br>
                            For that lake or pure arrows<br>
                            as well as mascara laughter.</b></i></p>
                                            </div>
                                                </div>
							
							
						
		</div>
</div>			
      <div class="absc">		
			<div class="glass">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
						    <h3 style="text-align:center;">LET THE EXPERTS RUN YOUR WEDDING</h1>
							<p  style="text-align:center; font-size:20px ;"><i>I'm very happy<br>
                            enhanced monitoring procedures.<br>
                            For that lake or pure arrows<br>
                            as well as mascara laughter.<i></p>
							<br><br><br><br><br><br><br>
						
			</div>	
	   </div>

<div class="absd">
  <div class="bula">
   
     <?php include_once('includes/footer.php');?>
		
  </div>	
</div>	

</body>	
</html>