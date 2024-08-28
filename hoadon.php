<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Giỏ hàng</title>
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<?php session_start(); 

		if (isset($_SESSION['email']) || isset($_SESSION['CTHD']))
			echo "";
		else 
			header("location: login.php?yeucau");	

	?>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">	
		<!-- Header -->
		<?php include "header.php"?>
		<!-- //Header -->
        <!-- Start Bradcaump area -->
        <br><br><br>
		<!-- End Bradcaump area -->

        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-name">Mã Hóa Đơn</th>
                                            <th class="product-subtotal">Tổng Tiền</th>
                                            <th class="product-quantity">Tình Trạng</th>
                                            <th class="product-remove">Remove</th>
                                            <th class="product-name">Chi Tiết Hóa Đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if (isset($_SESSION['email']))
											{
											$email = $_SESSION['email'];
											$conn = mysqli_connect("localhost","root","","bookshop");
											$sqlHoaDon = "select maHD,email,TongTien,TinhTrang from tblhoadon where email = '".$email."'";
											$resultHoaDon = mysqli_query($conn, $sqlHoaDon);

											while ( $rowHoaDon = mysqli_fetch_array($resultHoaDon) ) 
											{
												echo 
												'
												<tr>
													<td class="product-name"><a href="chitiethd.php?mahd='.$rowHoaDon['maHD'].'">'.$rowHoaDon['maHD'].'</a></td>
													<td class="product-subtotal">'.$rowHoaDon['TongTien'].'</td>
													<td class="product-quantity"><p>'.$rowHoaDon['TinhTrang'].'</p></td>
												';

												if ( $rowHoaDon['TinhTrang'] == 'Đang xử lý' ) 
													echo 
													'
													<td class="product-remove"><a href="GioHang.php?xoahoadon=true&mahd='.$rowHoaDon['maHD'].'">X</a></td>
													';
												else 
													echo 
													'
													<td class="product-remove"></td>
													';
												echo 
												'
												<td class="product-name"><a href="chitiethd.php?mahd='.$rowHoaDon['maHD'].'">Hóa Đơn '.$rowHoaDon['maHD'].'</a></td>
												</tr>
												
												';	
											}
										}
										else 
										{
										echo 
										'
											<tr>
											<td class="product-name"><a href="chitiethd.php?mahd=HD1">HD1</a></td>
											<td class="product-subtotal">'.$_SESSION['TongTien'].'</td>
											<td class="product-quantity"><p>Chưa hoàn thành</p></td>
										';
										echo 
											'
											<td class="product-remove"><a href="GioHang_Session.php?xoahoadon=true">X</a></td>
											<td class="product-name"><a href="chitiethd.php?mahd=HD1">Hóa Đơn HD1</a></td>
											</tr>
											';			
										}
										?>
                                        <!-- <tr>
                                            <td class="product-name"><a href="#">Natoque penatibus</a></td>
                                            <td class="product-subtotal">$165.00</td>
                                            <td class="product-quantity"><p>1</p></td>
                                            <td class="product-remove"><a href="#">X</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>  
        </div>
		<!-- cart-main-area end -->

		<!-- Footer Area -->
		<?php include "footer.php"?>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	
	
</body>
</html>
