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
                                      <label> Menu Name</label>
                                      <input type="text" name="menu" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Module</label>
                                      <input type="text" name="module" class="form-control">                                       
                                    </div>   

                                    <div class="form-group">
                                      <label>Label</label>
                                      <input type="text" name="label" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Icon</label>
                                      <input type="text" name="icon" class="form-control">                                        
                                    </div>
                                      <div class="form-group">
                                      <label>Sor</label>
                                      <input type="text" name="sort" class="form-control">                                        
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
                <th>Id</th>
                <th>Menu</th>
                <th>Modules Name</th>
                <th>Label</th>
                <th>Icon</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql= "select * from modules";
              $run= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($run)) {                 
            
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['menu']; ?></td>
                <td><?php echo $row['module']; ?></td>
                <td><?php echo $row['label']; ?></td>
                <td><?php echo $row['icon']; ?></td>
                <td><?php echo $row['sort']; ?></td>
                <td><?php echo $row['status']; ?></td>
              
                <td>
                    <button type="button" class="btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" ></i> Edit</button>
                    
                    <button class="btn btn-danger deletebutton" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </td>
            </tr>

                 <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['module']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <form id="editForm<?php echo $row['id']; ?>" method="post">  
                             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                                 
                                    <div class="form-group">
                                      <label> Menu Name</label>
                                      <input type="text" name="menu" value="<?php echo $row['menu']; ?>" class="form-control">                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Module</label>
                                      <input type="text" name="module" value="<?php echo $row['module']; ?>" class="form-control">                                       
                                    </div>   

                                    <div class="form-group">
                                      <label>Label</label>
                                      <input type="text" name="label" value="<?php echo $row['label']; ?>" class="form-control">                                        
                                    </div> 
                                    <div class="form-group">
                                      <label>Icon</label>
                                      <input type="text" name="icon" value="<?php echo $row['icon']; ?>" class="form-control">                                        
                                    </div>  

                                    <div class="form-group">
                                      <label>Sort</label>
                                      <input type="text" name="sort" value="<?php echo $row['sort']; ?>" class="form-control">                                        
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
                <th>Id</th>
                <th>Menu</th>
                <th>Modules Name</th>
                <th>Label</th>
                <th>Icon</th>
                <th>Sort Order</th>
                <th>Status</th>
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
