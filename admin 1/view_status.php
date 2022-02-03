<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<?php 

if(isset($_POST['submit'] ))
{
    if(!empty($_POST['status']))
    {
         //print_r($_POST['status']);die;
       $UpdateSql="update users_orders set status='$_POST[status]' where o_id=$_GET[o_id]";
       mysqli_query($db, $UpdateSql); 
     
        header('location:status.php');

    }
}
?>
<?php include_once('header.php');?>

            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-8">                                         
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Students Orders</h4>
                             
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                       
                                        <tbody>
                                           <?php
                                              
                                                    $sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['o_id']."'";
                                                    $query=mysqli_query($db,$sql);
                                                    $rows=mysqli_fetch_array($query);                                                        
											?>
                                           
                                                               <tr>
                                                                    <td><strong>Student Name:</strong></td>
                                                                    <td><center><?php echo $rows['student_name']; ?></center></td>
                                                                    
                                                                                                                                                                                                                                   
                                                               </tr>	
                                                               <tr>
                                                                    <td><strong>Dish Name:</strong></td>
                                                                    <td><center><?php echo $rows['title'] ?></center></td>
                                                                                                                                                                                                                                             
                                                                </tr>	
                                                                <tr>
                                                                        <td><strong>Quantity:</strong></td>
                                                                        <td><center><?php echo $rows['quantity']; ?></center></td>
                                                                                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>Price:</strong></td>
                                                                        <td><center>₹<?php echo $rows['price'] ; ?></center></td>
                                                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>PickUp Time:</strong></td>
                                                                        <td><center><?php echo $rows['pick_time'] ; ?></center></td>
                                                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>status:</strong></td>
                                                                        <?php
                                                                        $status=$rows['status'];
                                                                        if($status=="" or $status=="NULL")
                                                                        {                                                                  
                                                                            echo '<td> <center><button type="button" class="btn btn-primary" style="font-weight:bold;"><span class="fa fa-spinner fa-pulse"  aria-hidden="true" ></span> <span></span> Pending</button></center></td>';                                                               
                                                                        }
                                                                        
                                                                        ?>
                                                                 </tr>																					                                                                               
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Select the Confirmation</label>
                                                <select name="status"class="form-control">
                                                        <option value selected>Please Select</option>
                                                        <option value="confirm">Confirm</option> 
                                                        <option value="rejected">Reject</option>                                                                                                                                       
                                                </select>
                                        </div>
                                      <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                    
                                    </form>
                              </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
			
			
<?php include_once('footer.php');?>