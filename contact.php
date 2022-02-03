<!DOCTYPE html>
<html lang="en">
<?php
	include("connection/connect.php");

	error_reporting(0);
	session_start();

		if(!empty($_POST['email'])||!empty($_POST['message']))
		{
			// print_r($_POST['name']);die;
			$sql = "INSERT INTO contact_us(name,email,message) VALUE('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')"; 
			mysqli_query($db, $sql); 
		}
			
?>
<?php include_once('header.php'); ?>
<link rel="stylesheet" href="assets/css/style-starter.css">

<!-- //Domain modal -->
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="#url">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact</li>
        </ul>
    </div>
</section>

<section class="w3l-contact-11 py-5">
    <div class="contacts-main py-lg-5 py-md-4">
      <div class="contant11-top-bg">
        <div class="container">
            <div class="title-content text-center">
                <h6 class="sub-title">Contact</h6>
                <h3 class="title-big">Get in touch with us</h3>
            </div>
          <div class="d-grid contact section-gap mt-lg-5 mt-4">
            <div class="contact-info-left d-grid text-center">
              <div class="contact-info">
                <span class="fa fa-map-marker" aria-hidden="true"></span>
                <h4>Get Directions</h4>
                <p>Your Address,City,State</p>
              </div>
              <div class="contact-info">
                <span class="fa fa-phone" aria-hidden="true"></span>
                <h4>Contact Us</h4>
                <p><a href="tel:+123456789">123456789</a></p>
              </div>
              <div class="contact-info">
                <span class="fa fa-clock-o" aria-hidden="true"></span>
                <h4>Opening Hours</h4>
                <p>Monday - Friday</p>
                 <p> 09:00 am to 10:00 pm</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-41-mian section-gap mt-5">
        <div class="container">
          <div class="d-grid align-form-map">
            <div class="form-inner-cont">
              <form action="" method="post" class="signin-form">
                <div class="form-input">
                  <label for="w3lName">Name(Required)*</label>
                  <input type="text" name="name" id="" placeholder="" required=""/>
                </div>
                <div class="form-input">
                  <label for="w3lSender">Email(Required)*</label>
                  <input type="email" name="email" id="" placeholder="" required="" />
                </div>
                <div class="form-input">
                  <label for="w3lMessage">Message(Required)*</label>
                  <textarea placeholder="" name="message" id="" required=""></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-style btn-primary">Submit</button>
              </form>
            </div>
           
          </div>
        </div>
      </div>
  </section>
  <!-- footers 20 -->
  <?php include_once('footer.php'); ?>
  
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
  <script src="assets/js/jquery-3.3.1.min.js"></script>

  <!-- libhtbox -->
  <script src="assets/js/lightbox-plus-jquery.min.js"></script>


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