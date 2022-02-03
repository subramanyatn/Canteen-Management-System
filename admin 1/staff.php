<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(!empty($_GET['staff_del']))
{
    // print_r($_GET['staff_del']);die;

    mysqli_query($db,"DELETE FROM staff WHERE st_id = '".$_GET['staff_del']."'");
    $error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Recored Deleted</strong>
						</div>';
   // header("location:staff.php");
}
if(isset($_POST['submit']))          
{										  				
		if(empty($_POST['username'])||empty($_POST['role'])||empty($_POST['password']))
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
                            // print_r($fnew);die;																																						                                 
					$sql = "INSERT INTO staff(username,role,password) VALUE('".$_POST['username']."','".$_POST['role']."','".md5($_POST['password'])."')";  // store the submited data ino the database :images
					mysqli_query($db, $sql); 	  
					$success = '<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Congrass!</strong> New Staff Member Added Successfully.
										</div>';               				
             }                     	   
	   }
}
?>
<?php include_once('header.php');?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Staff</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Staff</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <div class="container-fluid"> 
                <!-- Start Page Content -->                 							
                <?php 
                       echo $error;
                       echo $success;
                 ?>											
					<div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Food Category</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">                                     
                                       <hr>                                     
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Role</label>
                                                    <input type="text" name="role"  id="" class="form-control form-control-danger" placeholder="e.x.Cook,Waiter,Manager..">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" name="password"  id="" class="form-control form-control-danger" placeholder="Password">
                                                    </div>
                                            </div>
                                        </div>
                                        <!--/row-->     
                                  </div>
                               </div>
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                    <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                                </div>
                             </form>
                            </div>
                        </div>
                     </div>		

                     <div class="col-12"> 
                        <div class="card" >
                            <div class="card-body" >
                              <h4 class="card-title">Listed Staff</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
                                                <th>UserName</th>
                                                <th>Role</th> 
                                                <th>Reg.Time/Date</th> 
												<th>Action</th>	 
                                            </tr>
                                        </thead>
                                        <tbody>	                                           											
										<?php
											$sql="SELECT * FROM staff order by st_id desc";
											$query=mysqli_query($db,$sql);
												
											if(!mysqli_num_rows($query) > 0 )
											{
															echo '<td colspan="7"><center>No Staff-Data!</center></td>';
											}
											else
											{	$i=1;			
												while($rows=mysqli_fetch_array($query))
												{																																																											
                                                    echo ' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$rows['username'].'</td>
                                                    <td>'.$rows['role'].'</td>
                                                    <td>'.$rows['date'].'</td>
                                                    
                                                    <td><a href="staff.php?staff_del='.$rows['st_id'].'" onclick="return confirm(\'Are sure to delete !\');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 																									 
                                                        <a href="update_staff.php?staff_upd='.$rows['st_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>																									
                                                   </td></tr>';	
                                                   $i++;																				 																																																			
												}	
											}													
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					 </div>									
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
 <?php include_once('footer.php');?>  