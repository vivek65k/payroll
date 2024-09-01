<?php
session_start();

if(!isset($_SESSION['username'])){
       header('location:./index.php');
       exit(0);
}

$base_url= "http://" . $_SERVER['SERVER_NAME'] .'/payroll/';
$app_path= $_SERVER['DOCUMENT_ROOT'].'/payroll/';
include($app_path.'db/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Payroll</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="<?php echo $base_url;?>plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo $base_url;?>plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="<?php echo $base_url;?>css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>

</head>

<body>