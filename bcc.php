<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
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
    $thang = isset($_GET['thang']) ? (int)$_GET['thang'] : date('n');
    $nam = isset($_GET['nam']) ? (int)$_GET['nam'] : date('Y');
    $sql = "SELECT 
        nv.id AS ma_nv,
        nv.ho_ten,
        nv.phong_ban AS phong_ban,
        nv.chuc_vu AS chuc_vu,
        tinh_cong_thang(nv.id, $thang, $nam) AS cong_thuc_te,
        COUNT(CASE WHEN cc.trang_thai = 'Đi làm' THEN 1 END) AS cong_thuc_te,
        COUNT(CASE WHEN cc.trang_thai = 'Nghỉ có phép' THEN 1 END) AS nghi_phep,
        COUNT(CASE WHEN cc.trang_thai = 'Nghỉ không phép' THEN 1 END) AS nghi_khong_phep
    FROM nhan_vien nv
    LEFT JOIN cham_cong cc ON nv.id = cc.nhan_vien_id 
        AND MONTH(cc.ngay) = $thang AND YEAR(cc.ngay) = $nam
    GROUP BY nv.id";

    $result = $conn->query($sql);
    ?>
    <div class="container">
    <div class="badge text-bg-secondary text-wrap" style="width: 15rem;font-weight: bold; font-size: 24px; padding:10px;">Bảng chấm công</div>
    <div class="data">
        <form method="GET" action="" style="display: flex;">
            <span>Tháng</span>
            <select name="thang" class="form-select" style="width: 100px; margin-right: 30px;">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $selected = ($i == $thang) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>
            <span>Năm</span>
            <select name="nam" class="form-select" style="width: 100px;">
                <?php
                for ($y = 2023; $y <= 2026; $y++) {
                    $selected = ($y == $nam) ? 'selected' : '';
                    echo "<option value='$y' $selected>$y</option>";
                }
                ?>
            </select>
        </form>
    </div>
    <div class="table">
    <table class="table table-bordered table-hover" style="border:3px solid #ccc;">
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Họ và tên</th>
            <th>Phòng ban</th>
            <th>Chức vụ</th>
            <th>Công định mức</th>
            <th>Nghỉ có phép</th>
            <th>Nghỉ không phép</th>
            <th>Công làm việc thực tế</th>

        </tr>
        <?php
        $stt = 1;
        $so_cong_dinh_muc = 26;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $stt++ . "</td>";
                echo "<td>" . $row['ma_nv'] . "</td>";
                echo "<td>" . $row['ho_ten'] . "</td>";
                echo "<td>" . $row['phong_ban'] . "</td>";
                echo "<td>" . $row['chuc_vu'] . "</td>";
                echo "<td>" . $so_cong_dinh_muc . "</td>";
                echo "<td>" . $row['nghi_phep'] . "</td>";
                echo "<td>" . $row['nghi_khong_phep'] . "</td>";
                echo "<td>" . $row['cong_thuc_te'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>