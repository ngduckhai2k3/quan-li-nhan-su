<?php
include('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM chuc_vu WHERE id = $id");
    $sql = "DELETE FROM `nhan_vien` WHERE `id` = $id";
    mysqli_query($conn, "DELETE FROM cham_cong WHERE nhan_vien_id = $id");
    mysqli_query($conn, "DELETE FROM luong WHERE nhan_vien_id = $id");
    mysqli_query($conn, "DELETE FROM phong_ban WHERE id = $id");
    mysqli_query($conn, "DELETE FROM nguoi_dung WHERE nhan_vien_id = $id");
    mysqli_query($conn, "DELETE FROM khen_thuong_ky_luat WHERE nhan_vien_id = $id");


    if (mysqli_query($conn, $sql)) {
        header('location: trangchu.php?page_layout=dsnv');
        exit;
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    echo "ID không hợp lệ!";
}
?>