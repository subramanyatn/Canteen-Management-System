<link rel="stylesheet" href="assets/css/style-starter.css">
<style>
h3,p{
    text-align: center;
}
</style>
<?php include_once('header.php'); ?>


<!-- Domain Modal -->
<div class="modal right fade" id="DomainModal" tabindex="-1" role="dialog" aria-labelledby="DomainModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>

      <div class="modal-body">
        <div class="modal__content">
          <h2 class="logo"><span class="fa fa-cutlery"></span> MCE Canteen</h2>
          <!-- if logo is image enable this   
          <h2 class="logo">
            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
          </h2> -->
          <p class="mt-md-3 mt-2">Lorem ipsum dolor sit amet, elit. Eos expedita ipsam at fugiat ab.</p>
          <img src="assets/images/p1.jpg" alt="image" class="img-fluid radius-image mt-4">
          <div class="widget-social-icons mt-sm-5 mt-4">
            <h5 class="widget-title">Contact Us</h5>
            <ul class="icon-rounded address">
              <li>
                <p>MCE canteen, Hassan</p>
              </li>
              <li class="mt-3">
                <p><span class="fa fa-phone"></span> <a href="tel:+404-11-22-89">+1-2345-345-678-11</a></p>
              </li>
              <li class="mt-2">
                <p><span class="fa fa-envelope"></span> <a
                    href="mailto:pizza@order.com">mcecanteen@order.com</a></p>
              </li>
              <li class="top_li1 mt-2">
                <p><span class="fa fa-clock-o"></span> <a href="#url">Mon - Fri : 09:00 am to 10:00 pm
                  </a></p>
              </li>
            </ul>
          </div>
          <div class="widget-social-icons mt-sm-5 mt-4">
            <h5 class="widget-title">Follow Us</h5>
            <ul class="icon-rounded">
              <li><a class="social-link twitter" href="#url" target="_blank"><span class="fa fa-twitter"></span></a></li>
              <li><a class="social-link linkedin" href="#url" target="_blank"><span class="fa fa-linkedin"></span></a></li>
              <li><a class="social-link facebook" href="#url" target="_blank"><span class="fa fa-facebook"></span></a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>
    <!-- //modal-content -->
  </div>
  <!-- //modal-dialog -->
</div>
<!-- //Domain modal -->
<section class="w3l-banner" id="banner">
    <div class="new-block py-5">
        <div class="container">
            <div class="row middle-section">
                <div class="col-lg-7 section-width align-self">
                    <h5>Eat tasty dish everyday</h5>
                    <h2>Share your love about food</h2>
                    <a href="menu.php" class="btn btn-secondary btn-outline-style mt-md-5 mt-4"> 
                        <span class="fa fa-shopping-cart mr-2"></span> Order Online</a>
                </div>
                <div class="col-lg-5 history-info mt-lg-0 mt-5 pt-lg-0 pt-md-4">
                    <img src="assets/images/main_3-.png" class="img-fluid" alt="image">
                    <!-- <div class="cost">
                        <h5>Only</h5>
                        <h3>$25</h3>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- iphone home block -->
