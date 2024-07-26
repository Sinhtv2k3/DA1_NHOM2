<?php
// function insert_danhmuc($tenloai, $img)
// {
//     $sql = "insert into danhmuc(name,img) values('$tenloai','$img')";
//     pdo_execute($sql);
// }
// function insert_danhmuc($tenloai, $hinh)
// {
//     $sql = "insert into danhmuc(name,img) values('$tenloai', '$hinh')";
//     pdo_execute($sql);
// }
// function loadall_danhmuc()
// {
//     $sql = "select * from danhmuc order by id desc";
//     $listdanhmuc = pdo_query($sql);
//     return $listdanhmuc;
// }
// function loadall_danhmuc_home()
// {
//     $sql = "select * from danhmuc order by id desc limit 0,5";
//     $listdanhmuc = pdo_query($sql);
//     return $listdanhmuc;
// }
// function delete_danhmuc($id)
// {
//     $sql = "delete from danhmuc where id=" . $id;
//     pdo_execute($sql);
// }
// function loadone_danhmuc($id)
// {
//     $sql = "select * from danhmuc where id=" . $id;
//     $dm = pdo_query_one($sql);
//     return $dm;
// }

// function update_danhmuc($id, $tenloai, $hinh)
// {
//     if ($hinh != "")
//         $sql = "update danhmuc set name='" . $tenloai . "',img='" . $hinh . "' where id=" . $id;
//     else
//         $sql = "update danhmuc set name='" . $tenloai . "' where id=" . $id;
//     pdo_execute($sql);
// }
// function danhsach_danhmuc(){
//     $sql ="select * from danhmuc";
//     $result = pdo_query($sql);
//     return $result;
// }

function insert_danhmuc($id_dm, $tendm, $trangthai)
{
    $sql = "INSERT INTO danhmuc(id_dm, ten_dm, trangthai) VALUES ('$id_dm', '$tendm', '$trangthai')";
    pdo_execute($sql);
}

function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc ORDER BY id_dm ASC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function delete_danhmuc($id)
{
    $sql = "DELETE FROM danhmuc WHERE id_dm = :id";
    pdo_execute($sql, array(':id' => $id));
}

function loadone_danhmuc($id)
{
    $sql = "SELECT * FROM danhmuc WHERE id_dm = :id";
    $dm = pdo_query_one($sql, array(':id' => $id));
    return $dm;
}

function update_danhmuc($id, $tendm, $trangthai)
{
    $sql = "UPDATE danhmuc SET ten_dm = :tendm, trangthai = :trangthai WHERE id_dm = :id";
    pdo_execute($sql, array(':id' => $id, ':tendm' => $tendm, ':trangthai' => $trangthai));
}
