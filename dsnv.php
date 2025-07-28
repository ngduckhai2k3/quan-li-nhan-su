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
</head>
<style>
    .table {
        width: 1100px;
        margin: 0px 0px 0px 350px;
        border: 1px solid red;
    }
    td, th {
        border: 1px solid black;
        text-align: center;
        padding: 10px;
    }
    .delete {
        background-color: red;
        padding: 5px;
        text-decoration: none;
        color: white;
    }
    .update {
        background-color: blue;
        padding: 5px;
        text-decoration: none;
        color: white;
    }
    </style>
<body>
    <table class="table table-bordered border-primary">
        <tr>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Chức vụ</th>
            <th>Phòng ban</th>
            <th>Số điện thoại</th>
            <th>Chức năng</th>
        </tr>
        <?php
                include('connect.php');
                $sql = "SELECT nv.id, nv.ho_ten, nv.ngay_sinh, nv.gioi_tinh, nv.sdt, cv.ten_chuc_vu, pb.ten_phong FROM nhan_vien nv LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id LEFT JOIN phong_ban pb ON nv.phong_ban_id = pb.id";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['ho_ten']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])); ?></td>
                <td><?php echo $row['gioi_tinh']; ?></td>
                <td><?php echo $row['ten_chuc_vu']; ?></td>
                <td><?php echo $row['ten_phong']; ?></td>
                <td><?php echo $row['sdt']; ?></td>
                <td>
                    <a class='delete' href="?page_layout=xulyxoa&id=<?php echo $row['id']; ?>">Xoá</a>
                    <a class='update' href="?page_layout=capnhatttnv&id=<?php echo $row['id']; ?>">Cập nhật</a>
                </td>
            </tr>
            <?php
                }
            ?>
    </table>
</body>

</html>