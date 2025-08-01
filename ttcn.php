<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
        .caption {
            font-weight: bold;
            text-align: center;
            font-size: 24px;
            padding-top:10px;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <?php
    include('connect.php');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $default_id = '1';  
    $id = isset($_GET['id']) && $_GET['id'] !== '' ? $_GET['id'] : $default_id;
    $sql = "SELECT * FROM nhan_vien WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;
        
    ?>  
        <form method="GET" action="trangchu.php">
            <div class="input-group mb-3" style="width: 50%">
                <input type="text" class="form-control" id="idInput" name="id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>" placeholder="Vui lòng nhập ID nhân viên" aria-label="Recipient’s username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
            </div>
        </form>
        <script>
            window.onload = function () {
                const input = document.getElementById('idInput');
                if (!input.value) {
                    input.value = '1';
                }
            }
        </script>
        <div style="border: 3px solid #ccc; padding: 20px;border-radius: 5px;width: 80%;">
            <div class="title">
                <p class="caption" style="font-size: 20px">Thông tin cá nhân</p>
            </div>
            <div class="info">
                <div class="avatar" style="margin-right: 80px;"> 
                    <span>Ảnh đại diện</span> <br>
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
                    <span>Chức vụ:</span> <?php echo $row['chuc_vu']; ?> <br>
                    <span>Phòng ban:</span> <?php echo $row['phong_ban']; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>