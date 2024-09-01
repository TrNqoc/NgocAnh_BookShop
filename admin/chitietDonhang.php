<?php
    session_start(); 
    if ($_SESSION['capbac'] != 'admin' && $_SESSION['capbac'] != 'nhanvien') 
        header("location: ./../index.php");
    else {
?>

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

	.footer{
		border-style: solid;
		padding-top: 50px;
	}
	.col-md-2 div{
		margin-top: 20px;

	}
	.col-md-2 div:hover{
		background-color: red;
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
	.w3-container{
		background-color: #006766;
		display:flex;
	}
</style>
<body>
			<div class="w3-sidebar w3-bar-block w3-card " style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <?php 
        if ($_SESSION['capbac'] == 'admin') 
            echo '<a href="main.php?act=onLeft&name=NhanVien"><div class="trai">Nhân Viên</div></a>';
        else {
        ?>
        <a href="main.php?act=onLeft&name=DonHang"><div class="trai" >Đơn Hàng</div></a>
        <a href="main.php?act=onLeft&name=TheLoai"><div class="trai" >Thể Loại</div></a>
        <a href="main.php?act=onLeft&name=ThongKe"><div class="trai" >Thống Kê</div></a>
        <a href="main.php?act=onLeft&name=SanPham&tranghientai=1"><div class="trai" >Sản Phẩm</div></a>
        <a href="main.php?act=onLeft&name=xuLiSanPham"><div class="trai" >Thêm Sản Phẩm</div></a>
        <?php
        }
        ?>
    </div>  
	<div id="main">
        <div class="w3-container">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
            <h1>Trang Quản Lý (Admin)</h1>
        </div>
        <div class="col-md-12 col-sm-12 center">
            <?php 
                include "xuly.php";
            ?>
        </div>  
        <div class="col-md-10 col-sm-10 center">
            <div class="table-responsive">
				<?php
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					$connection = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
					if(isset($_POST['edit_btn'])) {
						
					$query = "SELECT * FROM tblchitiethd WHERE MaHD='$id'";
					$query_run = mysqli_query($connection,$query);
				} else {
					// Hiển thị thông báo nếu không tìm thấy giá trị $id từ URL
					echo "<h3>Không tìm thấy thông tin sản phẩm của hóa đơn. Vui lòng kiểm tra lại URL.</h3>";
				}}
				?>
				<table class="" id="datatable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Mã đơn hàng</th>
							<th>ID Sách</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Thành tiền</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					if(isset($query_run) && mysqli_num_rows($query_run) > 0) {
							 $tonghd=0;
							 echo "<h3>Thông tin sản phẩm của hóa đơn ".$id." </h3>";
							 while($row = mysqli_fetch_assoc($query_run)) {
				 ?>
								 <tr>
									 <td><?php echo $row['MaHD']; ?></td>
									 <td><?php echo $row['idSach']; ?></td>
									 <td><?php echo $row['SoLuong']; ?></td>
									 <td><?php echo $row['GiaBan']; ?></td>
				 <?php 
									 $thanhtien=$row['SoLuong']*$row['GiaBan'];
									 $tonghd=$tonghd+$thanhtien;
				 ?>
									 <td><?php echo $thanhtien;?> </td>
								 </tr>
				 <?php
							 }
							// Hiển thị tổng hóa đơn
    echo '<tr><td colspan="4"></td><td>'.$tonghd.'</td></tr>';
} 
?> 
				 
						
					</tbody>
				</table>
				</div> 
			</div>	
		</div>
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