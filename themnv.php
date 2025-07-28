<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
                width: 100%;
            }
        .input {
            border: 2px solid black;
            padding: 10px;
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

    <caption>Thêm nhân viên</caption>
    <form class="input" method="POST" action="xulythem.php" enctype="multipart/form-data">
        <p>Họ và tên:</p> <input type="text" name="ho_ten" required><br><br>
        <p>Ngày sinh:</p> <input type="date" name="ngay_sinh" required><br><br>
        <p>Giới tính:</p>
        <select name="gioi_tinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>
        <p>Email:</p> <input type="email" name="email" required><br><br>
        <p>SĐT:</p> <input type="text" name="sdt" required><br><br>

        <p>Phòng ban:</p>
        <select name="phong_ban_id" required>
            <?php while ($pb = $phong_ban->fetch_assoc()): ?>
                <option value="<?= $pb['id'] ?>"><?= $pb['ten_phong'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <p>Chức vụ:</p>
        <select name="chuc_vu_id" required>
            <?php while ($cv = $chuc_vu->fetch_assoc()): ?>
                <option value="<?= $cv['id'] ?>"><?= $cv['ten_chuc_vu'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <p>Ảnh đại diện:</p>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <button type="submit">Thêm nhân viên</button>
    </form>
            </div>
</body>
</html>