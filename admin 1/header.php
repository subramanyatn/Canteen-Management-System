<?php
if(strlen($_SESSION['adm_id'])==0)
{ 
header('location:index.php');
}

                                $chck="SELECT * FROM users_orders WHERE status IS NULL";
                                $result=mysqli_query($db,$chck);
                                $rowcount=mysqli_num_rows($result);
								//print_r($rowcount);die;

                                $chck2="SELECT * FROM contact_us where visit=0";
                                $result2=mysqli_query($db,$chck2);
                                $rowcount2=mysqli_num_rows($result2);
                                //$rows2=mysqli_fetch_array($result2);
                                

                                $sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
								$query=mysqli_query($db,$sql);

                                if(!empty($_POST['visit']))
                                {
                                    print_r('cdddddd');die;
                                }
							
                        ?>	
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
        <!-- All Jquery -->
        <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><span class="fa fa-cutlery"></span></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>MCE Canteen ADMIN </span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <!-- <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row"> -->


                                    <!-- <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li> -->
<!--                                     
                                </ul>
                            </div> -->
                        </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- Comment -->

                       
                
                        
                <!-- <i class="fa fa-envelope"></i><span class="badge">9</span>  -->
               	
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                               <?php 
                                if($rowcount >0 )
                                {
                                    echo'<div class="notify" > <span id="s1" class="heartbit"></span> <span class="point"></span> </div>';
                                }                        
                               ?>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                <?php if(!$rowcount >0 )
                                      {
                                         echo'<li><div class="drop-title">No New Notifications</div></li>';
                                      }
                                      else
                                      {
                                
                                ?>                                        	
                                    <li><div class="drop-title">Notifications</div></li>
                                    <li>
                                        <div class="message-center">
                                            <?php
                                                    while($rows=mysqli_fetch_array($query))
                                                    {	
                                                        $status=$rows['status'];	
                                                        if($status=="" or $status=="NULL")
                                                        {																	
                                              ?>
                                                    <a href="status.php">
                                                        <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                        <div class="mail-contnet">
                                                            <h5><?=$rows['student_name']?></h5> <span class="mail-desc">New order Of <b><?=$rows['title']?></b></span> <span class="time">PickUp Time :<b><?=$rows['pick_time']?></b></span>
                                                        </div>
                                                    </a>

                                            <?php 
                                                        }
                                                    }
                                            ?>
                                            
                                        </div>
                                    </li>
<!-- 
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li> -->
                                    <?php 
                                      }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <!-- End Comment -->
                        <!-- Messages -->
                         <!-- Messages -->
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" id="m1" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                            <?php 
                           
                                if($rowcount2 >0 )
                                {
                                    echo'<div class="notify" > <span id="s3" class="heartbit"></span> <span  id="s4" class="point"></span> </div>';
                                }                        
                               ?>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                <?php if(!$rowcount2 >0 )
                                      {
                                         echo'<li><div class="drop-title">No New Notifications</div></li>';
                                      }
                                      else
                                      {
                                               
                                ?>   
                                <li><div class="drop-title">You have <?=$rowcount2?> new messages</div></li>         
                                    <li>
                                        <div class="message-center">
                                          <?php
                                                    while($rows2=mysqli_fetch_array($result2))
                                                    {
                                          ?>
                                                <input type="hidden" name="visit" id="vsiti" value="<?=$rows2['visit']?>">
                                                <a href="all_contact.php">
                                                <div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?=$rows2['name'] ?></h5> <span class="mail-desc"><?=$rows2['email']?></span> <span class="time">Message :<?=$rows2['message']?></span>
                                                </div>
                                            </a>
                                           <?php
                                                    }
                                           ?>
                                           
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li> -->
                                    <?php
                                      }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="" href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <!-- <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                
                            </ul> -->
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="" href="status.php" aria-expanded="false"> <span><i class="fa fa-hourglass-2"></i></span><span class="hide-menu">Status</span> <?= $rowcount >0 ? '<span class="badge"> '.$rowcount.'</span>':'' ?>   </a>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-group f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
								<li><a href="add_users.php">Add Users</a></li>
								
                               
                            </ul>
                        </li>
                        <li> <a class="" href="staff.php" aria-expanded="false"> <span><i class="fa fa-user f-s-20"></i></span><span class="hide-menu">Staff</span> </a>

                        <li> <a class=" " href="add_category.php" aria-expanded="false"><i class="fa fa-apple f-s-20"></i><span class="hide-menu">Food Category</span></a>
                            <!-- <ul aria-expanded="false" class="collapse">
								<li><a href="allrestraunt.php">All Stores</a></li>
								<li><a href="add_category.php">Add Category</a></li>                             
                                
                            </ul> -->
                        </li>
                      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">All Orders</a></li>
								  
                            </ul>
                        </li>
                        <li> <a class="" href="all_contact.php" aria-expanded="false"> <span><i class="fa fa-phone"></i></span><span class="hide-menu">Contact Us</span> </a>
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:auto;">

            <!-- Bread crumb -->
           
            <!-- End Bread crumb -->
            <!-- Container fluid  -->

<!-- <script>
    $(document).ready(function(){
        $("#m1").click(function(){
           
        });
    });
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function() {
$("#m1").click(function() {
    $.ajax({
        // var x = $("#visit").serializeArray();
        url: 'header.php',
        type: 'post',
        dataType: 'json',  
        success: function(data) {
            alert("succe");
            var visit = data[4];       
        },
        error: function(data) {
            alert("ERRRR");
        }

    })
});
});
</script> -->