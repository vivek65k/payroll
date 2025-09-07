<?php
session_start();
include('db/config.php');

if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['module'])){
	// $_SESSION['current_module']=$_POST['module'];

   $sql = "select * from  modules where module='".$_POST['module']."'";
   $sql_query=mysqli_query($conn,$sql);
   $modules= mysqli_fetch_array($sql_query);
   $_SESSION['current_module']=$modules;
}


?>