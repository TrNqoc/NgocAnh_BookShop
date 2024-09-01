<?php
// Kết nối đến cơ sở dữ liệu (thay thế thông tin kết nối của bạn)
$conn = mysqli_connect("sql207.infinityfree.com", "if0_37194966", "ngocanh09876", "if0_37194966_bookshop");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Nhận từ khóa tìm kiếm từ form
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Truy vấn SQL để tìm kiếm sách
$sql = "SELECT * FROM tblsach WHERE tensach LIKE '%$keyword%' AND HienThi = 0";
mysqli_query($conn, "SET NAMES 'utf8'");
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có kết quả nào hay không
if (mysqli_num_rows($result) > 0) {
    // Hiển thị kết quả
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo '<a class="first__img" href="single-product.php?idsach=' . $row['idSach'] . '&idtl=' . $row['idTheLoai'] . '"><img src="images/books/' . $row['urlHinh'] . '" alt="product image"></a>';
        echo "<h3>" . $row['tensach'] . "</h3>";
        echo "<p>Giá: " . $row['GiaBan'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Không tìm thấy kết quả cho từ khóa: " . $keyword;
}

// Đóng kết nối
mysqli_close($conn);
?>
