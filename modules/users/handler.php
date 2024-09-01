<?php
include '../../db/config.php';
include '../../TableOperations.php';

$tableOperations= new TableOperations($conn,'admin');

$action =$_POST['action'];

switch ($action) {
	case 'add':
		 $data=[
		 	 'name'=>$_POST['name'],
		 	 'username'=>$_POST['username'],
		 	 'email'=>$_POST['email'],
		 	 'role'=>$_POST['role'],
		 	 'status'=>$_POST['status'],
		 ];
		 $result= $tableOperations->add($data);
		break;

	case 'update':
	    $id=$_POST['id'];
		$data=[
		 	 'name'=>$_POST['name'],
		 	 'username'=>$_POST['username'],
		 	 'email'=>$_POST['email'],
		 	 'role'=>$_POST['role'],
		 	 'status'=>$_POST['status'],
		 ];
		 $result= $tableOperations->update($id,$data);
		break;

	case 'change_password':
	    $id=$_POST['id'];
		$data=[
		 	 'password'=>md5($_POST['password'])	
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