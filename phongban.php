<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lọc nhân viên theo phòng ban</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include('connect.php');
$selected_pb = isset($_GET['phong_ban']) ? $_GET['phong_ban'] : '';

// Lấy danh sách phòng ban
$phongban_query = "SELECT * FROM phong_ban";
$phongban_result = mysqli_query($conn, $phongban_query);

// Truy vấn nhân viên
if ($selected_pb != '') {
    $sql = "SELECT nv.*, cv.ten_chuc_vu
            FROM nhan_vien nv
            LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id
            WHERE nv.phong_ban_id = '$selected_pb'";
} else {
    $sql = "SELECT nv.*, cv.ten_chuc_vu
            FROM nhan_vien nv
            LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id";
}
$result = mysqli_query($conn, $sql);
?>
    <div class="container">
        <div class="chonpb">
            <form method="GET" action="">
                <label for="phong_ban">Chọn phòng ban:</label>
                <select class="form-select" aria-label="Default select example" name="phong_ban" id="phong_ban" style="width: 300px;">
                    <option value="">-- Tất cả --</option>
                    <?php while($pb = mysqli_fetch_assoc($phongban_result)): ?>
                        <option value="<?= $pb['id'] ?>" <?= $selected_pb == $pb['id'] ? 'selected' : '' ?>>
                            <?= $pb['ten_phong'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </form>
        </div>
        <div class="table-responsive" style="margin-top: 20px;">
            <?php if (mysqli_num_rows($result) > 0): ?>
            <label>Danh sách nhân viên:</label>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Họ và tên</th>
                    <th>Chức vụ</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>  
                    <th>Email</th>
                </tr>   
                <?php while($nv = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $nv['ho_ten'] ?></td>
                    <td><?= $nv['ten_chuc_vu'] ?></td>
                    <td><?= date('d/m/Y', strtotime($nv['ngay_sinh'])) ?></td>
                    <td><?= $nv['gioi_tinh'] ?></td>
                    <td><?= $nv['sdt'] ?></td>
                    <td><?= $nv['email'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <?php else: ?>
            <p>Không có nhân viên nào thuộc phòng ban này.</p>
        <?php endif; ?>
    </div>
</body>
</html>
