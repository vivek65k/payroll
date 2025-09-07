<?php
include '../../../db/config.php';
include '../../../TableOperations.php';

$tableOperations= new TableOperations($conn,'roles');

$action =$_POST['action'];

switch ($action) {
	case 'add':
	     $conditions=[
           'role'=>$_POST['role']          
	     ];
	     if($tableOperations->checkDuplicate($conditions,null,'OR')){
	      	echo json_encode(['success'=>false,'message'=>"Role Already Exists"]);
	       	exit;
	     }
	     
		 $data=[
		 	 'role'=>$_POST['role'],
		 	 'module_id'=>json_encode($_POST['modules'])
		 	 
		 ];
		 $result= $tableOperations->add($data);
		break;

	case 'update':
	    $id=$_POST['id'];

	      $conditions=[
           'role'=>$_POST['role']
	     ];
	     
	     if($tableOperations->checkDuplicate($conditions,$id,'OR')){

	     	echo json_encode(['success'=>false,'message'=>"User Already Exists"]);
	     	exit;
	     }
           if(isset($_POST['modules'])){
           			$data=[
						 	 'role'=>$_POST['role'],
						 	  'module_id'=>$_POST['modules']?json_encode($_POST['modules']):null
						 ];
						}else{
						  $data=[
						 	 'role'=>$_POST['role']

						 ];
						}

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