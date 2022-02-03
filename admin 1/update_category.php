<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{
											  				
		if(empty($_POST['c_name']))
		{	
			$error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>All fields Must be Fillup!</strong>
						</div>';															
		}
        elseif(empty($_FILES['file']['name']))
        {
         
            $sql = "update res_category set c_name ='$_POST[c_name]' where c_id='$_GET[cat_upd]'";
            mysqli_query($db, $sql); 
                $success = 	'<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Record</strong>Updated.
                </div>';    
        }
	    else
	    {
            $check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['c_name']."' ");
            //  print_r(mysqli_num_rows($check_cat));die;
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

                            $mql = "update res_category set c_name ='$_POST[c_name]',image='$fnew' where c_id='$_GET[cat_upd]'";
                            mysqli_query($db, $mql);
                            move_uploaded_file($temp, $store);			  
                                    $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Updated!</strong> Successfully.</br></div>';                                 
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
                         <h4 class="m-b-0 text-white">Update Food Category</h4>
                     </div>
                    <div class="card-body">
                        <form action='' method='post'enctype="multipart/form-data" >
                            <div class="form-body">
                                <?php $ssql ="select * from res_category where c_id='$_GET[cat_upd]'";
										$res=mysqli_query($db, $ssql); 
                                        $row=mysqli_fetch_array($res);
                                ?>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <input type="text" name="c_name" value="<?php echo $row['c_name'];  ?>" class="form-control" placeholder="Food Category Name">
                                         </div>
                                    </div> 
                                    <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                    </div>                                                      
                                </div>
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                     <a href="add_category.php" class="btn btn-inverse">Back</a>
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