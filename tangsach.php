<?php
session_start() ?>
<?php
include "header.php";
include "gttop.php"
?>
<style>
  .form
  {
    margin: 5px auto;
    width: 750px;
    align-items: center;
    border:3px double #006766;
    padding: 10px;
  }
  #form{padding:5px;}
 .bg{background: #F4F4F4}
</style>
<div class="bg">
<div><br><br><br></div>
<div class="form">
<table>
<form id="customerForm" action="xulytangsach.php" method="post">
<tr>
      <td><label id="username"> Họ tên: </label></td>
      <td id="form"><input type="text" placeholder="Nhập họ tên" id="hoten" name="hoten" size="50"/>
        <span> (*) </span></td>
    </tr>
    <tr>
      <td><label>Giới tính:</label></td>
      <td id="form"><input type="radio" id="gioitinh" name="gioitinh" />
        Nam
        <input type="radio" id="gioitinh" name="gioitinh"/>
        Nữ
        <input type="radio" id="gioitinh" name="gioitinh" />
        Khác </td>
    </tr>
    <tr>
      <td><label id="sach">Tên sách:</label></td>
      <td id="form"><input type="text" placeholder="Nhập tên sách" id="tensach" name="tensach" size="50"/>
        <span> (*) </span></td>
    </tr>
    <tr>
      <td><label>Tình trạng sách:</label>
      <td id="form"><select id="tinhtrangsach" name="tinhtrangsach" >
          <option>Còn mới</option>
          <option>Mất trang, mất bìa</option>
          <option>Đã sử dụng nhưng vẫn còn nguyên</option>
        </select></td>
    </tr>
    <tr>
      <td width="25%"><label>Yêu cầu:</label></td>
      <td id="form" width="75%"><textarea name="yeucau" id="yeucau" cols="50" ></textarea></td>
    </tr>
    <tr>
      <td width="25%"><label>Địa chỉ:</label></td>
      <td  id="form" width="75%"><textarea name="diachi" id="diachi" placeholder="Nhập địa chỉ" cols="50"></textarea></td>
    </tr>
    <tr>
      <td><label id="dt">Điện thoại:</label></td>
      <td  id="form"><input type="text" placeholder="Nhập số điện thoại" id="dienthoai" name="dienthoai" size="50">
        <span> (*) </span></td>
    </tr>

    <tr>
      <td><label id="email">Email:</label></td>
      <td  id="form"><input type="text" placeholder="Nhập địa chỉ email" id="email" name="email" size="50"/>
      </td>
    </tr>
    <tr>
      <td width="25%"></td>
      <td id="form"><button type="submit" style="padding:5px; margin:0 5px; ">Gửi thông tin</button>
        <button type="reset" style="padding: 5px; margin:0 5px;">Nhập lại</button></td>
      </tr>
      <tr id="kq"><td colspan="2" id="result"></td></tr>
    <tr><span><i>*Khi bạn muốn tặng sách cho chúng tớ thì hãy mạnh dạn điền thông tin vào đây nhaaa, 
      tụi tớ sẽ cử người liên hệ chi tiết hơn với mình và đến tận nơi để rước những em sách ấy về nè.
    </i></span></tr>
  </form>
</table>
</div>
</div>
<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>