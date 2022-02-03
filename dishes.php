<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller
?>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/quantity.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
   <link rel="stylesheet" href="assets/css/style-starter2.css">

<style>
    /* img {
    -webkit-filter: grayscale(100%); 
    filter: grayscale(100%);
    } */

    img {
    border: 3px solid #555 !important; 
    }
    .center{
    width: 120px;
    height:40px;
    margin: 40px auto;
    }
</style>
<?php include_once('header.php'); ?>
    
        <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
            <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="menu.php">Choose Item from Catagory</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Choose Yor Dish & Select Pick-up Time</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Pick-Up Your Food and Pay online/COD</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <?php 
                    $ress= mysqli_query($db,"select * from res_category where c_id='$_GET[c_id]'");
					$rows=mysqli_fetch_array($ress);								  
			?>
            <section class="inner-page-hero bg-image" data-image-src="images/food2.jpg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Category_Image/'.$rows['image'].'" alt="Food Category logo">'; ?></figure>
                                </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt" >
                                    <h1 style="margin: 65px!important;"><?php echo $rows['c_name']; ?></h1>
                                </div>
                            </div>													
                        </div>
                    </div>
                </div>
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
                <div class="container">
                   
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">                      
                       <div class="widget widget-cart">
                             <div class="widget-heading">
                                 <h3 class="widget-title text-dark"> Your Food Cart <span class="fa fa-shopping-cart"></span></h3>							  
                                <div class="clearfix"></div>
                             </div>
                             <div class="order-row bg-white">
                                 <div class="widget-body">																		
                                    <?php
                                        $item_total = 0;
                                        foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                        {
                                     ?>									                                                                  
                                        <div class="title-row">
                                        <?php echo $item["title"]; ?>
                                        <a href="dishes.php?c_id=<?php echo $_GET['c_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >     
                                            <i class="fa fa-trash pull-right"></i>
                                        </a>
                                         <a href="dishes.php?c_id=<?php echo $_GET['c_id'];?>&action=add1&id=<?php echo $item['d_id']; ?>" >     
                                            <i class="fa fa-plus pull-right" aria-hidden="true" style="color:black"></i>
                                         </a> 
                                         <a href="dishes.php?c_id=<?php echo $_GET['c_id']; ?>&action=minus&id=<?php echo $item["d_id"]; ?>" >     
                                            <i class="fa fa-minus pull-right" aria-hidden="true" style="color:tometo"></i>
                                         </a>                                  
										</div>							
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "₹".$item["price"]; ?> readonly id="exampleSelect1">                                                  
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> 
                                            </div>                                       
                                        </div>
  
                                    <?php
    
                                           $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
                                         }
                                      ?>								    
                                 </div>
                             </div>
                               
                                <!-- end:Order row -->
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "₹".$item_total; ?></strong></h3>                                     
                                          <?php
                                          $_SESSION["total"]=$item_total;
                                            if($item_total==0)
                                            {
                                                unset($_SESSION["cart_item"]);
                                            }
                                            else
                                            {
                                           ?>     
                                                <a href="checkout.php?c_id=<?php echo $_GET['c_id'];?>&action=check"  class="btn theme-btn btn-lg">Checkout</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                </div>											
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                      
                        <!-- end:Widget menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    <b>POPULAR ORDERS Delicious Hot Food is Here!</b> <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                    </a>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
                                <?php  // display values and item of food/dishes
                                    
                                   $sql= mysqli_query($db,"select * from dishes where c_id='$_GET[c_id]'");
                                   while($row=mysqli_fetch_array($sql))
                                   {
                                    $products[]=$row;
                                   }							  
                       
									// $stmt = $db->prepare("select * from dishes where c_id='$_GET[c_id]'");
									// $stmt->execute();
									// $products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
									{
                                       
                                ?>
                                        
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-5">
										<form method="post" action='dishes.php?c_id=<?php echo $_GET['c_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <?php                            
                                                if ($product['status']=='1')
                                                {                                                                                                                       
                                                ?>
                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Category_Image/dishes/'.$product['img'].'" alt="Food logo" style="height: 70px;width: 200px;">'; ?></a>
                                                <?php
                                                }
                                                else
                                                {
                                                ?> 
                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Category_Image/dishes/'.$product['img'].'" alt="Food logo" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);height: 70px;width: 200px;">'; ?></a>
                                                <?php
                                                }                                          
                                                ?>           
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-2 pull-right item-cart-info"> 
										  <span class="price pull-left" >₹<?php echo $product['price'];?></span>
                                          <!-- <input class="" type="text" name="quantity"  style="margin-left:20px;" value="1" size="2" /> -->
                                        
                                          <!-- <div class="clearfix">............................ </div>
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" /> -->
                                        </div>
                                     <?php                            
                                         if ($product['status']=='1')
                                       {                                                                          
                                     ?>
                                        <div class="col-xs-12 col-sm-12 col-lg-2 pull-right item-cart-info quantity buttons_added"> 
                                            <input type="button" value="-" class="minus">
                                            <input type="number" step="1" min="0" max="" name="quantity" id="QTY" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" onchange="myFunction()">
                                            <input type="button" value="+" class="plus">         
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" /> 
                                        </div>
                                        <?php                            
                                       }
                                       else
                                       {
                                        echo '<div class="col-xs-12 col-sm-12 col-lg-5 pull-right item-cart-info"> 
                                                        Not Available at the Moments
                                              </div>';
                                       }                                            
                                     ?>

                                         <!-- <div class="col-xs-12 col-sm-12 col-lg-4 item-cart-info">                                           
                                            <div class=" number-input md-number-input">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                    <input class="quantity" min="0" name="quantity" value="1" type="number" style="margin-left:5px;">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                          </div> -->
                                      
										</form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:Food item -->
								
								<?php
									  }
									}
									
								?>		           
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                       
                    </div>

                </div>
                <!-- end:row -->
            </div><br>
            <div class="clearfix"></div>
            <!-- end:Container -->
            <!-- <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
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
            
            <!-- start: FOOTER -->
            <?php include_once('footer.php');?>
            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
    </div>
    <!--/end:Site wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="food-item white">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6> </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2"> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6> </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3"> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6> </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4"> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6> </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5"> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add to cart</button>
                </div>
            </div>
        </div>
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
    <script src="js/quantity.js"></script>

    <script>
    function myFunction() {
    var x = document.getElementById("QTY").value;              
}

    $(function () {  
        $(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 116;  
        });  
    });  
    

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

  <!-- jQuery and Bootstrap JS -->
  <!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->

  <!-- libhtbox -->
  <!-- <script src="assets/js/lightbox-plus-jquery.min.js"></script> -->


  <script src="assets/js/jquery.magnific-popup.min.js"></script>

  <script src="assets/js/counter.js"></script>
  <script>
  	$(document).ready(function () {
  		$('.popup-with-zoom-anim').magnificPopup({
  			type: 'inline',

  			fixedContentPos: false,
  			fixedBgPos: true,

  			overflowY: 'auto',

  			closeBtnInside: true,
  			preloader: false,

  			midClick: true,
  			removalDelay: 300,
  			mainClass: 'my-mfp-zoom-in'
  		});

  		$('.popup-with-move-anim').magnificPopup({
  			type: 'inline',

  			fixedContentPos: false,
  			fixedBgPos: true,

  			overflowY: 'auto',

  			closeBtnInside: true,
  			preloader: false,

  			midClick: true,
  			removalDelay: 300,
  			mainClass: 'my-mfp-slide-bottom'
  		});
  	});
  </script>

  <!-- testimonials owlcarousel -->
  <script src="assets/js/owl.carousel.js"></script>
  <script>
  	$(document).ready(function () {
  		$('.owl-two').owlCarousel({
  			loop: true,
  			margin: 30,
  			nav: false,
  			responsiveClass: true,
  			autoplay: false,
  			autoplayTimeout: 5000,
  			autoplaySpeed: 1000,
  			autoplayHoverPause: false,
  			responsive: {
  				0: {
  					items: 1,
  					nav: false
  				},
  				480: {
  					items: 1,
  					nav: false
  				},
  				667: {
  					items: 1,
  					nav: false
  				},
  				1000: {
  					items: 1,
  					nav: false
  				}
  			}
  		})
  	})
  </script>
  <!-- //script for Testimonials-->

  <!-- script for food-->
  <script>
  	$(document).ready(function () {
  		$('.owl-carousel').owlCarousel({
  			loop: true,
  			margin: 0,
  			responsiveClass: true,
  			responsive: {
  				0: {
  					items: 1,
  					nav: true
  				},
  				480: {
  					items: 2,
  					nav: true,
  					margin: 20
  				},
  				769: {
  					items: 3,
  					nav: true,
  					margin: 20
  				},
  				1280: {
  					items: 4,
  					nav: true,
  					loop: true,
  					margin: 25
  				}
  			}
  		})
  	})
  </script>
  <!-- //script for food-->

  <!-- disable body scroll which navbar is in active -->
  <script>
  	$(function () {
  		$('.navbar-toggler').click(function () {
  			$('body').toggleClass('noscroll');
  		})
  	});
  </script>
  <!-- disable body scroll which navbar is in active -->
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

  	//Main navigation Active Class Add Remove
  	$(".navbar-toggler").on("click", function () {
  		$("header").toggleClass("active");
  	});
  	$(document).on("ready", function () {
  		if ($(window).width() > 991) {
  			$("header").removeClass("active");
  		}
  		$(window).on("resize", function () {
  			if ($(window).width() > 991) {
  				$("header").removeClass("active");
  			}
  		});
  	});
  </script>
  <!--//MENU-JS-->
  <script src="assets/js/bootstrap.min.js"></script>

  </body>

  </html>