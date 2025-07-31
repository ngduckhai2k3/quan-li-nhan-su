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
        .input {
            padding: 10px;
        }
        .container {
            width: 90%;
            border-radius: 5px;
            border: 2px solid #ccc;
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
    <?php
        include('connect.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM nhan_vien WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result); 
        }
    ?>

<div class="container">
    <?php
    $conn = new mysqli("localhost", "root", "", "qlns");
    ?>
        <div class="title">
            <p class="caption">Cập nhật thông tin nhân viên</p>
        </div>
        <div class="form">
            <form class="input" method="POST" action="xulycapnhat.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="ho_ten" class="form-control" value="<?php echo $row['ho_ten']; ?>" id="floatingInput" placeholder="Họ và tên" required>
                    <label for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="ngay_sinh" class="form-control" value="<?php echo $row['ngay_sinh'];?>" id="floatingInput" required>
                    <label for="floatingInput">Ngày sinh</label>
                </div>
                <div style="margin-left: 20px;">
                    <p>Giới tính:</p>
                    <div style="display:flex; gap: 20px; margin-bottom: 10px;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="radioDefault1" value="Nam" <?php if ($row['gioi_tinh'] == 'Nam') echo 'checked'; ?>>
                            <label class="form-check-label" for="radioDefault1">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="radioDefault2" value="Nữ" <?php if ($row['gioi_tinh'] == 'Nữ') echo 'checked'; ?>>
                            <label class="form-check-label" for="radioDefault2">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" id="floatingInput" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sdt" class="form-control" value="<?php echo $row['sdt']; ?>" id="floatingInput" required>
                    <label for="floatingInput">Số điện thoại</label>
                </div>

                <div class="select" style="display: flex;">
                    <div style="margin-right: 20px;">
                        <p style="margin-left: 20px">Phòng ban:</p>
                        <select name="phong_ban" class="form-select" required>
                            <option value="Kỹ thuật" <?php if($row['phong_ban'] == 'Kỹ thuật') echo 'selected'; ?>>Kỹ thuật</option>
                            <option value="Hành chính - Nhân sự" <?php if($row['phong_ban'] == 'Hành chính - Nhân sự') echo 'selected'; ?>>Hành chính - Nhân sự</option>
                            <option value="Kế toán" <?php if($row['phong_ban'] == 'Kế toán') echo 'selected'; ?>>Kế toán</option>
                            <option value="Kinh doanh" <?php if($row['phong_ban'] == 'Kinh doanh') echo 'selected'; ?>>Kinh doanh</option>
                            <option value="Sản xuất" <?php if($row['phong_ban'] == 'Sản xuất') echo 'selected'; ?>>Sản xuất</option>
                            <option value="Marketing" <?php if($row['phong_ban'] == 'Marketing') echo 'selected'; ?>>Marketing</option>
                        </select>
                    </div>
                    <div style="margin-left: 20px;">
                        <p style="margin-left: 20px">Chức vụ:</p>
                        <select name="chuc_vu" class="form-select" required>
                            <option value="Giám đốc" <?php if($row['chuc_vu'] == 'Giám đốc') echo 'selected'; ?>>Giám đốc</option>
                            <option value="Trưởng phòng" <?php if($row['chuc_vu'] == 'Trưởng phòng') echo 'selected'; ?>>Trưởng phòng</option>
                            <option value="Nhân viên" <?php if($row['chuc_vu'] == 'Nhân viên') echo 'selected'; ?>>Nhân viên</option>
                            <option value="Chuyên viên" <?php if($row['chuc_vu'] == 'Chuyên viên') echo 'selected'; ?>>Chuyên viên</option>
                            <option value="Thực tập sinh" <?php if($row['chuc_vu'] == 'Thực tập sinh') echo 'selected'; ?>>Thực tập sinh</option>
                            <option value="Phó phòng" <?php if($row['chuc_vu'] == 'Phó phòng') echo 'selected'; ?>>Phó phòng</option>
                        </select>
                    </div>
                </div> <br>
                <div class="input-group" style="width: 50%;">
                <input type="file" class="form-control" name="fileToUpload" value="<?php echo $row['anh_dai_dien']; ?>" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Ảnh đại diện</button>
                </div><br>
                <button type="submit" class="btn btn-outline-primary">Cập nhật thông tin nhân viên</button>
            </form>
        </div>
    </div>
</body>
</html>