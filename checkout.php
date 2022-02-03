<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once('product-action.php');
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else
{	
    date_default_timezone_set("asia/kolkata");
    					  
		foreach ($_SESSION["cart_item"] as $item)
		{			
           		
                $item_total += ($item["price"]*$item["quantity"]);												
				if($_POST['submit'])
				{	
                 
                    if(!empty($_POST['pickTime']))
                    {	
                        if(substr($_POST['pickTime'],0,2) < date("G"))
                        {              
                                $error = "Pick-Up Time Not Valid!";	                       
                        }
                        elseif(substr($_POST['pickTime'],0,2) == date("G"))
                        {                                     
                            if(substr($_POST['pickTime'],3,2) < date("i") + 10)
                            {                          
                                $error = "Please Select Time After 10 Minutes";	
                            }
                            else
                            {                          
                                $SQL="insert into users_orders(u_id,title,quantity,price,pick_time) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$_POST['pickTime']."')";
                                mysqli_query($db,$SQL);	
                                unset($_SESSION["cart_item"]);
                                $success = "Thankyou! Your Order Placed successfully! <p>You will be redirected to Order Page in <span id='counter'>5</span> second(s).</p>
                                <script type='text/javascript'>
                                function countdown() {
                                    var i = document.getElementById('counter');
                                    if (parseInt(i.innerHTML)<=0) {
                                        location.href = 'your_orders.php';
                                    }
                                    i.innerHTML = parseInt(i.innerHTML)-1;
                                }
                                setInterval(function(){ countdown(); },1000);
                                </script>'";	                              	
                             }	
                        }        
                        else
                        {                          
                                $SQL="insert into users_orders(u_id,title,quantity,price,pick_time) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$_POST['pickTime']."')";
                                mysqli_query($db,$SQL);	
                                unset($_SESSION["cart_item"]);
                                $success = "Thank You!! Order Placed successfully! <p>You will be redirected to order page  in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'your_orders.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";                        	
                         }	
                          
                    }
                    else
                    {
                        $error = "Pick-Up Time Must be Fillup!";
                    }       
                							    																											
				}
        }
        // $sql="SELECT  * FROM users_orders ORDER BY o_id DESC LIMIT 1";
        // $query=mysqli_query($db,$sql);
        // while($row=mysqli_fetch_array($query))  
        // {
        //     $_SESSION['o_id']=$row['o_id'];
        // }                                                    
       

        // $_SESSION[$_SESSION['o_id'].'order']=	$_SESSION["cart_item"];	

        // if(!empty($_POST['pickTime']) ||substr($_POST['pickTime'],0,2) >  date("h"))
        // {	
        //     $SQL2="insert into tbl_picktime(u_id,pick_time,total) values('".$_SESSION["user_id"]."','".$_POST['pickTime']."','".$item_total."')";
        //      mysqli_query($db,$SQL2);
        //      		
             										
        // }      
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css"> </head>
    <?php include_once('header.php'); ?>

        <section class="w3l-breadcrumb">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Checkout</li>
                </ul>
            </div>
        </section>	
         <div class="container">
			 <span style="color:green;"> <?php echo $success; ?></span>
             <span style="color:red;"> <?php echo $error; ?></span>				
         </div>
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> 
                                        </div>
                                        <div class="cart-totals-fields">
                                          <table class="table">
											<tbody>                                          												 				   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "₹".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pick-Up Time</td>
                                                        <td><input type="time" id="pickTime" name="pickTime"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "₹".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>				
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal"  class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Online Payment <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                                    <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_Ifye84OfRTDInT" async> </script> </form>                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            <!-- <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6  right-image text-center">
                                    <figure> <img src="images/app.png" alt="Right Image"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                    <h3>The Best Food Delivery App</h3>
                                    <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                                    <div class="social-btns">
                                        <a href="#" class="app-btn apple-button clearfix">
                                            <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                        </a>
                                        <a href="#" class="app-btn android-button clearfix">
                                            <div class="pull-left"><i class="fa fa-android"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            
            <?php include_once('footer.php');?>

            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
         </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="jquery.toaster.js"></script>
    <script>

        
   const pressEnter = (event) => {
      if (event.key === "Enter") 
      {
         event.preventDefault();
      }
   };
   document.getElementById("pickTime").addEventListener("keydown",
   pressEnter);
</script>

  <!-- move top -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
  	&#10548;
  </button>
  <script>
  	// When the user scrolls down 20px from the top of the document, show the button
  	window.onscroll = function () {
  		scrollFunction()
  	};

  	function scrollFunction() {
  		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
  			document.getElementById("movetop").style.display = "block";
  		} else {
  			document.getElementById("movetop").style.display = "none";
  		}
  	}

  	// When the user clicks on the button, scroll to the top of the document
  	function topFunction() {
  		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
  	}
  </script>
  <!-- /move top -->
  </section>


  <!--/MENU-JS-->
  <script>
  	$(window).on("scroll", function () {
  		var scroll = $(window).scrollTop();

  		if (scroll >= 80) {
  			$("#site-header").addClass("nav-fixed");
  		} else {
  			$("#site-header").removeClass("nav-fixed");
  		}
  	});
  </script>

<?php
}
?>
