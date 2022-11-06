<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
	  

	  
	  
    if(isset($_POST['submit']))
  {
  	$bid=$_GET['bookid'];
  	$uid=$_SESSION['obbsuid'];
	
 $bookingfrom=$_POST['bookingfrom'];
 $bookingto=$_POST['bookingto'];
 $eventtype=$_POST['eventtype'];
 $nop=$_POST['nop'];
 $message=$_POST['message'];
 $a1=30;
 $a2=60;
 $a3=80;
 $a4=100;
 $a5=150;
 
 $b1=200;
 $b2=300;
 $b3=400;
 $b4=500;
 $b5=600;
 
 
 
 if(!empty($_POST['foods']))
 {
	
	 foreach ($_POST['foods'] as  $selected)
	 
	 {
		 
		  
		 
		 
		 $SelectFoodss = $selected ;
		 
		 
		 if( strcmp($SelectFoodss, 'Tea-30tk') == 0  )
	      {
		     $totalCost+=$a1;
	      }
	 
	     if(strcmp($SelectFoodss, 'Coffee-60tk') == 0  )
	        {
		       $totalCost+=$a2;
	        }
	 
	       if($SelectFoodss == 'Lemon Juice-80tk')
	        {
		        $totalCost+=$a3;
	        }
			
			if($SelectFoodss == 'Orange Juice-100tk')
	        {
		        $totalCost+=$a4;
	        }
			if($SelectFoodss == 'special Juice-150tk')
	        {
		        $totalCost+=$a5;
	        }
			
			
			
			
			if($SelectFoodss == 'Biryani-200tk')
	        {
		        $totalCost+=$b1;
	        }
			if($SelectFoodss == 'kacchi-300tk')
	        {
		        $totalCost+=$b2;
	        }
			if($SelectFoodss == 'beef khichuri-400tk')
	        {
		        $totalCost+=$b3;
	        }
			if($SelectFoodss == 'full package-500tk')
	        {
		        $totalCost+=$b4;
	        }
			if($SelectFoodss == 'special food-600tk')
	        {
		        $totalCost+=$b5;
	        }
	 
		 $SelectFoods .= ", ".$selected ;
		 
	    
	 
	 
	 }
	 
	 $totalCost*= $nop;
	 
	 
	
 }
 
 $c1=10000;
 $c2=20000;
 $c3=30000;
 $c4=40000;
 $c5=50000;
 $c6=60000;
 $c7=70000;

 
 $SelectVenue=$_POST['venue'];
 
           if($SelectVenue == 'A-10000tk')
	        {
		        $totalCost+=$c1;
	        }
			if($SelectVenue == 'B-20000tk')
	        {
		        $totalCost+=$c2;
	        }
			if($SelectVenue == 'C-30000tk')
	        {
		        $totalCost+=$c3;
	        }
			if($$SelectVenue == 'D-40000tk')
	        {
		        $totalCost+=$c4;
	        }
			if($SelectVenue == 'E-50000tk')
	        {
		        $totalCost+=$c5;
	        }
			if($SelectVenue == 'F-60000tk')
	        {
		        $totalCost+=$c6;
	        }
			if($SelectVenue == 'G-70000tk')
	        {
		        $totalCost+=$c7;
	        }
 
 
	
 
 
 
 $bookingid=mt_rand(100000000, 999999999);
 
  
 
$sql="insert into tblbooking(BookingID,ServiceID,UserID,BookingFrom,BookingTo,EventType,Numberofguest,Message,totalCost,SelectFoods,SelectVenue)values(:bookingid,:bid,:uid,:bookingfrom,:bookingto,:eventtype,:nop,:message,:totalCost,:SelectFoods,:SelectVenue)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':bookingfrom',$bookingfrom,PDO::PARAM_STR);
$query->bindParam(':bookingto',$bookingto,PDO::PARAM_STR);
$query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
$query->bindParam(':nop',$nop,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':SelectFoods',$SelectFoods,PDO::PARAM_STR);
$query->bindParam(':totalCost',$totalCost,PDO::PARAM_STR);
$query->bindParam(':SelectVenue',$SelectVenue,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
	   
	   $_SESSION['assignmentid']=$bookingid;
     
	   
	  
	   
    echo '<body>

<div class="alertposa">

	<div class="alert alert-success">
  <strong>Success!</strong>
  Your Booking Request Has Been Send. We Will Contact You Soon Or make online Payemnt.

</div></div></body>';


    




}

  
  
  else
    {
         echo '<body>
	<div class="alertposa">
		 <div class="alert alert-warning">
  <strong>Warning!</strong> Something Went Wrong. Please try again.
</div>
</div>'
;
    }
	


}

