<?php
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
