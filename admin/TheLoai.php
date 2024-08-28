<?php
    include 'scripts.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.col-md-2 div{
		margin-top: 20px;

	}
	.col-md-2 div:hover{
		background-color: red;
	}
	.textfield {
		width: 100px;
	}
	.title{
		float:left;
	}
	.search-container{
		float:right;
		margin-top:10px;
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
		<div class="title"><h2>Quản lý thể loại</h2></div>	
		<div class="search-container">
    		<form action="code.php" method="post">
      			<input type="text" placeholder="Search.." name="search">
      			<button type="submit" name="btnSearch_TL"><i class="fa fa-search"></i></button>
    		</form>
  		</div>

<br><br><br>
<button type="button" class="btn btn-success"   style="margin-bottom:10px;" data-toggle="modal" data-target=" <?php echo '#AddModal' ?>">Thêm thể loại</button>

<div class="table-responsive">
<?php
    $connection = mysqli_connect("localhost", "root", "", "bookshop");
    $query = "SELECT * FROM tbltheloai";

    if (isset($_GET['search'])) {
		$search=$_GET['search'];
		$query="SELECT * FROM tbltheloai WHERE idtheloai LIKE '%$search%' OR tentheloai LIKE '%$search%' OR hienthi LIKE '%$search%' ";
	}

    $query_run = mysqli_query($connection, $query);
?>
<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>idTheLoai</th>
			<th>Tên Thể loại</th>
			<th style="text-align:center;">Ẩn/Hiện</th>
			<th style="text-align:center;">Chức năng</th>
		</tr>
	</thead>
	<tbody>
	<?php
        if (mysqli_num_rows($query_run)>0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
<form action="code.php"  method="POST">
		<tr>
			<td><?php echo $row['idTheLoai']; ?></td>
			<td><?php echo $row['tenTheLoai']; ?></td>
			<td style="text-align:center;"><?php echo $row['HienThi']; ?></td>
			<td style="text-align:center;">
					
				<form action=""  method="POST">
					<button type="button" class="btn btn-outline-dark" name="btn_Edit" data-toggle="modal" data-target=" <?php echo '#EditModal'.$row['idTheLoai'].'' ?>">Sửa</button>	
                <input type="hidden" name="idTheloai" value="<?php echo $row['idTheLoai']; ?>">

                <?php
                    if ( $row['HienThi'] == 0)
                    echo '<form action="code.php"  method="POST">
					    <button type="submit" class="btn btn-outline-info" name="btn_LockTL" style="margin-left: 0px; padding-right: 19px; padding-left: 18px;">Ẩn</button>
				    ';
                    else 
                    echo '<form action="code.php"  method="POST">
					    <button type="submit" class="btn btn-outline-info" name="btn_unLockTL">Hiện</button>
			        ';
                ?>
                <form action=""  method="POST">
                    <button type="button" class="btn btn-outline-danger" name="btnDel" 
                            data-toggle="modal" data-target="#DelModal<?php echo $row['idTheLoai']; ?>">Xóa</button>
                    <!--<input type="hidden" name="idTheLoai" value="<?php echo $row['idTheLoai']; ?>">-->
                </form>


                <!--<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $row['idTheLoai']; ?>">Xóa</button>-->

            </td>
		</tr>
</form>
			
		<?php
            }
        } else {
            echo "Không tìm thấy thể loại";
        }
        ?>
	</tbody>
</table>
</div> 


<!-- Modal Add Button -->
<?php 
	 $connection = mysqli_connect("localhost", "root", "", "bookshop");
     $query = "SELECT idTheLoai,tenTheLoai FROM tbltheloai";
     $query_run = mysqli_query($connection, $query);
     if (mysqli_num_rows($query_run)>0) {
        while ($row = mysqli_fetch_array($query_run)) {
            
		echo 
		'
        <!-- Modal add-->
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm thể loại</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="post" name="form1" onsubmit="required()">
                    <p style="margin-bottom:0.5rem;">Id Thể loại</p>
                    <input type="number" name="inpIDTheloai" placeholder="Nhập id thể loại" onkeyup="showHint(this.value)">
                    <p id="checkid" style="color:red;"></p>
                    <p style="margin-bottom:0.5rem; margin-top:1rem;">Tên Thể loại</p>
                    <input type="text" name="inptenTheloai" placeholder="Nhập tên thể loại" onkeyup="showHint1(this.value)">
                    <p id="checkten" style="color:red;"></p>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    

';	
        }
    }

?>

<!-- Modal Add Button -->
<?php 
	 $connection = mysqli_connect("localhost", "root", "", "bookshop");
     $query = "SELECT idTheLoai,tenTheLoai FROM tbltheloai";
     $query_run = mysqli_query($connection, $query);
     if (mysqli_num_rows($query_run)>0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            
		echo 
		'
        <!-- Modal add-->
        <div class="modal fade" id="EditModal'.$row['idTheLoai'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thể loại</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="post" name="form2" onsubmit="required1()">
                    <p style="margin-bottom:0.5rem;">Id Thể loại</p>
                    <input type="number" placeholder="'.$row['idTheLoai'].'" disabled >
                    <input type="hidden" name="inpIDTheloai1" value="'.$row['idTheLoai'].'">
                    <p id="checkid" style="color:red;"></p>
                    <p style="margin-bottom:0.5rem; margin-top:1rem;">Tên Thể loại</p>
                    <input type="text" name="inptenTheloai1" value="'.$row['tenTheLoai'].'" onkeyup="showHint1(this.value)">
                    <p id="checkten" style="color:red;"></p>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btnEdit">Lưu</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    

';	
        }
    }

?>

<!-- Modal Del Button -->
<?php 
    $connection = mysqli_connect("localhost", "root", "", "bookshop");
    $query = "SELECT idTheLoai, tenTheLoai FROM tbltheloai";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
            echo 
            '
            <!-- Modal add -->
            <div class="modal fade" id="DelModal'.$row['idTheLoai'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa thể loại sách này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <!-- Form xóa -->
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="idTheLoai" value="'.$row['idTheLoai'].'">
                                    <button type="submit" class="btn btn-danger" name="btnDel">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';  
        }
    }
?>

<script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("checkid").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("checkid").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "getCheckidTheloai.php?q=" + str, true);
        xmlhttp.send();
    }
    }


    function showHint1(str) {
    if (str.length == 0) {
        document.getElementById("checkten").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("checkten").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "getChecktenTheloai.php?p=" + str, true);
        xmlhttp.send();
    }
    }

    function required()
    {
        var empt = document.forms["form1"]["inpIDTheloai"].value;
        var emp1= document.forms["form1"]["inptenTheloai"].value;
        if (empt == null || empt =="", emp1 ==null||emp1=="")
        {
        alert("Hãy nhập hết tất cả các thông tin");
        return false;
        }
        else 
        {
        return true; 
        }
    }
    function required1()
    {
        
        var emp1= document.forms["form2"]["inptenTheloai1"].value;
        if (emp1 ==null||emp1=="")
        {
        alert("Hãy nhập hết tất cả các thông tin");
        return false;
        }
        else 
        {
        return true; 
        }
    }
    function confirmDelete(id) {
        $('#DelModal' + id).modal('show');
    }

</script>
