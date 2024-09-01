<?php
    $q = $_REQUEST["p"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("sql207.infinityfree.com", "if0_37194966", "ngocanh09876", "if0_37194966_bookshop");
        $query = "SELECT tenTheLoai FROM tbltheloai where tenTheLoai='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
        while($result = mysqli_fetch_array($query_run) ){
        
            if($q == $result['tenTheLoai']){
                $hint="Trùng tên thể loại!"; break;
            }else{
                $hint="";
            }
        
        }
        echo $hint;
            
    }  
?>