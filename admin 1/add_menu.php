<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{
											  				
		if(empty($_POST['d_name'])||empty($_POST['about'])||$_POST['price']==''||$_POST['dish_name']=='')
		{	
			$error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>All fields Must be Fillup!</strong>
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
                $store = "Category_Image/dishes/".basename($fnew);                      // the path to store the upload image
                
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
							$sql = "INSERT INTO dishes(title,slogan,price,img,status,c_id) VALUE('".$_POST['d_name']."','".$_POST['about']."','".$_POST['price']."','".$fnew."','".$_POST['status']."','".$_POST['dish_name']."')";  // store the submited data ino the database :images
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
?>
<?php include_once('header.php');?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Menu</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Menu</li>
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
                                <h4 class="m-b-0 text-white">Add Menu to Food Category</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">                                     
                                       <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Dish Name</label>
                                                    <input type="text" name="d_name" class="form-control" placeholder="Morzirella">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">About</label>
                                                    <input type="text" name="about" class="form-control form-control-danger" placeholder="slogan">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">price </label>
                                                    <input type="text" name="price" class="form-control" placeholder="₹">
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
										
                                            <!--/span-->
                                        <div class="row">	
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Category</label>
													<select name="dish_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Select Food Category--</option>
                                                        <?php
                                                            $ssql ="select * from res_category";
                                                            $res=mysqli_query($db, $ssql); 
                                                            while($row=mysqli_fetch_array($res))  
                                                            {
                                                                echo' <option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';;
                                                            }                                                 
													    ?> 
													 </select>
                                                </div>
                                              </div>		

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
													<select name="status" class="form-control custom-select" data-placeholder="Select Status" tabindex="1" >
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
													 </select>
                                                </div>
                                             </div>																													
																																										
                                        </div>      
                                  </div>
                               </div>
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                    <a href="all_menu.php" class="btn btn-inverse">Cancel</a>
                                </div>
                             </form>
                            </div>
                        </div>
                     </div>										
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
 <?php include_once('footer.php');?>  