require('config.php');


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Catering Booking System | Book Services</title>

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
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>

table, th, td {
  border:1px solid white;
  border-collapse: collapse;
  padding: 5px;
}


.alertposa {
	
  position: absolute;
  top: 190px;
  height:50px;
   left: 9.1%;
  width: 50%; 
}
.alertposb {
	
  position: absolute;
  top: 320px;
  height:50px;
   right: 12%;
  width: 20%; 
}

 .liay {
  
  
  text-align: center ;
  padding-top: 5px;
  padding-right: 10px;
  padding-bottom: 5px;
  padding-left: 5px;
  text-decoration: none;
  font-size: 19px;
  border: 2px solid #777913;
  border-collapse:collapse;
  
  
}
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}


.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
 
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */


@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>

	
		<div class="agileinfo-dot">
			<?php include_once('includes/header.php');?>
			
			
			<div class="wthree-heading">
				<h2 style="color:#24F479" >Book Services</h2>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 style="color:#e6e6e6;" >Book Services </h3>
					</div>
					
					
					<div class="agileinfo-contact-form-grid">
						<form method="POST">
						
						<div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Select Catering Food</label>
                                    <div class="col-md-10" >
                                        <select type="text" class="form-control"  required="true" name="foods[]"  multiple>
										<optgroup label="Drinks" style=" font-size:18px;">
										<option value="">Cancel</option>
										<option value="Tea-30tk">Tea-30tk </option>
										<option value="Coffee-60tk">Coffee-60tk</option>
										<option value="Lemon Juice-80tk">Lemon Juice-80tk</option>
										<option value="Orange Juice-100tk">Orange Juice-100tk</option>
										<option value="special Juice-150tk">special Juice-150tk</option>
										 </optgroup>
										 
										 <optgroup label="Food" style=" font-size:18px;">
										<option value="">Cancel</option>
										<option value="Biryani-200tk">Biryani-200tk</option>
										<option value="kacchi-300tk">kacchi-300tk</option>
										<option value="beef khichuri-400tk">beef khichuri-400tk</option>
										<option value="full package-500tk">full package-500tk</option>
										<option value="special food-600tk">special food-600tk</option>
										 </optgroup>
										</select>
										
										 <br>
                                                
                                    </div>
                                </div>
						
						 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Choose Venue</label>
                                    <div class="col-md-10">
                                        <div class="slideshow-container">
  
 

<div class="mySlides">
  <div class="numbertext">1 / 6</div>
  <img src="wedding.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;" >Click <b><input type="radio" id="css" name="venue" value="A-10000tk" > A-10000tk</div>
</div>

<div class="mySlides">
  <div class="numbertext">2 / 6</div>
  <img src="wedding1.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="B-20000tk"> B-20000tk</div>
</div>

<div class="mySlides">
  <div class="numbertext">3 / 6</div>
  <img src="wedding3.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="C-30000tk"> C-30000tk</div>
</div>

<div class="mySlides">
  <div class="numbertext">4 / 6</div>
  <img src="wedding2.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="D-40000tk"> D-40000tk</div>
</div>
<div class="mySlides">
  <div class="numbertext">5 / 6</div>
  <img src="wedding4.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="E-50000tk"> E-50000tk</div>
</div>
<div class="mySlides">
  <div class="numbertext">6 / 6</div>
  <img src="wedding5.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="F-60000tk"> F-60000tk</div>
</div>
<div class="mySlides">
  <div class="numbertext">3 / 3</div>
  <img src="wedding.jpg" style="width:100%">
  <div class="text" style="color:#24F479; font-size:24px;">Click <input type="radio" id="css" name="venue" value="G-70000tk"> G-70000tk</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
