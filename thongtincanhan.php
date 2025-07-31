<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style.css">
    <style>
        .info {
            display: flex;
            margin-top: 20px;
            margin-left: 20px;
        }
        span {
            font-weight: bold;
        }
        .noidung {
            margin-left: 20px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <?php
    include('connect.php');
    $default_id = '1';  
    $id = isset($_GET['idnv']) ? $_GET['idnv'] : $default_id;
    if (isset($_GET['idnv'])) {
        $sql = "SELECT nv.*, cv.ten_chuc_vu, pb.ten_phong
            FROM nhan_vien nv
            LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id
            LEFT JOIN phong_ban pb ON nv.phong_ban_id = pb.id
            WHERE nv.id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); 
        header('location: trangchu.php?page_layout=ttcn'); 
        }
        $sql = "SELECT nv.*, cv.ten_chuc_vu, pb.ten_phong
            FROM nhan_vien nv
            LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id
            LEFT JOIN phong_ban pb ON nv.phong_ban_id = pb.id
            WHERE nv.id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); 
    ?>
        <form method="GET" action="">
            <div class="input-group mb-3" style="width: 50%">
                <input type="text" class="form-control" name="idnv" placeholder="Vui lòng nhập ID nhân viên" aria-label="Recipient’s username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
            </div>
        </form>
        <div style="border: 1px solid #ccc; padding: 20px;border-radius: 5px;width: 80%;">
            <div class="title">
                <p style="font-size: 20px">Thông tin cá nhân</p>
            </div>
            <div class="info">
                <div class="avatar" style="margin-right: 80px;"> 
                    <p>Ảnh đại diện</p>
                    <img src="<?php echo $row['anh_dai_dien']; ?>" class="img-thumbnail" alt="Avatar" style="width: 300px">
                </div>
                <div class="noidung">
                    <span>Họ và tên:</span> <?php echo $row['ho_ten']; ?> <br>
                    <span>Ngày sinh:</span> <?php echo date('d/m/Y', strtotime($row['ngay_sinh'])); ?> <br>
                    <span>Giới tính:</span> <?php echo $row['gioi_tinh']; ?> <br>
                    <span>Số điện thoại:</span> <?php echo $row['sdt']; ?>
                </div>
                <div class="noidung">
                    <span>Email:</span> <?php echo $row['email']; ?> <br>
                    <span>Chức vụ:</span> <?php echo $row['ten_chuc_vu']; ?> <br>
                    <span>Phòng ban:</span> <?php echo $row['ten_phong']; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>