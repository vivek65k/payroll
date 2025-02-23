<?php
include '../../db/config.php';
include '../../TableOperations.php';

$tableOperations= new TableOperations($conn,'modules');

$action =$_POST['action'];

switch ($action) {
	case 'add':
	      $conditions=[
           'menu'=>$_POST['menu'],
           'module'=>$_POST['module'],
           'label'=>$_POST['label']
	     ];
	     if($tableOperations->checkDuplicate($conditions,null,'AND')){
	      	echo json_encode(['success'=>false,'message'=>"Module Already Exists"]);
	       	exit;
	     }
	     
		$data=[
		 	 'menu'=>$_POST['menu'],
		 	 'icon'=>$_POST['icon'],
		 	 'sort'=>$_POST['sort'],
		 	 'module'=>$_POST['module'],
		 	 'label'=>$_POST['label'],		 	
		 	 'status'=>$_POST['status'],
		 ];
		 $result= $tableOperations->add($data);
		break;

	case 'update':
	    $id=$_POST['id'];

	      $conditions=[
           'menu'=>$_POST['menu'],
           'module'=>$_POST['module'],
           'label'=>$_POST['label']
	     ];
	     
	     if($tableOperations->checkDuplicate($conditions,$id,'AND')){
	     	echo json_encode(['success'=>false,'message'=>"Module Already Exists"]);
	     	exit;
	     }

		$data=[
		 	 'menu'=>$_POST['menu'],
		 	 'icon'=>$_POST['icon'],
		 	 'sort'=>$_POST['sort'],
		 	 'module'=>$_POST['module'],
		 	 'label'=>$_POST['label'],
		 	 'id'=>$_POST['id'],
		 	 'status'=>$_POST['status'],
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