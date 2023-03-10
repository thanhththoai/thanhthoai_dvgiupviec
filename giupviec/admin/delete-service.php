<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM dichvu WHERE ID='$id'";
if ($con->query($sql) === TRUE) {
    $msg="Xóa thành công";
header('location:manage-services.php');
} else {
echo "Error updating record: ";
}
}
  ?>
  