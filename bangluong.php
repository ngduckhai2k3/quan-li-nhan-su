<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bảng lương</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .data {
            margin-top: 50px;
            margin-bottom: 20px;
        }
        .data span {
            margin-right: 10px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php
        include('connect.php');
            $sql = "SELECT nv.ho_ten, nv.phong_ban, nv.chuc_vu, l.luong_co_ban, l.phu_cap, l.thuong, l.ky_luat, l.tong_luong,
                tinh_cong_thang(nv.id, l.thang, l.nam) AS so_ngay_cong
                FROM luong AS l
                JOIN nhan_vien AS nv ON l.nhan_vien_id = nv.id
                ORDER BY l.id";

        $result = mysqli_query($conn, $sql);
        ?>
    <div class="container">
        <div class="badge text-bg-secondary text-wrap" style="width: 10rem;font-weight: bold; font-size: 24px; padding:10px;">Bảng lương</div>
        <div class="data">
            <span>Tháng</span>
            <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <span>Năm</span>
            <select>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
            </select>
        </div>
        <div class="table">
            <table class="table table-bordered table-hover" style="border:3px solid #ccc;">
                <tr>
                    <th>Số thứ tự</th>
                    <th>Họ và tên</th>
                    <th>Phòng ban - Chức vụ</th>
                    <th>Số ngày công</th>
                    <th>Lương cơ bản</th>
                    <th>Phụ cấp</th>
                    <th>Thưởng</th>
                    <th>Phạt</th>
                    <th>Tổng lương</th>
                </tr>
                <?php
                $stt = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td>" . $stt++ . "</td>";
                        echo "<td>" . $row['ho_ten'] . "</td>";
                        echo "<td>" . $row['phong_ban'] . " - " . $row['chuc_vu'] . "</td>";
                        echo "<td>" . $row['so_ngay_cong'] . "</td>";
                        echo "<td>" . $row['luong_co_ban'] . "</td>";
                        echo "<td>" . $row['phu_cap'] . "</td>";
                        echo "<td>" . $row['thuong'] . "</td>";
                        echo "<td>" . $row['ky_luat'] . "</td>";
                        echo "<td>" . $row['tong_luong'] . "</td>";
                    echo "</tr>";
                }
                ?>
            <?php  ?>
            </table>
        </div>
    </div>
</body>
</html>