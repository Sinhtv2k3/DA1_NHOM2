<?php
function insert_sanpham($tenloai, $giasp, $hinh, $mota, $iddm, $giamgia)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm,giam_gia) values('$tenloai', '$giasp', '$hinh',  '$mota', '$iddm', '$giamgia' )";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}
function loadall_sanpham_top5()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,6";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home(){
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "select * from sanpham where 1 ";
    if ($kyw != "") {/* dùng câu lệnh nối sql và để thực hiện điều kiện lọc trong list danh sách của   */
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=". $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm=" . $iddm . " AND id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $giamgia)
{
    if ($hinh != ""){
        $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`img`='$hinh',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
    }
    else{
        $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
    }

    pdo_execute($sql);
}
function top10_sanpham(){
    $sql = "select * from `sanpham` ORDER by luotxem limit 4";
    $result = pdo_query($sql);
    return $result;
}
function danhsach_sanpham(){
    $sql = "select * from sanpham";
    $result = pdo_query($sql);
    return $result;
}

function loadsp_theodanhmuc($id)
{
    $sql = "select * from sanpham where iddm=" . $id;
    $dm = pdo_query($sql);
    return $dm;
}