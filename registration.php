<!DOCTYPE html>
<html lang="en">
<?php
session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
   if(empty($_POST['rollNo']) || empty($_POST['studentName']) ||empty($_POST['email']) ||  empty($_POST['phone'])||empty($_POST['password'])||empty($_POST['cpassword']))
	{
			$message = "All fields must be Required!";
	}
	else
	{
      //checking RollNo & email if already present
      $check_RollNo= mysqli_query($db, "SELECT roll_no FROM users where roll_no = '".$_POST['rollNo']."' ");
      $check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
     // print_r($check_RollNo);die;

      if($_POST['password'] != $_POST['cpassword'])
      {  //matching passwords
            $message = "Password not match";
      }
      elseif(strlen($_POST['password']) < 6)  //cal password length
      {
         $message = "Password Must be greater than six digits";
      }
      elseif(strlen($_POST['phone']) < 10)  //cal phone length
      {
         $message = "invalid phone number!";
      }
      elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
      {
            $message = "Invalid email address please type a valid email!";
      }
      elseif(mysqli_num_rows($check_RollNo) > 0)  //check username
      {
         $message = 'Roll No Already exists!';
      }
      elseif(mysqli_num_rows($check_email) > 0) //check email
      {
         $message = 'Email Already exists!';
      }
      else
      {  
      //inserting values into db
         $mql = "INSERT INTO users(roll_no,student_name,email,phone,password) VALUES('".$_POST['rollNo']."','".$_POST['studentName']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."')";
         mysqli_query($db, $mql);
         $success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
                                             <script type='text/javascript'>
                                             function countdown() {
                                                var i = document.getElementById('counter');
                                                if (parseInt(i.innerHTML)<=0) {
                                                   location.href = 'login.php';
                                                }
                                                i.innerHTML = parseInt(i.innerHTML)-1;
                                             }
                                             setInterval(function(){ countdown(); },1000);
                                             </script>'";
            
         header("refresh:5;url=login.php"); // redireted once inserted success
      }
	}

}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="css/style.css" rel="stylesheet"> </head>
<body style="background-color:#e9e9e9; padding-left:225px;padding-top:115px;">
     
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8" style="width: 80% !important;">
                        <div class="widget" style="background-color: white !important;">
                           <div class="widget-body">                          
							       <form action="" method="post">
                              <div class="row">
                                   <div class="form-group col-sm-12">
                                       <h3 style="color: #f30;"><center>Register Here</center></h3>
                                   </div>
                                   <div class="container">
                                       <ul>
                                          <li>
                                             <a href="#" class="active">
                                                <span style="color:red;"><?php echo $message; ?></span>
                                                <span style="color:green;"><?php echo $success; ?></span>
                                             </a>
                                          </li> 
                                       </ul>
                                    </div>
								           <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputEmail1">Student Name</label> -->
                                       <input class="form-control" type="text" name="studentName" id="example-text-input" placeholder="Student Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputEmail1">Roll No</label> -->
                                       <input class="form-control" type="text" name="rollNo" id="example-text-input" placeholder="Roll No"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputEmail1">Email address</label> -->
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputEmail1">Phone number</label> -->
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Phone"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputPassword1">Password</label> -->
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <!-- <label for="exampleInputPassword1">Repeat password</label> -->
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Repeat Password"> 
                                    </div>  
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form> 
						          </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                  </div>
               </div>
            </section> 
         </div>
         <!-- end:page wrapper -->
      
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
</body>

</html>