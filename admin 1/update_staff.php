<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{
											  				
		if(empty($_POST['username'])||empty($_POST['role']))
		{	
			$error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>All fields Must be Fillup!</strong>
						</div>';															
		}
       
	    else
	    {
            $check_cat= mysqli_query($db, "SELECT username FROM staff where username = '".$_POST['username']."' ");
            if(mysqli_num_rows($check_cat) > 0)
            {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>UserName already exist!</strong>
                        </div>';
            }
            else
            {			           
                    $mql = "update staff set username ='$_POST[username]',role='$_POST[role]' where st_id='$_GET[staff_upd]'";
                    mysqli_query($db, $mql);	  
                    $success = '<div class="alert alert-info alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Updated!</strong> Successfully.</br></div>';                                 	
             }                     	   
	   }
}
?>   	
    

 <?php include_once('header.php');?>  
 <!-- Container fluid  -->
 <div class="container-fluid">
    <!-- Start Page Content -->			
	 <div class="row">      		
		<div class="container-fluid">
          <?php  
			 echo $error;
             echo $success; 
          ?>
									                    																																											
			 <div class="col-lg-12">
                 <div class="card card-outline-primary">
                     <div class="card-header">
                         <h4 class="m-b-0 text-white">Update Staff </h4>
                     </div>
                    <div class="card-body">
                        <form action='' method='post'enctype="multipart/form-data" >
                            <div class="form-body">
                                <?php $ssql ="select * from staff where st_id='$_GET[staff_upd]'";
										$res=mysqli_query($db, $ssql); 
                                        $row=mysqli_fetch_array($res);
                                      
                                ?>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="username" value="<?php echo $row['username'];  ?>" class="form-control" placeholder="">
                                         </div>
                                    </div> 
                                    <div class="col-md-6">
                                         <div class="form-group has-danger">
                                            <label class="control-label">Role</label>
                                             <input type="test" name="role"  value="<?php echo $row['role'];?>" class="form-control" placeholder="">
                                        </div>
                                    </div>   
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="">
                                         </div>
                                    </div>                                                     -->
                                </div>
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                     <a href="staff.php" class="btn btn-inverse">Back</a>
                                </div>
                         </form>
                    </div>
                 </div>
             </div>					
        </div>																						
     </div>
   <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include_once('footer.php');?>      