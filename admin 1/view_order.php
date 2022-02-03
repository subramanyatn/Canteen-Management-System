<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<?php include_once('header.php');?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
           
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        
                       
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View user Orders</h4>
                             
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                       
                                        <tbody>
                                           <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
																																		
												?>
											
											<tr>
													<td><strong>Student Name:</strong></td>
												    <td><center><?php echo $rows['student_name']; ?></center></td>
													   <td><center>
													   <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
															 <button type="button" class="btn btn-primary">Take Action</button></a>
															 </center>
											 </td>
												  
																																					
											</tr>	
											<tr>
												<td><strong>Dish Name:</strong></td>
												    <td><center><?php echo $rows['title']; ?></center></td>
													<!-- <td><center>
													<a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
													<button type="button" class="btn btn-primary">View User Detials</button></a>
										
													</center></td> -->
												   																								
											</tr>	
											<tr>
													<td><strong>Quantity:</strong></td>
												    <td><center><?php echo $rows['quantity']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>Price:</strong></td>
												    <td><center>₹<?php echo $rows['price']; ?></center></td>
													   
												   																							
											</tr>
											<tr>
                                                                        <td><strong>PickUp Time:</strong></td>
                                                                        <td><center><?php echo $rows['pick_time'] ; ?></center></td>
                                                                                                                                                                         
                                            </tr>
											<tr>
													<td><strong>Date:</strong></td>
												     <td><center><?php echo $rows['date']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>status:</strong></td>
													<?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<td> <center><button type="button" class="btn btn-primary"><span class="fa fa-spinner fa-pulse"  aria-hidden="true" ></span> Pending</button></center></td>
																		    <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																			<td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>Preparing!</button></td> 
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
                                                                            <td> <button type="button" class="btn btn-success"> <i class="fa fa-check-circle"></i> <span></span>Delivered</button></td> 

                                                                            <?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			<td> <button type="button" class="btn btn-danger"> <i class="fa fa-times-circle"></i> <span></span>Cancelled</button></td> 
																			<?php 
																			} 
																			?>
                                                                            <?php
																			if($status=="confirm")
																			{
																			?>
																			<td>  <button type="button" class="btn btn-info"> <i class="fa fa-check"></i> <span></span>Accepted</button></td> 
																			<?php 
																			} 
																			if($status=="prepared")
																			{
																			?>
																			<td><button type="button" class="btn btn-info" style="background-color: green !important;border-color:green;"> <i class="fa fa-shopping-bag"></i> <span></span>Prepared</button></td> 
																			<?php 
																			}  
																			?>
													  
												   																							
											</tr>
                                           
                                        </tbody>
                                    </table>
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