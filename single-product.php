<?php
session_start() ?>
<?php include "header.php";
include "gttop.php" ?>
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
    <div class="container">
        <div class="row">
            <?php
            $idsach = $_GET['idsach'];
            $idtl = $_GET['idtl'];
            if (isset($_SESSION['email']))
                $email = $_SESSION['email'];
            else
                $email = 'null';

            $conn = mysqli_connect("localhost", "root", "", "bookshop");
            $sql = "select * from tblsach where idsach = '" . $idsach . "'";
            mysqli_query($conn, "SET NAMES 'utf8'");
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            $sql1 = "select * from tbltheloai where idtheloai = '" . $idtl . "'";
            mysqli_query($conn, "SET NAMES 'utf8'");
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);


            echo '
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="wn__fotorama__wrapper">
                                <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                    <a href="111.jpeg"><img src="images/books/' . $row[4] . '" alt=""></a>
                                </div>
                            </div>
                        </div>
           <div class="col-lg-6 col-12">
             <div class="product__info__main">
                                <h1>' . $row[1] . '</h1>
                                
                                <div class="price-box">
                                    <span>' . $row[3] . '</span>
                                </div>
                                <div class="product__overview">
                                    <p>' . $row[5] . '</p>
                                </div>
                                <div class="box-tocart d-flex">
                                ';
            if (!isset($_SESSION['email']))
                echo '<form action="GioHang_Session.php" method="GET">';
            else
                echo '<form action="GioHang.php?idsach=' . $_GET['idsach'] . '&email=' . $email . '&idtl=' . $_GET['idtl'] . '" method="GET">';

            echo '
                                    <span>Số Lượng</span>
                                    <input class="input-text qty" name="soluong" min="1" value="1" title="Qty" type="number">
                                    <input type="hidden" name="idsach" value="' . $_GET['idsach'] . '"></input>
                                    <input type="hidden" name="email" value="' . $email . '"></input>
                                    <input type="hidden" name="idtl" value="' . $_GET['idtl'] . '"></input>
<br>
                                    <div class="addtocart__actions">
                                        <button class="tocart" type="submit" title="Thêm vào giỏ hàng">Thêm Vào Giỏ Hàng</button>
                                    </div>
                                    </form>
                                </div>
                                ';
            if (!is_null($row1) && count($row1) >= 2) {
                echo 'Thể Loại: 
                    <a href="shop-grid.php?idtl=' . $row1[0] . '&tranghientai=1">' . $row1[1] . '</a>
                ';
            } else {
                echo "Không thể truy cập vào dữ liệu.";
            }
            echo '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Danh mục sách</h3>
                        <ul>
                            <!-- khung bên trái -->
                            ';
            $conn = mysqli_connect("localhost", "root", "", "bookshop");
            $sql = "select idtheloai,tentheloai from tbltheloai";
            mysqli_query($conn, "SET NAMES 'utf8'");
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $sql2 = "select idtheloai from tblsach where idtheloai = '" . $row['idtheloai'] . "' AND HienThi = 0";
                mysqli_query($conn, "SET NAMES 'utf8'");
                $result2 = mysqli_query($conn, $sql2);

                echo
                '
                                        <li><a href="shop-grid.php?idtl=' . $row['idtheloai'] . '&tranghientai=1">' . $row['tentheloai'] . '<span>' . mysqli_num_rows($result2) . '</span></a></li>
                                
                                    ';
            }
            echo '
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
';
?>
		</div></div></div>
<?php include "footer.php" ?>

<!-- //Footer Area -->