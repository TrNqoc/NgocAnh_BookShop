<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart | Bookshop Responsive Bootstrap4 Template</title>
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
<style>
	#thanht{color:white}
	#thanht:hover{color:azure}
	</style>
<body>
	<?php session_start();
	
	if (isset($_SESSION['email']) || isset($_SESSION['CTHD']))
	echo "";
else 
	header("location: login.php?yeucau");	

	
	if ( isset($_GET['mahd']) && isset($_SESSION['email']) ) 
	{

		$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
		$sql = "select mahd,email,TongTien,TinhTrang from tblhoadon where email = '".$_SESSION['email']."'
		and mahd ='".$_GET['mahd']."'";
		$result = mysqli_query($conn, $sql);	
		if ( mysqli_num_rows($result) == 0 )
			header('location: hoadon.php');				
	}
	else 
	{
		if (!isset($_SESSION['CTHD']))
			header('location: index.php');
	}
	?>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<?php include "header.php"?>
		<!-- //Header -->
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
                                            <th class="product-thumbnail">Hình Ảnh</th>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số Lượng</th>
                                            <th class="product-subtotal">Thành Tiền</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										if (!isset($_SESSION['CTHD']))
										{
											$mahd = $_GET['mahd'];
											$email = $_SESSION['email'];

											//hoa don
											$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");		
											mysqli_query($conn, "SET NAMES 'utf8'");
											$sqlHoaDon = "select mahd,email,TongTien,TinhTrang from tblhoadon where email = '".$email."'
											and mahd ='".$mahd."'";
											$resultHoaDon = mysqli_query($conn, $sqlHoaDon);
											$rowHoaDon =  mysqli_fetch_array($resultHoaDon);
											$TongTien = $rowHoaDon['TongTien'];
											$TinhTrang = $rowHoaDon['TinhTrang'];

										    // chi tiet hoa don
											$sqlCTHoaDon = "select mahd,idSach,soLuong,giaBan from tblchitiethd where mahd = '".$mahd."'";
											$resultCTHoaDon = mysqli_query($conn, $sqlCTHoaDon);
											

											while ($rowCToaDon = mysqli_fetch_array($resultCTHoaDon) ) 
											{
												$sqlSach = "select tensach,idTheLoai,urlHinh from tblsach where idsach = '".$rowCToaDon['idSach']."'";
												$resultSach = mysqli_query($conn, $sqlSach);
												$rowSach = mysqli_fetch_array($resultSach);

												echo 
												'
												<tr>
													<td class="product-thumbnail"><a href="single-product.php?idsach='.$rowCToaDon['idSach'].'&idtl='.$rowSach['idTheLoai'].'"><img src="images/books/'.$rowSach['urlHinh'].'"></a></td>
													<td class="product-name"><a href="single-product.php?idsach='.$rowCToaDon['idSach'].'&idtl='.$rowSach['idTheLoai'].'">'.$rowSach['tensach'].'</a></td>
													<td class="product-price"><span class="amount">'.$rowCToaDon['giaBan'].'</span></td>
													<td class="product-price"><span class="amount">'.$rowCToaDon['soLuong'].'</span></td></td>
													<td class="product-subtotal">'.$rowCToaDon['soLuong'] * $rowCToaDon['giaBan'].'</td>
													
												';

												if ( $TinhTrang == 'Đang xử lý') 
echo '<td class="product-remove"><a href="GioHang.php?mahd='.$rowCToaDon['mahd'].'
&idsach='.$rowCToaDon['idSach'].'&soluong='.$rowCToaDon['soLuong'].'
&giaban='.$rowCToaDon['giaBan'].'&tongtien='.$rowHoaDon['TongTien'].'
&email='.$_SESSION['email'].'&xoasanpham=true" >X</a></td>
													</tr>';
												else 
													echo'<td class="product-remove"></td>
													</tr>';	
											}
										}
										else 
										{
											// session chi tiet hoa don
											$TinhTrang = "";
											$TongTien = $_SESSION['TongTien'];
											for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
											{
												$sqlSach = "select tensach,idTheLoai,urlHinh,GiaBan from tblsach where idsach = '".$_SESSION['CTHD'][$i][0]."'";
												$resultSach = mysqli_query($conn, $sqlSach);
												$rowSach = mysqli_fetch_array($resultSach);

												echo 
												'
												<tr>
													<td class="product-thumbnail"><a href="single-product.php?idsach='.$_SESSION['CTHD'][$i][0].'&idtl='.$rowSach['idTheLoai'].'"><img src="images/books/'.$rowSach['urlHinh'].'"></a></td>
													<td class="product-name"><a href="single-product.php?idsach='.$_SESSION['CTHD'][$i][0].'&idtl='.$rowSach['idTheLoai'].'">'.$rowSach['tensach'].'</a></td>
													<td class="product-price"><span class="amount">'.$rowSach['GiaBan'].'</span></td>
													<td class="product-price"><span class="amount">'.$_SESSION['CTHD'][$i][1].'</span></td></td>
													<td class="product-subtotal">'.$_SESSION['CTHD'][$i][1] * $rowSach['GiaBan'].'</td>
													
												';

echo '<td class="product-remove"><a href="GioHang_Session.php?xoahoadon_SanPham=true&idsach='.$_SESSION['CTHD'][$i][0].'" >X</a></td>
													</tr>';
											}
										}
										?>
                                        <!-- <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/1.jpg" alt="product img"></a></td>
                                            <td class="product-name"><a href="#">Natoque penatibus</a></td>
                                            <td class="product-price"><span class="amount">$165.00</span></td>
                                            <td class="product-quantity"><input type="number" value="1"></td>
                                            <td class="product-subtotal">$165.00</td>
                                            <td class="product-remove"><a href="#">X</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
				<?php
				if ( isset($_SESSION['CTHD']) )
				{
					echo '
					<div class="row">
						<div class="col-lg-2 offset-lg-10">
							<div class="cartbox__total__area">
								<div class="cart__total__amount">
									<a class="btnthanh" href="login.php?yeucau">Thanh toán</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
				else 
				if ( $TinhTrang == 'Đang xử lý' ) 
				{
					echo '
					<div class="row">
						<div class="col-lg-2 offset-lg-10">
							<div class="cartbox__total__area">
								<div class="cart__total__amount">
									<a href="GioHang.php?mahd='.$_GET['mahd'].'&thanhtoan=true">Thanh toán</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
				?>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cart__total__amount">
                                <span>Tổng Tiền</span>
                                <span><?php echo $TongTien;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
		<!-- cart-main-area end -->
		<?php include "footer.php"?>

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>