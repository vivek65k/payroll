<?php
include '../../db/config.php';
include '../../TableOperations.php';

$tableOperations= new TableOperations($conn,'salary');

$action =$_POST['action'];

switch ($action) {
	case 'add':
	     $conditions=[
           'emp_id'=>$_POST['emp_id']   
	     ];
	     if($tableOperations->checkDuplicate($conditions,null,'OR')){
	      	echo json_encode(['success'=>false,'message'=>"Employee Already Exists"]);
	       	exit;
	     }
	     
		 $data = [
		        'emp_id'             => $_POST['emp_id'],
		        'basic_salary'       => $_POST['basic_salary'],
		        'hra'                => $_POST['hra'],
		        'ta'                 => $_POST['ta'],
		        'ma'                 => $_POST['ma'],
		        'bonus'              => $_POST['bonus'],
		        'pf_employee'        => $_POST['pf_employee'],
		        'pf_employer'        => $_POST['pf_employer'],
		        'esi_employee'       => $_POST['esi_employee'],
		        'esi_employer'       => $_POST['esi_employer'],
		        'tds'                => $_POST['tds'],
		        'gross_salary'       => $_POST['gross_salary'],
		        'duduction'          => $_POST['duduction'],   // spelling is same as in DB
		        'net_salary'         => $_POST['net_salary'],
		        'bank_name'          => $_POST['bank_name'],
		        'bank_account_number'=> $_POST['bank_account_number'],
		        'ifsc_code'          => $_POST['ifsc_code'],
		        'pan_number'         => $_POST['pan_number'],
		        'approved_by'        => $_POST['approved_by'],
		        'created_by'         => $_POST['created_by'],
		    ];
		 $result= $tableOperations->add($data);
		break;

	case 'update':
	    $id=$_POST['id'];

	      $conditions=[
           'emp_id'=>$_POST['emp_id']
	     ];
	     
	     if($tableOperations->checkDuplicate($conditions,$id,'OR')){

	     	echo json_encode(['success'=>false,'message'=>"Employee Already Exists"]);
	     	exit;
	     }

		 $data = [
				        'emp_id'             => $_POST['emp_id'],
				        'basic_salary'       => $_POST['basic_salary'],
				        'hra'                => $_POST['hra'],
				        'ta'                 => $_POST['ta'],
				        'ma'                 => $_POST['ma'],
				        'bonus'              => $_POST['bonus'],
				        'pf_employee'        => $_POST['pf_employee'],
				        'pf_employer'        => $_POST['pf_employer'],
				        'esi_employee'       => $_POST['esi_employee'],
				        'esi_employer'       => $_POST['esi_employer'],
				        'tds'                => $_POST['tds'],
				        'gross_salary'       => $_POST['gross_salary'],
				        'duduction'          => $_POST['duduction'],   // spelling is same as in DB
				        'net_salary'         => $_POST['net_salary'],
				        'bank_name'          => $_POST['bank_name'],
				        'bank_account_number'=> $_POST['bank_account_number'],
				        'ifsc_code'          => $_POST['ifsc_code'],
				        'pan_number'         => $_POST['pan_number'],
				        'approved_by'        => $_POST['approved_by'],
				        'created_by'         => $_POST['created_by'],
				    ];
		 $result= $tableOperations->update($id,$data);
		break;

	
	case 'delete':
		$id=$_POST['id'];
		$result= $tableOperations->delete($id);
		break;

	case 'get':
	   $id = $_POST['id'] ?? null;
		$result = $tableOperations->get($id);
		echo json_encode($result->fetch_all(MYSQLI_ASSOC));
		exit;
		break;

	default:
		$result= false;
		break;



}
   echo json_encode(['success' => $result]);	
?>