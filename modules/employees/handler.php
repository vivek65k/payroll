<?php
include '../../db/config.php';
include '../../TableOperations.php';

$tableOperations= new TableOperations($conn,'employees');

$action =$_POST['action'];

switch ($action) {
	case 'add':
	     $conditions=[
           'empid'=>$_POST['empid']   
	     ];
	     if($tableOperations->checkDuplicate($conditions,null,'OR')){
	      	echo json_encode(['success'=>false,'message'=>"Employee Already Exists"]);
	       	exit;
	     }
	     
		 $data=[
		 	 'name'=>$_POST['name'],
		 	 'empid'=>$_POST['empid'],
		 	 'gender'=>$_POST['gender'],
		 	 'matrial_status'=>$_POST['matrial_status'],
		 	 'nationality'=>$_POST['nationality'],
		 ];
		 $result= $tableOperations->add($data);
		break;

	case 'update':
	    $id=$_POST['id'];

	      $conditions=[
           'empid'=>$_POST['empid']
	     ];
	     
	     if($tableOperations->checkDuplicate($conditions,$id,'OR')){

	     	echo json_encode(['success'=>false,'message'=>"Employee Already Exists"]);
	     	exit;
	     }

		$data=[
		 	 'name'=>$_POST['name'],
		 	 'empid'=>$_POST['empid'],
			 'gender'=>$_POST['gender'],
		 	 'matrial_status'=>$_POST['matrial_status'],
		 	 'nationality'=>$_POST['nationality'],
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