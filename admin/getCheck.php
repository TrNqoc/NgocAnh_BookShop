<?php
session_start();
$mysqli = new mysqli("sql207.infinityfree.com", "if0_37194966", "ngocanh09876", "if0_37194966_bookshop");
if($mysqli->connect_error) {
  exit('Không thể kết nối với database!');
}

$sql = 'UPDATE tblhoadon SET TinhTrang="Đã hoàn thành" , Email_NhanVien="'.$_SESSION['email'].'" WHERE MaHD= ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['q']);
$stmt->execute();

$stmt->close();

$mysqli->close();

?>