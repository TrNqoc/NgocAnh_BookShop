<?php 
			if (isset($_GET['act']) && isset($_GET['name'])) {
				if ($_GET['act'] == 'onLeft') {
					if ($_GET['name'] == 'ThongKe') {
						include 'ThongKe.php';
					} elseif ($_GET['name'] == 'DonHang') {
						include 'DonHang.php';
					} elseif ($_GET['name'] == 'NhanVien') {
						include 'NhanVien.php';
					} elseif ($_GET['name'] == 'TheLoai') {
						include 'TheLoai.php';
					} elseif ($_GET['name'] == 'SanPham') {
						include 'xuLiSanPham.php';
					} elseif ($_GET['name'] == 'xuLiSanPham') {
						include 'SanPham.php';
					}
				}
			} 	
			if (isset($_GET['editSanPham'])) {
				include 'editSanPham.php';
			}
			
				?>