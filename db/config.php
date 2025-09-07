<?php 
$conn = mysqli_connect("localhost","root","","payroll_ytb");

if(!$conn){
	die('Connection failed'.mysqli_connect_error());
}
?>