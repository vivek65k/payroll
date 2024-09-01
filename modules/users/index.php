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
                                      <label> Name</label>
                                      <input type="text" name="name" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" name="username" class="form-control">                                       
                                    </div>   

                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" class="form-control">                                        
                                    </div>

                                    <div class="form-group">
                                      <label>Role</label>
                                      <select class="form-control" name="role" >
                                          <option selected disabled >Select Role</option>
                                          <option value="Admin">Admin</option>
                                          <option value="Manager">Manager</option>
                                          <option value="User">User</option>
                                      </select>                                     
                                    </div>
                                    <div class="form-group">
                                      <label> Status</label>
                                        <select class="form-control"  name="status">
                                        <option selected disabled >Select Status</option>
                                          <option value="Active">Active</option>
                                          <option value="Inactive">Inactive</option>
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
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql= "select * from admin";
              $run= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($run)) {                 
            
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                  <button class="btn btn-warning passwordchange" aria-hidden="true" data-toggle="modal" data-target="#passwordModal<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</button>

                    <button type="button" class="btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" ></i> Edit</button>
                    <button class="btn btn-danger deletebutton" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </td>
            </tr>
                  <!-- //password Model -->

                    <div class="modal fade" id="passwordModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['name']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <form id="passwordForm<?php echo $row['id']; ?>" method="post">  
                             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                                 
                                    <div class="form-group">
                                      <label> Password</label>
                                      <input type="password" name="password" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Confirm Password</label>
                                      <input type="password" name="cpassword"class="form-control">                                       
                                    </div>   

                     
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Change Password</button>
                             </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning"  ><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>

                          </div>
                        </div>
                      </div>
                    </div>
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
                                      <label> Name</label>
                                      <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control">                                       
                                    </div>   

                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">                                        
                                    </div>

                                    <div class="form-group">
                                      <label>Role</label>
                                      <select class="form-control" name="role" >                                         
                                          <option <?php echo $row['role']=='Admin'?'selected':''; ?> value="Admin">Admin</option>
                                          <option <?php echo $row['role']=='Manager'?'selected':''; ?> value="Manager">Manager</option>
                                          <option <?php echo $row['role']=='User'?'selected':''; ?> value="User">User</option>
                                      </select>                                     
                                    </div>
                                    <div class="form-group">
                                      <label> Status</label>
                                        <select class="form-control"  name="status">                                        
                                          <option <?php echo $row['status']=='Active'?'selected':''; ?> value="Active">Active</option>
                                          <option<?php echo $row['status']=='Inactive'?'selected':''; ?>  value="Inactive">Inactive</option>
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
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created On</th>
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
