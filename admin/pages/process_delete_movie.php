<?php
session_start();
include('../../config.php');

$mid=$_GET['mid'];

$us=mysqli_query($con,"select * from tbl_lichchieu where MaPhim='$mid'");
while($user=mysqli_fetch_array($us))
{
    if($user['MaLichChieu']!="")
    {
    $us2=mysqli_query($con,"select * from tbl_datve where MaLichChieu='".$user['MaLichChieu']."'");
    while($user2=mysqli_fetch_array($us2))
    {
        if($user2['MaDatVe']!="")
        {
            $result1=mysqli_query($con,"delete from tbl_datve where MaDatVe='".$user2['MaDatVe']."'");
        }
        else
        {
            break;
        }
    }
    $result1=mysqli_query($con,"delete from tbl_lichchieu where MaLichChieu='".$user['MaLichChieu']."'");
    }else
    {
        break;
    }
}
mysqli_query($con,"delete from tbl_phim where MaPhim='$mid'");
 $_SESSION['success']="Xóa phim thành công";
header("location:index.php");
?>