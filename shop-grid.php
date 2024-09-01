<?php
session_start() ?>
<?php include "header.php";
include "gttop.php" ?>
		
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Danh mục sách</h3>
        						<ul>
									<!-- khung bên trái -->
        							<?php 
										$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
										$sql = "select idtheloai,tentheloai from tbltheloai where HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);


										while ( $row = mysqli_fetch_array($result) ) {
											// đếm số lượng sách
											$sql2 = "select idtheloai from tblsach where idtheloai = '".$row['idtheloai']."' AND HienThi = 0";			
											mysqli_query($conn, "SET NAMES 'utf8'");
											$result2 = mysqli_query($conn, $sql2);

											echo 
											'
												<li><a href="shop-grid.php?idtl='.$row['idtheloai'].'&tranghientai=1">'.$row['tentheloai'].'<span>'.mysqli_num_rows($result2).'</span></a></li>
									
											';			

										}
									?>
								</ul>
        					</aside>

        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        					<!-- <div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
									</div>
			                        <p>Showing 1–12 of 40 results</p> -->
									<?php 
										if (isset($_GET['idtl']) && isset($_GET['tranghientai']))
										{
											echo
											'
											<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
											<div class="orderby__wrapper">
												<span>Sắp xếp</span>
												<select id="selectBox" class="shot__byselect" onchange="changeFunc();">
													<option>Sắp xếp theo</option> 
													<option value="tensach">Theo chữ cái</option>
													<option value="giaban">Theo giá tiền</option> 
												</select>
											</div>
											</div>
        					</div>
        				</div>
											';
										}
									?>
			                       
		                        
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
								<!-- Sản phẩm -->
								<div class="row">
									<!-- Start Single Product -->
									<?php 
									
									if (isset( $_GET['idtl'])) {
										$idtl = $_GET['idtl'];
										$tranghientai = $_GET['tranghientai'];

										$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
										$sql = "select idSach from tblsach where idtheloai = '".$idtl."' and HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
												
										// số lượng sản phẩm
										$sosptrentrang  = 6;
										$tongsosanpham = mysqli_num_rows($result);
										$sotrang = ceil($tongsosanpham / $sosptrentrang);
										$vitri = max(0, ($tranghientai - 1) * $sosptrentrang); 
										
										if (isset($_GET['sapxep'])) {
											$sapxep = $_GET['sapxep'];
											$sql = "SELECT * FROM tblsach WHERE idtheloai = '".$idtl."' and HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
										}
										else
											$sql = "SELECT * FROM tblsach WHERE idtheloai = '".$idtl."' and HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
										

									}
									else if (isset($_GET['tranghientai'])){
										$tranghientai = $_GET['tranghientai'];

										$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
										$sql = "select idSach from tblsach where HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
												
										// số lượng sản phẩm
										$sosptrentrang  = 6;
										$tongsosanpham = mysqli_num_rows($result);
										$sotrang = ceil($tongsosanpham / $sosptrentrang);
										$vitri = max(0, ($tranghientai - 1) * $sosptrentrang); 
										
										$sql = "SELECT * FROM tblsach where HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
									}
									
										while ( $row = mysqli_fetch_array($result) ) {
											echo 
											'
											<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
												<div class="product__thumb">
													<a class="first__img" href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'"><img src="images/books/'.$row[4].'" alt="product image"></a>
													<a class="second__img animation1" href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'"><img src="images/books/'.$row[4].'" alt="product image"></a>
												</div>
												<div class="product__content content--center">
													<h4><a href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'">'.$row[1].'</a></h4>
													<ul class="prize d-flex">
														<li>'.$row[3].'</li>
													</ul>
													<div class="action">
														<div class="actions_inner">
															<ul class="add_to_links">
																<li><a href="#productmodal'.$row[0].'" data-toggle="modal"  title="Quick View" class="quickview modal-view detail-link" ><i class="bi bi-search"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											';			
										}
									?>
		        					<!-- End Single Product -->
								</div>
								<!-- Phân trang -->
	        					<ul class="wn__pagination">
									<?php
										if ($tranghientai > $sotrang || $tranghientai <= 0) {
											echo '<div style="text-align: center; margin-top: 20px;">Trang không tồn tại.</div>';
										} else {
										// duyệt xuất ra số trang
										for (  $i=1 ; $i<= $sotrang ; $i++) {
											if (isset($_GET['sapxep'])) {
												$sapxep = $_GET['sapxep'];
												echo '
												<li><a href="shop-grid.php?idtl='.$idtl.'&tranghientai='.$i.'&sapxep='.$sapxep.'">'.$i.'</a></li>
												';
											}
											else {
												if ( isset($_GET['idtl'])) 
												echo '
												<li><a href="shop-grid.php?idtl='.$idtl.'&tranghientai='.$i.'">'.$i.'</a></li>
												';
												else
													if ( isset($_GET['timkiem']))
														echo '
														<li><a href="shop-grid.php?timkiem='.$_GET['timkiem'].'&tranghientai='.$i.'">'.$i.'</a></li>
														';
													else
														echo '
														<li><a href="shop-grid.php?tranghientai='.$i.'">'.$i.'</a></li>
														';
											}
										}}
									?>
								</ul>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
		<!-- End Shop Page -->
		
		<div id="quickview-wrapper">
							<!-- Sản phẩm -->
		 <!-- Modal -->
	<?php 
	if (isset( $_GET['idtl'])) {
		$idtl = $_GET['idtl'];
		$tranghientai = $_GET['tranghientai'];

		$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
		$sql = "select idSach from tblsach where idtheloai = '".$idtl."' and HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
				
		// số lượng sản phẩm
		$sosptrentrang  = 3;
		$tongsosanpham = mysqli_num_rows($result);
		$sotrang = ceil($tongsosanpham / $sosptrentrang);
		$vitri = max(0, ($tranghientai - 1) * $sosptrentrang); 
		
		if (isset($_GET['sapxep'])) {
			$sapxep = $_GET['sapxep'];
			$sql = "SELECT * FROM tblsach WHERE HienThi = 0 and idtheloai = '".$idtl."' and HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
		}
		else
			$sql = "SELECT * FROM tblsach WHERE HienThi = 0 and idtheloai = '".$idtl."' and HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);

	}
	else if ( !isset($_GET['timkiem'])) {
		$tranghientai = $_GET['tranghientai'];

		$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
		$sql = "select idSach from tblsach where HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
				
		// số lượng sản phẩm
		$sosptrentrang  = 6;
		$tongsosanpham = mysqli_num_rows($result);
		$sotrang = ceil($tongsosanpham / $sosptrentrang);
		$vitri = max(0, ($tranghientai - 1) * $sosptrentrang); 
		
		if (isset($_GET['sapxep'])) {
			$sapxep = $_GET['sapxep'];
			$sql = "SELECT * FROM tblsach where HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
		}
		else
			$sql = "SELECT * FROM tblsach where HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
	}		
	else
	{
		$tensach = $_GET['timkiem'];
		$sotrang = 0;
		$conn = mysqli_connect("sql207.infinityfree.com","if0_37194966","ngocanh09876","if0_37194966_bookshop");
		$sql = "SELECT * from tblsach where tensach like '%".$tensach."%' and HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0)
			echo
			'
				<div style="text-align: center; margin-left: 150px;">
					<h2>Sản Phẩm Bạn Đang Tìm Kiếm Hiện Không Có</h2>
				</div>
			';
		else
		{
			// số lượng sản phẩm
			$tranghientai = $_GET['tranghientai'];

			$sosptrentrang  = 3;
			$tongsosanpham = mysqli_num_rows($result);
			$sotrang = ceil($tongsosanpham / $sosptrentrang);
			$vitri = max(0, ($tranghientai - 1) * $sosptrentrang); 
			
			$sql = "SELECT * FROM tblsach where HienThi = 0 and tensach like '%".$tensach."%' LIMIT ".$vitri.",".$sosptrentrang;			
			mysqli_query($conn, "SET NAMES 'utf8'");
			$result = mysqli_query($conn, $sql);
		}			
	}					

	while ( $row = mysqli_fetch_array($result) ) {
		echo 
		'
		<div class="modal fade" id="productmodal'.$row[0].'" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">

		                <div class="modal-body">
							<div class="modal-product">
							
								<!-- Start product images -->
								<div class="product-images">
									<div class="main-image images">
										<img src="images/books/'.$row[4].'">
									</div>
								</div>

		                        <div class="product-info">
									<h1>'.$row[1].'</h1>
									
									<div class="rating__and__review">
										<div class="review">
											<a href="#">4 customer reviews</a>
										</div>
									</div>

									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">'.$row[3].'</span>
										</div>
									</div>

									<div class="quick-desc">
									'.$row[5].'
									</div>

									<div class="addtocart-btn">
										<a href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'">Add to cart</a>
									</div>
									
								</div>
								
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		';	
	}
?>
<!-- End Single Product -->								

		    </div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
		</div>
		<!-- //Main wrapper -->

		<!-- JS Files -->
<?php include "footer.php"?>