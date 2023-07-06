<?php
session_start();
include('../../config.php');
extract($_GET);
mysqli_query($con,"delete from tbl_lichchieu where MaLichChieu='$id'");
$_SESSION['success']="Show Deleted";
header('location:view_shows.php');?>