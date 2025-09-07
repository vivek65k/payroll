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
                                      <label> Role Name</label>
                                      <input type="text" name="role" class="form-control">                                        
                                    </div> 

                                    <div class="form-group">
                                      <label>Modules</label>
                                        <select class="js-example-basic-multiple form-control" name="modules[]" multiple="multiple" style="width: 100%;">
                                          <?php 


                                                $sql= "select * from  modules";
                                                $run= mysqli_query($conn,$sql);
                                                while($row=mysqli_fetch_array($run)) {                 
                                                
                                                ?>
                                          <option value="<?php echo $row['id']; ?>"><?php echo $row['label']; ?></option>
                                        
                                        <?php } ?>
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
                <th>ID</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql= "select * from roles";
              $run= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($run)) {                 
            
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['role']; ?></td>
                 
                <td> 
                    <?php

                      if($row['module_id'] != null && !empty($row['module_id'])){
                        $module_ids= json_decode($row['module_id']);

                         if(is_array($module_ids)){
                            $id_lists= implode(",",$module_ids);
                        
                        

                        $budge_sql = mysqli_query($conn,'SELECT label FROM modules where id in ('.$id_lists.')');
                        while ($budge_row= mysqli_fetch_array($budge_sql)) {
                            echo '<span class="badge badge-pill badge-primary">'. $budge_row['label'].'</span>';
                        }
                       }
                      }
                      
                      ?>
                    

                </td>
                <td>
                   
                    <button type="button" class="btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" ></i> Edit</button>
                   <?php if ($row['id'] != 1){?>
                    <button class="btn btn-danger deletebutton" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                     <?php } ?>
                </td>
            </tr>

                     <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['role']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <form id="editForm<?php echo $row['id']; ?>" method="post">  
                             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                                 
                                    <div class="form-group">
                                      <label> Role Name</label>
                                      <input type="text" name="role" value="<?php echo $row['role']; ?>" class="form-control">                                        
                                    </div>
                                   <div class="form-group">
                                     <label> Modules</label>
                                        <select class="js-example-basic-multiple form-control" name="modules[]" multiple="multiple" style="width: 100%;">
                                          <?php 
                                                $selected_modules=[];
                                               if($row['module_id'] != null || !empty($row['module_id'])){
                                                  $decode= json_decode($row['module_id']);
                                               
                                                  if(is_array($decode)){
                                                    $selected_modules=$decode;
                                                  }
                                                }

                                                $moduleSql= "select * from  modules";
                                                $moduleRun= mysqli_query($conn,$moduleSql);
                                                while($moduleRow=mysqli_fetch_array($moduleRun)) {   

                                                 $selected="";

                                                  if($moduleRow['id'] != null || !empty($moduleRow['id'])){
                                                     $selected = in_array($moduleRow['id'], $selected_modules)?"selected":'';
                                                   }
         
                                                
                                                ?>
                                          <option value="<?php echo $moduleRow['id']; ?>" <?php echo $selected; ?>><?php echo $moduleRow['label']; ?></option>
                                        
                                        <?php } ?>
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
               <th>ID</th>
                <th>Role</th>
                <th>Permission</th>
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
        <script type="text/javascript" src="role/scripts.js"></script>
        <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
        </script>
<?php
include($app_path.'includes/footer.php');


?>
