<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lọc nhân viên theo phòng ban</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <?php
    include('connect.php');
    $selected_pb = isset($_GET['phong_ban']) ? $_GET['phong_ban'] : '';
    if ($selected_pb != '') {
        $sql = "SELECT * FROM nhan_vien WHERE phong_ban = '$selected_pb'";
    } else {
        $sql = "SELECT * FROM nhan_vien";
    }
    $result = mysqli_query($conn, $sql);
    ?>
        <div class="chonpb">
            <form method="GET" action="">
                <div style="margin-right: 20px;">
                        <p style="margin-left: 20px">Phòng ban:</p>
                        <select name="phong_ban" class="form-select" onchange="this.form.submit()" required>
                            <option value="">-- Chọn phòng ban --</option>
                            <option value="Kỹ thuật" <?= $selected_pb == "Kỹ thuật" ? "selected" : "" ?>>Kỹ thuật</option>
                            <option value="Hành chính - Nhân sự" <?= $selected_pb == "Hành chính - Nhân sự" ? "selected" : "" ?>>Hành chính - Nhân sự</option>
                            <option value="Kế toán" <?= $selected_pb == "Kế toán" ? "selected" : "" ?>>Kế toán</option>
                            <option value="Kinh doanh" <?= $selected_pb == "Kinh doanh" ? "selected" : "" ?>>Kinh doanh</option>
                            <option value="Sản xuất" <?= $selected_pb == "Sản xuất" ? "selected" : "" ?>>Sản xuất</option>
                            <option value="Marketing" <?= $selected_pb == "Marketing" ? "selected" : "" ?>>Marketing</option>
                    </select>
                </div>
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
                    <td><?= $nv['chuc_vu'] ?></td>
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
