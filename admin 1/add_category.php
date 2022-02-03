<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{
											  				
		if(empty($_POST['food_name']))
		{	
			$error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>All fields Must be Fillup!</strong>
						</div>';															
		}
	    else
	   {
            $check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['food_name']."' ");
            // print_r(mysqli_num_rows($check_cat));die;
            if(mysqli_num_rows($check_cat) > 0)
            {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Category Food already exist!</strong>
                        </div>';
            }
            else
            {			           

				$fname = $_FILES['file']['name'];
				$temp = $_FILES['file']['tmp_name'];
			    $fsize = $_FILES['file']['size'];
				$extension = explode('.',$fname);
				$extension = strtolower(end($extension));  
				$fnew = uniqid().'.'.$extension; 
                $store = "Category_Image/".basename($fnew);                      // the path to store the upload image
                // print_r($extension);die;	

	                if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
						if($fsize>=1000000)
						{			
							$error =   '<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Max Image Size is 1024kb!</strong> Try different Image.
										</div>';
						}		
						else
					    {	
                            // print_r($fnew);die;	
																																							                                 
							$sql = "INSERT INTO res_category(c_name,image) VALUE('".$_POST['food_name']."','".$fnew."')";  // store the submited data ino the database :images
							mysqli_query($db, $sql); 
							move_uploaded_file($temp, $store);			  
							$success = '<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Congrass!</strong> New Dish Added Successfully.
										</div>';               	
						}
					}
					elseif($extension == '')
					{
						$error = '<div class="alert alert-danger alert-dismissible fade show">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>select image</strong>
								 </div>';
					}
                    else
                    {					
						$error = '<div class="alert alert-danger alert-dismissible fade show">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>invalid extension!</strong>png, jpg, Gif are accepted.
								  </div>';							   
                    } 
             }                     	   
	   }
}
?>
<?php include_once('header.php');?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Food Category</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Food Category</li>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Food Category Name </label>
                                                    <input type="text" name="food_name" class="form-control" placeholder="ex.Breackfast,Lunch....">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
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
                              <h4 class="card-title">Listed Categories</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
                                                <th>Food Category Name</th>
                                                <th>Date</th> 
                                                <th>Image</th> 
												<th>Action</th>	 
                                            </tr>
                                        </thead>
                                        <tbody>	                                           											
										<?php
											$sql="SELECT * FROM res_category order by c_id desc";
											$query=mysqli_query($db,$sql);
												
											if(!mysqli_num_rows($query) > 0 )
											{
															echo '<td colspan="7"><center>No Categories-Data!</center></td>';
											}
											else
											{	$i=1;			
												while($rows=mysqli_fetch_array($query))
												{																																																											
                                                    echo ' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$rows['c_name'].'</td>
                                                    <td>'.$rows['date'].'</td>
                                                    
                                                    <td><div class="col-md-3 col-lg-8 m-b-10">
                                                        <center><img src="Category_Image/'.$rows['image'].'" class="img-responsive  radius" style="height:100px;width:150px;" /></center></div>
                                                    </td>	

                                                    <td><a href="delete_category.php?cat_del='.$rows['c_id'].'" onclick="return confirm(\'Are sure to delete !\');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 																									 
                                                        <a href="update_category.php?cat_upd='.$rows['c_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>																									
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