<?php
$app_path= $_SERVER['DOCUMENT_ROOT'].'/payroll/';

include($app_path.'includes/top_header.php');
include($app_path.'includes/header.php');
include($app_path.'includes/sidebar.php');

?>

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <?php include($app_path.'includes/nav_bar.php');?>


            <div class="container-fluid mt-3">
                
              <div class="card p-3">    

              <div class="row">
                <div>
                     <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Add</button>

                     <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <form id="addForm" method="post">                                 
                                    <div class="form-group">
                                      <label> Employee ID</label>
                                      <input type="text" name="empid" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label> Name</label>
                                      <input type="text" name="name" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Gender</label>
                                      <select class="form-control" name="gender">
                                          <option value="female">Female</option>
                                          <option value="male">Male</option>
                                          <option value="other">Other</option>
                                      </select>                                 
                                    </div>   
                                     <div class="form-group">
                                      <label>	Matrial Status</label>
                                      <select class="form-control" name="matrial_status">
                                          <option value="single">Single</option>
                                          <option value="married">Married</option>
                                      </select>                                 
                                    </div>  


                                    <div class="form-group">
                                      <label>	Nationality</label>
                                      <select class="form-control" name="nationality">
                                          <option value="india">India</option>
                                      </select>                                 
                                    </div>  

                   
                               <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>

                             </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>
     
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                  
              </div>         

       <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Matrial Status</th>
                <th>Nationality</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql= "SELECT * FROM `employees`";
              $run= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($run)) {                 
            
            ?>
            <tr>
                <td><?php echo $row['empid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['matrial_status']; ?></td>
                <td><?php echo $row['nationality']; ?></td>
                
                <td>
                
                    <button type="button" class="btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" ></i> Edit</button>
                    <button class="btn btn-danger deletebutton" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </td>
            </tr>
                <!-- Password Modal -->

                     <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['name']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <form id="editForm<?php echo $row['id']; ?>" method="post">  
                             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">     
                                    <div class="form-group">
                                      <label>Employee ID</label>
                                      <input type="text" name="empid" value="<?php echo $row['empid']; ?>" class="form-control" readonly>                                       
                                    </div>                              
                                    <div class="form-group">
                                      <label> Name</label>
                                      <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">                                        
                                    </div>
 

                                      <div class="form-group">
                                      <label>Gender</label>
                                      <select class="form-control" name="gender">
                                          <option value="female" <?php echo $row['gender']=='female'?'selected':'' ?> >Female</option>
                                          <option value="male"  <?php echo $row['gender']=='male'?'selected':'' ?>>Male</option>
                                          <option value="other"  <?php echo $row['gender']=='other'?'selected':'' ?>>Other</option>
                                      </select>                                 
                                    </div>   
                                     <div class="form-group">
                                      <label>	Matrial Status</label>
                                      <select class="form-control" name="matrial_status">
                                          <option value="single" <?php echo $row['matrial_status']=='single'?'selected':'' ?>>Single</option>
                                          <option value="married" <?php echo $row['matrial_status']=='married'?'selected':'' ?>>Married</option>
                                      </select>                                 
                                    </div>  


                                    <div class="form-group">
                                      <label>	Nationality</label>
                                      <select class="form-control" name="nationality">
                                          <option value="india"  <?php echo $row['nationality']=='india'?'selected':'' ?> >India</option>
                                      </select>                                 
                                    </div>                    
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                             </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning"  ><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>

                          </div>
                        </div>
                      </div>
                    </div>
        <?php } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Matrial Status</th>
                <th>Nationality</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
              </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script type="text/javascript" src="scripts.js"></script>
<?php
include($app_path.'includes/footer.php');


?>
