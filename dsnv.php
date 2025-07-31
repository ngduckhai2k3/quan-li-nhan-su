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
</head>
<style>
    .delete {
        background-color: red;
        text-decoration: none;
        color: white;
    }
    .caption {
        font-weight: bold;
        text-align: center;
        font-size: 24px;
        padding-top:10px;
    }
    </style>
<body>
    <div class="container">
        <div class="badge text-bg-secondary text-wrap" style="width: 18rem;font-weight: bold; font-size: 24px; padding:10px; margin-bottom: 20px;">Danh sách nhân viên</div>
        <table class="table table-bordered table-hover" style="border:3px solid #ccc;">
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Chức vụ</th>
                <th>Phòng ban</th>
                <th>Số điện thoại</th>
                <th>Chức năng</th>
            </tr>
            <?php
                    $stt = 1;
                    include('connect.php');
                    $sql = "SELECT * FROM nhan_vien";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['ho_ten']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])); ?></td>
                    <td><?php echo $row['gioi_tinh']; ?></td>
                    <td><?php echo $row['chuc_vu']; ?></td>
                    <td><?php echo $row['phong_ban']; ?></td>
                    <td><?php echo $row['sdt']; ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="location.href='?page_layout=capnhatttnv&id=<?php echo $row['id']; ?>'">Cập nhật</button>
                        <button class="btn btn-danger" onclick="location.href='?page_layout=xulyxoa&id=<?php echo $row['id']; ?>'">Xóa</button>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>
    </div>
</body>

</html>