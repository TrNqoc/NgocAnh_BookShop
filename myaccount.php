<?php
session_start() ?>
<?php include "header.php";
include "gttop.php"; ?>


<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
				<div class="shop__sidebar">
					<aside class="wedget__categories poroduct--cat">
						<h3 class="wedget__title">Thông tin tài khoản</h3>
						<ul>
							<!-- khung bên trái -->
							<?php
							// Kiểm tra xem biến $_SESSION['email'] đã được định nghĩa chưa
							if (isset($_SESSION['email'])) {
								$conn = mysqli_connect("localhost", "root", "", "bookshop");
								$sql = "SELECT * FROM tblthongtin WHERE email = '" . $_SESSION['email'] . "'";
								mysqli_query($conn, "SET NAMES 'utf8'");
								$result = mysqli_query($conn, $sql);

								// Kiểm tra xem có bản ghi nào được trả về từ truy vấn hay không
								if (mysqli_num_rows($result) > 0) {
									$row = mysqli_fetch_array($result);

									// Kiểm tra xem cột 'email' có tồn tại trong dữ liệu không
									if (isset($row['email'])) {
										echo 'Tên tài khoản: ' . $row['hovaten'] . '<br>';
										echo 'Email: ' . $row['email'];
									} else {
										echo 'Không tìm thấy email trong dữ liệu.';
									}
								} else {
									echo 'Không tìm thấy thông tin tài khoản.';
								}
							} else {
								echo 'Chưa đăng nhập. Vui lòng đăng nhập để xem thông tin tài khoản.';
							}

							?>
						</ul>
					</aside>
				</div>
			</div>
			<div>

			</div>
		</div>
	</div>
	<!-- End main Content -->





	<br><br><br><br><br><br><br><br><br>



	<?php include "footer.php" ?>