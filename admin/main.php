<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/javascript" href="app.js">
	
</head>
<style>
	.col-md-2 div{
		margin-top: 20px;
	}
	.col-md-2 div:hover{
		background-color: #006766;
	}
	.textfield {
		width: 100px;
	}
	a {
		color: white;
		font-size: 20px;
		
	}
	a:hover {
		text-decoration: none;
		color: black;
	}
	.trai {
		margin-top:10px; 
		margin-bottom:10px; 
		text-align:center;
		background-color: #006766;
	}
	#main{
		width: 100%;
	}
	.w3-container{
		background-color: #006766;
		display:flex;
	}
	#openNav{
		color: #006766;
	}
	
</style>
<body>
	<?php
		session_start(); 
		if ($_SESSION['capbac'] != 'admin' && $_SESSION['capbac'] != 'nhanvien') 
			header("location: ./../index.php");
		else {
	?>
		<div class="w3-sidebar w3-bar-block w3-card " style="display:none; background-color:#f3f3f3" id="mySidebar">
			<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
			<?php 
			if ($_SESSION['capbac'] == 'admin') 
			echo 
				'
				<a href="main.php?act=onLeft&name=NhanVien"><div class="trai">Nhân Viên</div></a>
				';
				else
				{
				?>
					<a href="main.php?act=onLeft&name=DonHang"><div class="trai" >Đơn Hàng</div></a>
					<a href="main.php?act=onLeft&name=TheLoai"><div class="trai" >Thể Loại</div></a>
					<a href="main.php?act=onLeft&name=ThongKe"><div class="trai" >Thống Kê</div></a>
					<a href="main.php?act=onLeft&name=SanPham&tranghientai=1"><div class="trai" >Sản Phẩm</div></a>
					<a href="main.php?act=onLeft&name=xuLiSanPham"><div class="trai" >Thêm Sản Phẩm</div></a>
					<?php
					}
					?>
					<a href="./../index.php?signout=true"><div class="trai" >Đăng xuất</div></a>
		</div>
		<div id="main">
			<div class="w3-container">
				<button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
				<h1 style="color: #fff;">Trang Quản Lý (Admin)</h1>
			</div>
			<div class="col-md-12 col-sm-12 center">
				<?php 
			include "xuly.php";
				?>
			</div>	
			</div>
		<script>
			function w3_open() {
				document.getElementById("main").style.marginLeft = "15%";
				document.getElementById("mySidebar").style.width = "15%";
				document.getElementById("mySidebar").style.display = "block";
				document.getElementById("openNav").style.display = 'none';
			}
			function w3_close() {
				document.getElementById("main").style.marginLeft = "0%";
				document.getElementById("mySidebar").style.display = "none";
				document.getElementById("openNav").style.display = "inline-block";
			}
		</script>
<?php } ?>	
</body>

</html>