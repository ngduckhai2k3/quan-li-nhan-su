<?php
include('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `nhan_vien` WHERE `id` = $id";
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
