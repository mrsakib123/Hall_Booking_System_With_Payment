<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbluser WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall | Forgot Password</title>

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
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
    
        <div class="agileinfo-dot">
            <?php include_once('includes/header.php');?>
            <div class="wthree-heading">
                <h2 style="color:#24F479" >Forgot Password</h2>
            </div>
        </div>
    </div>
   
    <div class="contact">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-left">
                
                    <div class="agileits-contact-address">
                <img src="images/5.jpg" alt="" height="500" width="500">
                    </div>
                </div>
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3 style="color:#e6e6e6;">Reset Your Password</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        <form action="#" method="post" name="chngpwd" onSubmit="return valid();">
                            <input style="color:#fff;" type="email" class="form-control" name="email" placeholder="E-mail" required="true">
                            <input style="color:#fff;" type="text" class="form-control" required="true" name="mobile" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number">
                            <input style="color:#fff;" type="password"class="form-control"  name="newpassword" placeholder="New Password" required="true"/>
                            <br>
                            <input style="color:#fff;" type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required="true" />
                            <br>
                            <div class="forgot">
                                                            <a href="login.php">Already have an account</a>
                                                        </div>
                                                        <br>
                            <button class="btn1" name="submit">Reset</button>

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