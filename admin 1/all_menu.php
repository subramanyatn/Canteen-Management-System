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
                    <h3 class="text-primary">All Menues</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Menues</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">                                                                                           												
						<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Menu data</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
											    <th>Food Category</th>
                                                <th>Dish-Name</th>
                                                <th>Slogan</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Today's Menu</th>
                                               <th>Action</th>
												  
                                            </tr>
                                        </thead>
                                        <tbody>							                                         
                                            <?php
												$sql="SELECT * FROM dishes order by d_id desc";
												$query=mysqli_query($db,$sql);
												    
													if(!mysqli_num_rows($query) > 0 )
													{
															echo '<td colspan="11"><center>No Dish-Data!</center></td>';
													}
													else
													{	$i=1;			
														while($rows=mysqli_fetch_array($query))
														{
															$mql="select * from res_category where c_id='".$rows['c_id']."'";
															$newquery=mysqli_query($db,$mql);
															$fetch=mysqli_fetch_array($newquery);																			
                                                            echo '<tr>
                                                                      <td>'.$i.'</td>
                                                                      <td>'.$fetch['c_name'].'</td>																					
																	  <td>'.$rows['title'].'</td>
																	  <td>'.$rows['slogan'].'</td>
																	  <td>₹'.$rows['price'].'</td>
																																															
																	  <td><div class="col-md-3 col-lg-8 m-b-10">
                                                                        <center><img src="Category_Image/dishes/'.$rows['img'].'" class="img-responsive  radius" style="max-height:50px;max-width:150px;" /></center></div>
                                                                      </td>';	
                                                                      if($rows['status']==1)
                                                                      {
                                                                        echo ' <td><button type="button" class="btn btn-success" style="font-weight:bold;"><span class="fa fa-unlock"  aria-hidden="true" ></span> <span></span>Active</button></td>';	
                                                                      }	
                                                                      else
                                                                      {
                                                                        echo'<td><button type="button" class="btn btn-danger" style="font-weight:bold;"><span class="fa fa-lock"  aria-hidden="true" ></span> <span></span>InActive</button></td>';
                                                                      }		
                                                                      if($rows['in_today_menu']==1)
                                                                      {
                                                                        echo ' <td><button type="button" class="btn btn-success" style="font-weight:bold;"><span class="fa fa-unlock"  aria-hidden="true" ></span> <span></span>Active</button></td>';	
                                                                      }	
                                                                      else
                                                                      {
                                                                        echo'<td><button type="button" class="btn btn-danger" style="font-weight:bold;"><span class="fa fa-lock"  aria-hidden="true" ></span> <span></span>InActive</button></td>';
                                                                      }																						                                                                                                                                         
                                                                echo ' <td><a href="delete_menu.php?menu_del='.$rows['d_id'].'" onclick="return confirm(\'Are sure to delete !\');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																		   <a href="update_menu.php?menu_upd='.$rows['d_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
                                                                       </td>
                                                                 </tr>';
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
