<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<?php include_once('header.php');?> 
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Status</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Status</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students Orders</h4>
                             
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
                                                <th>Student Name</th>		
                                                <th>Dish Name</th>
                                                <th>Quantity</th>
                                                <th>price</th>	
												<th>status</th>												
												 <th>PickUp Time</th>
												  <th>Action</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
											
											<?php
												$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id order by o_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
													{
															echo '<td colspan="8"><center>No Orders-Data!</center></td>';
													}
													else
													{			
                                                        $i=1;
																	while($rows=mysqli_fetch_array($query))
																	{
                                                                        $status=$rows['status'];	
                                                                        if($status=="" or $status=="NULL")
                                                                        {																		
											?>
																				<?php
																					echo ' <tr>
                                                                                                <td>'.$i.'</td>
																					           <td>'.$rows['student_name'].'</td>
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['quantity'].'</td>
																								<td>₹'.$rows['price'].'</td>';
																				?>
																								<?php 
                                                                                                    
                                                                                                    if($status=="" or $status=="NULL")
                                                                                                    {
                                                                                                 ?>
                                                                                                    <td> <button type="button" class="btn btn-primary" style="font-weight:bold;"><span class="fa fa-spinner fa-pulse"  aria-hidden="true" ></span> <span></span> Pending</button></td>
                                                                                                <?php 
                                                                                                    }
                                                                                                  
                                                                                                ?>
                                                                                                   
                                                                                                
																					          <?php																									
																							echo '	<td>'.$rows['pick_time'].'</td>';
																				            	?>
																								    <td>
																									    <!-- <a href="delete_orders.php?order_del=<?php echo $rows['o_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>  -->
																								<?php
																							        	echo '<a href="view_status.php?o_id='.$rows['o_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
																									</td>
																		</tr>';	
                                                                        $i++;
                                                                        }
                                                                        // else
                                                                        // {
                                                                        //     echo '<td colspan="8"><center>No New Orders!</center></td>';
                                                                        // }										 																																												
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