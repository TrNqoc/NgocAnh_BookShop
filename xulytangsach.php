<?php
$conn = mysqli_connect("localhost","root","","bookshop");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý dữ liệu từ biểu mẫu khi nút "Gửi thông tin" được nhấn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $tensach = $_POST["tensach"];
    $tinhtrangsach = $_POST["tinhtrangsach"];
    $yeucau = $_POST["yeucau"];
    $diachi = $_POST["diachi"];
    $dienthoai = $_POST["dienthoai"];
    $email = $_POST["email"];

    // Chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO tbltangsach (hoten, gioitinh, tensach, tinhtrangsach, yeucau, diachi, dienthoai, email)
    VALUES ('$hoten', '$gioitinh', '$tensach', '$tinhtrangsach', '$yeucau', '$diachi', '$dienthoai', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Thông tin đã được gửi thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