<section class="w3l-about py-5">
    <div class="container py-lg-5 py-md-4">
        <div class="row">
            <div class="col-lg-6">
                <h3>We make the Best Food in our Collage</h3>
                <h5 class="mt-lg-3 mt-2">Best food in buget and you can get it fresh and hot.
                </h5>
                <p class="mt-sm-4 mt-3 mb-sm-0 mb-2"></p>
                <a href="about.php" class="btn-style btn-primary btn mt-lg-5 mt-4">Know more about us</a>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <div class="row">
                    <div class="col-6 features-with-17-left1">
                        <a href="#url" class="icon"><img src="assets/images/pizza.png" alt="" /></a>
                        <h4><a href="#url">Food vavilable on time</a></h4>
                    </div>
                    <div class="col-6 features-with-17-left1">
                        <a href="#url" class="icon"><img src="assets/images/burger.png" alt="" /></a>
                        <h4><a href="#url">best quality products</a></h4>
                    </div>
                    <div class="col-6 features-with-17-left1 mt-5 pt-lg-3">
                        <a href="#url" class="icon"><img src="assets/images/drink.png" alt="" /></a>
                        <h4><a href="#url"> MCE best food</a></h4>
                    </div>
                    <div class="col-6 features-with-17-left1 mt-5 pt-lg-3">
                        <a href="#url" class="icon"><img src="assets/images/fries.png" alt="" /></a>
                        <h4><a href="#url">Fastest order prepared and easy pick-up</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<!-- Food Menu -->
 <section class="w3l-food" id="food">
    <div class="foods1 py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="title-content text-center">
                <h6 class="sub-title">Special Iteam</h6>
                <h3 class="title-big">Dish Of The Day</h3>
            </div>
            <div class="foods1-content mt-lg-5 mt-4 mb-sm-0 mb-4">
                <div class="owl-carousel owl-theme text-center">
                <?php 
						$query_res= mysqli_query($db,"SELECT * FROM dishes where in_today_menu='1'"); 
						while($product=mysqli_fetch_array($query_res))
					    {
                ?>
                            <div class="item">
                                <div class="d-grid food-info">
                                    <div class="column">
                                        <h4 class="name-pos"><a href="#url"><?php echo $product['title']; ?></a></h4>
                                        <p><?php echo $product['slogan']; ?></p>
                                        <h5>₹ <?php echo $product['price']; ?></h5>
                                        <a href="dishes.php?c_id=<?php echo $product['c_id']; ?>&action=add1&id=<?php echo $product['d_id']; ?>" class="btn-style btn-primary btn mt-4" >Order Online</a>
                                        <a href="#url"><?php echo '<img src="admin/Category_Image/dishes/'.$product['img'].'" alt="Food logo" class="img-fluid radius-image mt-4 responsive" style="height: 160px; width:220px">'; ?></a>
                                    </div>
                                </div>
                            </div>  
                <?php
				         }					
				?>
                    <!-- <div class="item">
                        <div class="d-grid food-info">
                            <div class="column">
                                <h4 class="name-pos"><a href="#url">Prosciutto e Funghi</a></h4>
                                <p>Tomato sauce, ham, and mushrooms</p>
                                <h5>20$</h5>
                                <a href="#url" class="btn-style btn-primary btn mt-4">Order Online</a>
                                <a href="#url"><img src="assets/images/p4.jpg" alt="" class="img-fluid radius-image mt-4"/></a>
                            </div>
                        </div> -->
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
   <!-- How it works block starts -->
   <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                    <h2 style="text-align: center;">Easy 3 Step Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                            <div class="how-it-works-wrap">
                                <div class="step step-1">
                                    <div class="icon" data-step="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                                            <g fill="#FFF">
                                                <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z" />
                                                <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z" /> </g>
                                        </svg>
                                    </div>
                                    <h3>Choose Your Tasty Dish</h3>
                                    <p>We"ve provide best food in collage hours.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2">
                                <div class="icon" data-step="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                        <g fill="#FFF">
                                            <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                                    </svg>
                                </div>
                                <h3>Place Order And Select Pick Up Time</h3>
                                <p>We"ve provide facility of online food ordering and choose time to order collect.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3">
                                <div class="icon" data-step="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                                        <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#FFF" /> </svg>
                                </div>
                                <h3>Pick up Food</h3>
                                <p>Collect your food! And enjoy your meal! Pay online on pickup or Cash on delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 block sections ends -->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="pay-info">Pay by Online Or Cash on delivery</p>
                    </div>
                </div>
            </div>
        </section>            
        <div class="chilly"></div>

        <!-- How it works block ends -->
<!-- Image gallary -->
<section class="w3l-portfolio-8 py-5">
    <div class="portfolio-main py-lg-5 py-md-4">
        <div class="container">
            <div class="title-content text-center">
                <h6 class="sub-title">Gallery</h6>
                <h3 class="title-big">Food Gallery</h3>
            </div>
            <div class="row galler-top mt-lg-5 mt-4">
                <div class="col-md-3 col-6 protfolio-item hover14 align-self">
                    <a href="assets/images/image11.jpg" data-lightbox="example-set"
                    data-title="Breakfast">
                            <figure>
                                <img src="assets/images/mce1.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
                </div>
                <div class="col-md-3 col-6 protfolio-item hover14">
                    <a href="assets/images/image2.jpg" data-lightbox="example-set" class="mb-4"
                    data-title="Pizza">
                            <figure>
                                <img src="assets/images/mce2.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
                    <a href="assets/images/image1.jpg" data-lightbox="example-set"
                    data-title="Burgers">
                            <figure>
                                <img src="assets/images/mce3.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
                </div>
                <div class="col-md-3 col-6 protfolio-item hover14">
                    <a href="assets/images/image4.jpg" data-lightbox="example-set" class="mb-4"
                    data-title="South Indian Food">
                            <figure>
                                <img src="assets/images/image4.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
                    <a href="assets/images/image3.jpg" data-lightbox="example-set"
                    data-title="Chinese Food">
                            <figure>
                                <img src="assets/images/mce4.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
                </div>
                <div class="col-md-3 col-6 protfolio-item hover14 align-self">
                    <a href="assets/images/image5.jpg" data-lightbox="example-set"
                    data-title="Punjabi Food">
                            <figure>
                                <img src="assets/images/mce5.jpg" alt="product" class="img-fluid radius-image">
                            </figure>
                    </a>
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