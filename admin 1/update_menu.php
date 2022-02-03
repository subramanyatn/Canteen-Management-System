<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))           //if upload btn is press
{				
		if(empty($_POST['d_name'])||empty($_POST['about'])||$_POST['price']==''||$_POST['dish_name']=='')
		{	
			$error =   '<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>All fields Must be Fillup!</strong>
						</div>';																
		}
        elseif(empty($_FILES['file']['name']))
        {
         
            $sql = "update dishes set c_id='$_POST[dish_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',status=$_POST[status],in_today_menu=$_POST[inToday] where d_id='$_GET[menu_upd]'"; 
            mysqli_query($db, $sql); 
                $success = 	'<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Record</strong>Updated.
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
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
								     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									 <strong>Max Image Size is 1024kb!</strong> Try different Image.
									 </div>';
	   
					}
					else
					{				                                 
						$sql = "update dishes set c_id='$_POST[dish_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',img='$fnew',status=$_POST[status],in_today_menu=$_POST[in_Today] where d_id='$_GET[menu_upd]'";  
						mysqli_query($db, $sql); 
						move_uploaded_file($temp, $store);
			  
						$success = 	'<div class="alert alert-success alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Record</strong>Updated.
									</div>';           	
					}
                }
               
               // header('location:all_menu.php')	;		              	   	   
	   }
}
?>
 <?php include_once('header.php');?>  

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
                                    <?php
                                         $qml ="select * from dishes where d_id='$_GET[menu_upd]'";
										 $rest=mysqli_query($db, $qml); 
										 $rows=mysqli_fetch_array($rest);                                                     
                                    ?>
                                    <hr>
                                     <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label class="control-label">Dish Name</label>
                                                <input type="text" name="d_name" value="<?php echo $rows['title'];?>" class="form-control" placeholder="Morzirella">
                                             </div>
                                         </div>
                                            <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">About</label>
                                                <input type="text" name="about" value="<?php echo $rows['slogan'];?>" class="form-control form-control-danger" placeholder="slogan">
                                             </div>
                                         </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">price </label>
                                                    <input type="text" name="price" value="<?php echo $rows['price'];?>"  class="form-control" placeholder="₹">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                            <!-- <img src="Category_Image/dishes/<?php echo $rows['img'];?>" class="img-responsive  radius pull-right" style="height:150px;width:1500px" /> -->
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">	
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Select Food Category</label>
													<select name="dish_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" >
                                                        <?php
                                                            $ssql ="select * from res_category  ";//where c_id='".$rows['c_id']."'
                                                            $res=mysqli_query($db, $ssql); 
                                                            while($row=mysqli_fetch_array($res))  
                                                            {
                                                          ?>      
                                                                <option value="<?=$row['c_id']?>" <?=$rows['c_id']== $row['c_id']  ? 'selected="selected"' :'' ?>><?=$row['c_name']?></option>;
                                                        <?php
                                                            }                                                 
													    ?> 
													 </select>
                                                </div>
                                             </div>			
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
													<select name="status" class="form-control custom-select" data-placeholder="Select Status" tabindex="1" >
                                                        <option value="1" <?=$rows['status']==1 ? 'selected="selected"' :''?>>Active</option>
                                                        <option value="0" <?=$rows['status']==0 ? 'selected="selected"' :''?>>InActive</option>
													 </select>
                                                </div>
                                             </div>	
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Today's Menu</label>
													<select name="inToday" class="form-control custom-select" data-placeholder="Select Status" tabindex="1" >
                                                        <option value="1" <?=$rows['in_today_menu']==1 ? 'selected="selected"' :''?>>Active</option>
                                                        <option value="0" <?=$rows['in_today_menu']==0 ? 'selected="selected"' :''?>>InActive</option>
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