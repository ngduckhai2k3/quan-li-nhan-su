<?php
include "connect.php";
$sql = "
SELECT ktkl.id, nv.ho_ten, ktkl.ngay, ktkl.loai, ktkl.ly_do, ktkl.so_tien
FROM khen_thuong_ky_luat ktkl
JOIN nhan_vien nv ON ktkl.nhan_vien_id = nv.id
WHERE ktkl.loai IN ('Khen thưởng', 'Kỷ luật')
";
$ds = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="badge text-bg-secondary text-wrap" style="width: 20rem;font-weight: bold; font-size: 24px; padding:10px; margin-bottom: 10px">Khen thưởng - Kỷ luật</div>
        <div>
            <table class="table table-bordered table-hover" style="border:3px solid #ccc;">
            <tr>
                <th>Nhân viên</th>
                <th>Ngày</th>
                <th>Loại</th>
                <th>Lý do</th>
                <th>Số tiền</th>
            </tr>
            <?php while($row = $ds->fetch_assoc()) { ?>
                <tr>
                <td><?= htmlspecialchars($row['ho_ten']) ?></td>
                <td><?= htmlspecialchars($row['ngay']) ?></td>
                <td><?= htmlspecialchars($row['loai']) ?></td>
                <td><?= htmlspecialchars($row['ly_do']) ?></td>
                <td><?= number_format($row['so_tien']) ?> VNĐ</td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
