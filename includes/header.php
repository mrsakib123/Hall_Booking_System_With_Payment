<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

  ?>
  
  
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Banquet Booking System|| Home Page
</title>
<style>
body {
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("background.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  color:#fff;
}
a
{
  color:#fff;
}
 .ula {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
  background: rgba(255, 255, 255, 0.2);
  
}


 .li {
  float: left;
}


.downb
{
  float: down;
}

 .lia {
  display: block;
  color: white;
  text-align: center ;
  padding-top: 18px;
  padding-right: 124.5px;
  padding-bottom: 18px;
  padding-left: 125px;
  text-decoration: none;
  font-size: 19px;
  border: 2px solid #777913;
  border-collapse:collapse;
  
  
}
.lib {
  display: block;
  color: white;
  text-decoration: none;
  font-size: 18px;
  
}

.li a:hover {
  background-color: #111111;
  text-decoration: underline;
  color:#1074BD;
}


 .absolute {
  position: absolute;
  top: 180px;
  right: 0;
  width: 150px;
  height: 100px;
}
.absolutea {
  position: absolute;
  top: 180px;
  right: 50px; 
  width: 172px;
  height: 100px;
}

.dropbtn {
  background-color: #3e8e41;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #D635C4}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

 
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>          
                       

                               
                                        <ul class="ula"  >
                                            <li class="li" ><a class="lia"href="index.php"><i class="fa fa-home"></i> Home</a></li>
									
                                            <li class="li" ><a class="lia"href="about.php"> <i class="fa fa-address-card-o"></i> About</a></li>
                                            <li class="li"><a class="lia"href="services.php"><i class="fa fa-shopping-cart" ></i> Services</a></li>
                                            
                                            <li class="li"><a class="lia"href="mail.php"><i class="fa fa-envelope"></i> Mail Us</a></li>


                                        </ul>
                                 
                         
                        <?php if (strlen($_SESSION['obbsuid']==0)) {?>
                        <div class="absolute">
                            <ul>
                                <li class="downb" ><a class="lib" href="login.php">Login</a></li>
                                            <li class="downb"> <a class="lib" href="signup.php">Register</a></li>
                                            <li class="downb"><a class="lib" href="admin/login.php">Admin</a></li>
                               <?php } ?>
                            </ul>
                       </div>
					   <?php if (strlen($_SESSION['obbsuid']!=0)) {?>
					   
					  <?php
					  
					   $uid=$_SESSION['obbsuid'];
  

         $sql="SELECT * from  tbluser  where ID=:uid";
                       $query = $dbh -> prepare($sql);
                       $query->bindParam(':uid',$uid,PDO::PARAM_INT);
                       $query->execute();
                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                       
                       if($query->rowCount() > 0)
					   {
						   foreach($results as $row)
						   {
						    $name= $row->FullName;
						   }
						   
					   }
  ?>


                                             <div class="absolutea">
                                                <ul class="dropdown">
                                                     <p class="dropbtn" ><i class="fa fa-user-circle"></i> <?php echo  $name;?> <i class="fa fa-caret-down"></i></a></li>
													 <div class="dropdown-content">
													 <a class="lib" href="profile.php">Update Profile</a></li>
                                                     <a class="lib" href="booking-history.php">Booking History</a></li>   
                                                     <a class="lib"href="change-password.php">Change Password</a></li>
                                                   <a  class="lib" href="logout.php">Logout</a></li>  
 </div>													
                                               
                                            <?php } ?> 
											</div>
</body>	
</html>   
       