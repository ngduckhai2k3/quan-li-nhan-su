<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .input {
            padding: 10px;
        }
        .container {
            width: 90%;
            border-radius: 5px;
            border: 3px solid #ccc;
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
    $conn = new mysqli("localhost", "root", "", "qlns");
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
                        <select name="phong_ban" class="form-select" required>
                            <option value="Kỹ thuật">Kỹ thuật</option>
                            <option value="Hành chính - Nhân sự">Hành chính - Nhân sự</option>
                            <option value="Kế toán">Kế toán</option>
                            <option value="Kinh doanh">Phòng Kinh doanh</option>
                            <option value="Sản xuất">Sản xuất</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                    <div style="margin-left: 20px;">
                        <p style="margin-left: 20px">Chức vụ:</p>
                        <select name="chuc_vu" class="form-select" required>
                            <option value="Giám đốc">Giám đốc</option>
                            <option value="Trưởng phòng">Trưởng phòng</option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Chuyên viên">Chuyên viên</option>
                            <option value="Thực tập sinh">Thực tập sinh</option>
                            <option value="Phó phòng">Phó phòng</option>
                        </select>
                    </div>
                </div> <br>
                <div class="input-group" style="width: 50%;">
                <input type="file" class="form-control" name="fileToUpload" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Ảnh đại diện</button>
                </div><br>
                <button type="submit" class="btn btn-outline-primary">Thêm nhân viên</button>
            </form>
        </div>
    </div>
</body>
</html>