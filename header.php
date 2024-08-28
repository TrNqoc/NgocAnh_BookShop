<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Trang Chủ | Cửa hàng sách</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->

	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bootstrap/css/fontawesome.css" />
	<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css" />
	<link rel="stylesheet" href="bootstrap/css/templatemo.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" href="bootstrap/css/custom.css" />
	<link rel="stylesheet" href="../BookShop/style.css">
	<link rel="stylesheet" href="../BookShop/index.css">


	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body class="dark">

	<!-- Header -->
	<div class="header-section">
		<div id="menu">
			<nav id="menu_bar">
				<ul class="meninmenu justify-content-start">
					<a href="index.php">
						<img width="60" height="60" src="images/logo/logo2.png" alt="logo images">
					</a>

					<li class="drop with--one--item"><a href="index.php">Trang Chủ</a></li>
					<li class="drop"><a href="./shop-grid.php?tranghientai=1">Sách</a>
						<div class="megamenu mega02">
							<ul class="item item01">
								<li class="title">Thể Loại</li>
								<?php
								$conn = mysqli_connect("localhost", "root", "", "bookshop");
								$sql = "select idtheloai,tentheloai from tbltheloai where HienThi = 0";
								mysqli_query($conn, "SET NAMES 'utf8'");
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) {
									// đếm số lượng sách
									$sql2 = "select idtheloai from tblsach where idtheloai = '" . $row['idtheloai'] . "' and HienThi = 0";
									mysqli_query($conn, "SET NAMES 'utf8'");
									$result2 = mysqli_query($conn, $sql2);
									echo
									'
													<li><a href="shop-grid.php?idtl=' . $row['idtheloai'] . '&tranghientai=1">' . $row['tentheloai'] . '<span> (' . mysqli_num_rows($result2) . ')</span>
													</a></li>
												';
								}
								?>
							</ul>
						</div><!--Đóng megamenu mega02-->
					</li>
					<li><a href="ebook.php">Ebook</a>
					<li><a href="./tangsach.php">Tặng sách</a>
					<li><a href="./trangblog.php">Blog</a>
					<li><a href="contact.php">Liên Hệ</a></li>
					<li>
						<form action="search.php" method="GET" class="tim">
							<input style="padding: 8.5px; width:90px;" type="text" name="keyword" placeholder="Search...">
							<button type="submit" style="padding: 8px;"><img src="images/icons/search.png"></button>
						</form>
					</li>
					<li class="shopcart"><a href="hoadon.php"><img src="images/icons/cart.png"></a>
					<li class="setting__bar__icon"><a class="setting__active" href="#"><img src="images/icons/icon_setting.png"></a>
						<div class="searchbar__content setting__block">
							<div class="content-inner">
								<div class="switcher-currency">
									<strong class="label switcher-label">
										<?php
										if (isset($_SESSION['email'])) {
											$conn = mysqli_connect("localhost", "root", "", "bookshop");
											$sql = "select hovaten from tblthongtin where email = '" . $_SESSION['email'] . "'";
											mysqli_query($conn, "SET NAMES 'utf8'");
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											echo $row['hovaten'];
										} else {
											echo 'Vui lòng đăng nhập';
										}
										?>
									</strong>
								</div><!--Đóng switcher-currency-->
								<div class="switcher-options">
									<div class="switcher-currency-trigger">
										<div class="setting__menu">
											<span><a href="myaccount.php">Thông Tin Tài Khoản</a></span>
											<?php
											// function runMyFunction()
											// {
											// 	session_unset();
											// }
											if (isset($_SESSION['email'])) {
												echo '<span><a href="index.php?signout=true" >Đăng Xuất</a></span>';
											} else {
												echo '
															<span><a href="login.php">Đăng Nhập</a></span>
															<span><a href="register.php">Tạo Tài Khoản</a></span>		
															';
											}
											if (isset($_GET['signout'])) {

												session_unset();
											}
											if (!isset($_SESSION)) {
												header('location: index.php');
											}
											?>
										</div><!--Đóng setting__menu-->
									</div><!--Đóng switcher-currency-trigger-->
								</div><!--Đóng switcher-options-->
							</div><!--Đóng content-inner-->
						</div><!--Đóng searchbar__content setting__block-->
					</li>
				</ul>
			</nav>
		</div>
	</div>