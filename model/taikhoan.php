<?php
 function insert_taikhoan($ten, $mk, $email) {
        $sql = "INSERT INTO taikhoan (ten, mk, email ) VALUES ( ?, ?, ?)";
        pdo_execute($sql, $ten,$mk,$email);
    }
    function checkusername($ten,$mk){
            $sql = "select * from taikhoan where username='".$ten."' AND passwork='".$mk."'";
            $sp = pdo_query_one($sql);
            return $sp; 
    }              
?>