<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style.css">
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
    <div class="container">
    <?php
    $conn = new mysqli("localhost", "root", "", "qldn");

    // Lấy danh sách phòng ban & chức vụ để hiển thị
    $phong_ban = $conn->query("SELECT * FROM phong_ban");
    $chuc_vu = $conn->query("SELECT * FROM chuc_vu");
    ?>
        <div class="title">
            <p class="caption">Thêm nhân viên</p>
        </div>
        <div class="form">
            <form class="input" method="POST" action="xulythem.php" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="ho_ten" class="form-control" id="floatingInput" placeholder="Họ và tên" required>
                    <label for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="ngay_sinh" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">Ngày sinh</label>
                </div>
                <div style="margin-left: 20px;">
                    <p>Giới tính:</p>
                    <div style="display:flex; gap: 20px; margin-bottom: 10px;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="radioDefault1" value="Nam" checked>
                            <label class="form-check-label" for="radioDefault1">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="radioDefault2" value="Nữ" checked>
                            <label class="form-check-label" for="radioDefault2">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sdt" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">Số điện thoại</label>
                </div>

                <div class="select" style="display: flex;">
                    <div style="margin-right: 20px;">
                        <p style="margin-left: 20px">Phòng ban:</p>
                        <select name="phong_ban_id" required>
                            <?php while ($pb = $phong_ban->fetch_assoc()): ?>
                                <option value="<?= $pb['id'] ?>"><?= $pb['ten_phong'] ?></option>
                            <?php endwhile; ?>
                        </select><br><br>
                    </div>
                    <div style="margin-left: 20px;">
                        <p style="margin-left: 20px">Chức vụ:</p>
                        <select name="chuc_vu_id" required>
                            <?php while ($cv = $chuc_vu->fetch_assoc()): ?>
                                <option value="<?= $cv['id'] ?>"><?= $cv['ten_chuc_vu'] ?></option>
                            <?php endwhile; ?>
                        </select><br><br>
                    </div>
                </div>
                <p style="margin-left: 20px">Ảnh đại diện:</p>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

                <button type="button" class="btn btn-outline-primary">Thêm nhân viên</button>
            </form>
        </div>
    </div>
</body>
</html>