<span class="dot" onclick="currentSlide(4)"></span> 
<span class="dot" onclick="currentSlide(5)"></span> 
<span class="dot" onclick="currentSlide(6)"></span>   
</div>




                                    </div>
                                </div>
						        
						
							 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Booking Date:</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" style="font-size: 20px" required="true" name="bookingfrom">
                                    </div>
                                </div>
                                               <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Booking Time:</label>
                                    <div class="col-md-10">
                                        <select type="text" class="form-control"  required="true" name="bookingto" >
										<option value="">Choose Time</option>
										<option value="12:00 PM to 05:00PM">12:00:PM - 05:00PM</option>
										<option value="05.30 PM to 11:30PM">05.30PM - 11:30PM</option>
										<option value="12:00 PM to 11:30PM">12:00PM - 11:30PM</option>
										<option value="12:00 PM to 11:30PM">12:00AM - 05:30AM</option>
										</select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Type of Event:</label>
                                    <div class="col-md-10">
                                       <select type="text" class="form-control" name="eventtype" required="true" >
							 	<option value="">Choose Event Type</option>
							 	<?php 

$sql2 = "SELECT * from   tbleventtype ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->EventType);?>"><?php echo htmlentities($row->EventType);?></option>
 <?php } ?>
							 </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Number of Guest:</label>
                                    <div class="col-md-10">
                                        <select type="text" class="form-control"  required="true" name="nop">
										<option value="">Choose approximate Number of Guest</option>
										<option value="100">100</option>
										<option value="200">200</option>
										<option value="300">300</option>
										<option value="400">400</option>
										<option value="500">500</option>
										<option value="600">600</option>
										<option value="700">700</option>
										<option value="800">800</option>
										<option value="900">900</option>
										<option value="1000">1000</option>
										</select>
                                    </div>
                                </div>
                                                 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:#e6e6e6;">Message(if any)</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control"  required="true" name="message" style="font-size: 20px"></textarea> 
                                    </div>
                                </div>
								
								
                                                
                                              <br>
                                                <div class="tp">
                                                    
                                                     <button type="submit" class="btn btn-primary" name="submit">Book</button>
                                                </div>
                                            </form>

					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
		
		</div>
	</div>
	
<?php 	
	if ($LastInsertId>0) {
	    

?> 

	
	
	<div class="alertposb">
    <center>
	<h2>Receipt</h3>
	</center>
	
	
	<table>
  <tr>
    <th>Booking Id</td>
	<td><?php echo  $bookingid;?></td>
	</tr>
	
	<tr>
    <th>Food menues</td>
	<td><?php echo  $SelectFoods?></td>
	</tr>
	
	<tr>
    <th>Venue</td>
	<td><?php echo  $SelectVenue;?></td>
	</tr>
	
	<tr>
	<th>Total Person</td>
	<td><?php echo  $nop;?></td>
	</tr>
	
    <tr>
	<th>Booking type</td>
	<td><?php echo  $eventtype;?></td>
	</tr>
	
    <tr>
	<th>Message</td>
	<td><?php echo  $message;?></td>
	</tr>
	
	<tr>
	<th>Booking Date</td>
	<td><?php echo  $bookingfrom;?></td>
	</tr>
	
    <tr>
	<th>Booking Time</td>
	<td><?php echo  $bookingto;?></td>
	</tr>
	
    <tr>
	<th>Total Cost</td>
	<td style="color:red; font-size:22px;"><b><?php echo  $totalCost;?>tk</b></td>
	</tr>
	
  
</table>
	
	
	
	
 
 <br>
 <br>
 <center>

<form action="submit.php" method="post">

<script

  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="<?php echo $publishableKey ?>"
  data-amount="<?php echo  $totalCost ?>"
  data-name="Castle Online payment"
  data-description="Use your paypal account"
  data-image="https://c8.alamy.com/comp/2E2FAMR/smart-phone-with-a-payment-received-message-and-icon-cut-out-on-white-2E2FAMR.jpg"
  data-currency="USD"
  
  >
  </script>


</from>
<center>

</div> 

<?php }  ?>
	
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

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>



</body>	
</html><?php }  ?>
 
 
