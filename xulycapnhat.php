<?php
include('connect.php');

if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];

    $hoten = $_POST['ho_ten'];
    $ngaysinh = $_POST['ngay_sinh'];
    $gioitinh = $_POST['gioi_tinh'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $phongban = $_POST['phong_ban'];
    $chucvu = $_POST['chuc_vu'];

    
    $sql = "UPDATE `nhan_vien` SET `ho_ten`='$hoten', `ngay_sinh`='$ngaysinh', `gioi_tinh`='$gioitinh', `email`='$email', `sdt`='$sdt', `phong_ban`='$phongban', `chuc_vu`='$chucvu' WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Cập nhật thành công!";
        header('location: trangchu.php?page_layout=dsnv');
        exit;
    } else {
        echo "❌ Lỗi khi cập nhật: " . mysqli_error($conn);
    }
}
?>