<?php
    $q = $_REQUEST["q"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("sql207.infinityfree.com", "if0_37194966", "ngocanh09876", "if0_37194966_bookshop");
        $query = "SELECT Email FROM tbltaikhoan where email='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
        while($result = mysqli_fetch_array($query_run) ){
        
            if($q == $result['Email']){
                $hint="Trùng Email!"; break;
            }else{
                $hint="";
            }
        
        }
        echo $hint;
            
    }
    
?>