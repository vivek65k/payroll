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
                                <label>Employee ID</label>
                                <input type="text" name="emp_id" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Basic Salary</label>
                                <input type="text" name="basic_salary" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>HRA</label>
                                <input type="text" name="hra" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>TA</label>
                                <input type="text" name="ta" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>MA</label>
                                <input type="text" name="ma" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Bonus</label>
                                <input type="text" name="bonus" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>PF Employee</label>
                                <input type="text" name="pf_employee" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>PF Employer</label>
                                <input type="text" name="pf_employer" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>ESI Employee</label>
                                <input type="text" name="esi_employee" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>ESI Employer</label>
                                <input type="text" name="esi_employer" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>TDS</label>
                                <input type="text" name="tds" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Gross Salary</label>
                                <input type="text" name="gross_salary" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Deduction</label>
                                <input type="text" name="duduction" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Net Salary</label>
                                <input type="text" name="net_salary" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Bank Account Number</label>
                                <input type="text" name="bank_account_number" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>IFSC Code</label>
                                <input type="text" name="ifsc_code" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>PAN Number</label>
                                <input type="text" name="pan_number" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Approved By</label>
                                <input type="text" name="approved_by" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Created By</label>
                                <input type="text" name="created_by" class="form-control">
                              </div>

                              <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                              </button>
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
               <div style="width:99%; overflow: auto;">
                 
       <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Basic Pay</th>
                <th>House Rent</th>
                <th>Dearness</th>
                <th>Travel</th>
                <th>Medical</th>
                <th>Bonus/ Incentive</th>
                <th>Employee PF</th>
                <th>Employer PF</th>
                <th>Employee ESI</th>
                <th>Employer ESI</th>
                <th>Tex Deducted</th>
                <th>Gross Salary</th>
                <th>Total Dedcution</th>
                <th>Net Salary</th>
                <th>Bank Name</th>
                <th>Bank Account Number </th>
                <th>IFSC Code</th>
                <th>Pan Number</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql= "SELECT * FROM `salary`";
              $run= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($run)) {                 
            
            ?>
            <tr>
                <td><?php echo $row['emp_id']; ?></td>
                <td><?php echo $row['basic_salary']; ?></td>
                <td><?php echo $row['hra']; ?></td>
                <td><?php echo $row['da']; ?></td>
                <td><?php echo $row['ta']; ?></td>
                <td><?php echo $row['ma']; ?></td>
                <td><?php echo $row['bonus']; ?></td>
                <td><?php echo $row['pf_employee']; ?></td>
                <td><?php echo $row['pf_employer']; ?></td>
                <td><?php echo $row['esi_employee']; ?></td>
                <td><?php echo $row['esi_employer']; ?></td>
                <td><?php echo $row['tds']; ?></td>
                <td><?php echo $row['gross_salary']; ?></td>
                <td><?php echo $row['duduction']; ?></td>
                <td><?php echo $row['net_salary']; ?></td>
                <td><?php echo $row['bank_name']; ?></td>
                <td><?php echo $row['bank_account_number']; ?></td>
                <td><?php echo $row['ifsc_code']; ?></td>
                <td><?php echo $row['pan_number']; ?></td>
                <td><?php echo $row['approved_by']; ?></td>

                
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
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
       <div class="modal-body">
  <form id="editForm<?php echo $row['id']; ?>" method="post">  
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <div class="form-group">
      <label>Employee ID</label>
      <input type="text" name="emp_id" value="<?php echo $row['emp_id']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Basic Salary</label>
      <input type="text" name="basic_salary" value="<?php echo $row['basic_salary']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>HRA</label>
      <input type="text" name="hra" value="<?php echo $row['hra']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>TA</label>
      <input type="text" name="ta" value="<?php echo $row['ta']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>MA</label>
      <input type="text" name="ma" value="<?php echo $row['ma']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Bonus</label>
      <input type="text" name="bonus" value="<?php echo $row['bonus']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>PF Employee</label>
      <input type="text" name="pf_employee" value="<?php echo $row['pf_employee']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>PF Employer</label>
      <input type="text" name="pf_employer" value="<?php echo $row['pf_employer']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>ESI Employee</label>
      <input type="text" name="esi_employee" value="<?php echo $row['esi_employee']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>ESI Employer</label>
      <input type="text" name="esi_employer" value="<?php echo $row['esi_employer']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>TDS</label>
      <input type="text" name="tds" value="<?php echo $row['tds']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Gross Salary</label>
      <input type="text" name="gross_salary" value="<?php echo $row['gross_salary']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Deduction</label>
      <input type="text" name="duduction" value="<?php echo $row['duduction']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Net Salary</label>
      <input type="text" name="net_salary" value="<?php echo $row['net_salary']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Bank Name</label>
      <input type="text" name="bank_name" value="<?php echo $row['bank_name']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Bank Account Number</label>
      <input type="text" name="bank_account_number" value="<?php echo $row['bank_account_number']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>IFSC Code</label>
      <input type="text" name="ifsc_code" value="<?php echo $row['ifsc_code']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>PAN Number</label>
      <input type="text" name="pan_number" value="<?php echo $row['pan_number']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Approved By</label>
      <input type="text" name="approved_by" value="<?php echo $row['approved_by']; ?>" class="form-control">
    </div>

    <div class="form-group">
      <label>Created By</label>
      <input type="text" name="created_by" value="<?php echo $row['created_by']; ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="fa fa-floppy-o" aria-hidden="true"></i> Update
    </button>
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
                <th>Basic Pay</th>
                <th>House Rent</th>
                <th>Dearness</th>
                <th>Travel</th>
                <th>Medical</th>
                <th>Bonus/ Incentive</th>
                <th>Employee PF</th>
                <th>Employer PF</th>
                <th>Employee ESI</th>
                <th>Employer ESI</th>
                <th>Tex Deducted</th>
                <th>Gross Salary</th>
                <th>Total Dedcution</th>
                <th>Net Salary</th>
                <th>Bank Name</th>
                <th>Bank Account Number </th>
                <th>IFSC Code</th>
                <th>Pan Number</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
               </div>
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
