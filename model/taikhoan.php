<?php
// function loadall_taikhoan()
// {
//     $sql = "select * from taikhoan order by id desc";
//     $listtaikhoan = pdo_query($sql);
//     return $listtaikhoan;
// }
// function checkuser($user, $pass)
// {
//     $sql = "select * from taikhoan where user = '$user' and pass = '$pass'";
//     $result = pdo_query_one($sql);
//     return $result;
// }
// function delete_taikhoan($id)
// {
//     $sql = "delete from taikhoan where id=" . $id;
//     pdo_execute($sql);
// }
// function insert_taikhoan($user, $email, $pass)
// {
//     $sql = "insert into taikhoan(user,email,pass) values('$user','$email','$pass')";
//     pdo_execute($sql);
// }
// function update_taikhoan($id, $user, $pass, $email, $address, $tel)
// {
//     $sql = "update taikhoan set user='" . $user . "',pass='" . $pass . "',email='" . $email . "',address='" . $address . "',tel='" . $tel . "' where id=" . $id;
//     pdo_execute($sql);
// }

// function checkemail($email)
// {
//     $sql = "select * from taikhoan where email='" . $email . "'";
//     $sp = pdo_query_one($sql);
//     return $sp;
// }
