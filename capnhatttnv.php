<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .input {
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
    <?php
        include('connect.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT nv.id, nv.ho_ten, nv.email, nv.ngay_sinh, nv.gioi_tinh, nv.sdt, cv.ten_chuc_vu, pb.ten_phong FROM nhan_vien nv LEFT JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id LEFT JOIN phong_ban pb ON nv.phong_ban_id = pb.id WHERE nv.id = '$id'";
            $phong_ban = $conn->query("SELECT * FROM phong_ban");
            $chuc_vu = $conn->query("SELECT * FROM chuc_vu");
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result); 
        }
    ?>

    <caption>Cập nhật thông tin nhân viên</caption>
    <form class="input" method="POST" action="xulycapnhat.php?id=<?php echo $row['id']; ?>">
        <p>Họ và tên:</p> <input type="text" name="ho_ten" value="<?php echo $row['ho_ten']; ?>" required><br><br>
        <p>Ngày sinh:</p> <input type="date" name="ngay_sinh" value="<?php echo $row['ngay_sinh']; ?>" required><br><br>
        <p>Giới tính:</p>
        <select name="gioi_tinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>
        <p>Email:</p> <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <p>SĐT:</p> <input type="text" name="sdt" value="<?php echo $row['sdt']; ?>" required><br><br>

        <p>Phòng ban:</p>
        <select name="phong_ban_id" value="<?php echo $row['$phong_ban']; ?>" required>
            <?php while ($pb = $phong_ban->fetch_assoc()): ?>
                <option value="<?= $pb['id'] ?>"><?= $pb['ten_phong'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <p>Chức vụ:</p>
        <select name="chuc_vu_id" value="<?php echo $row['ten_chuc_vu']; ?>" required>
            <?php while ($cv = $chuc_vu->fetch_assoc()): ?>
                <option value="<?= $cv['id'] ?>"><?= $cv['ten_chuc_vu'] ?></option>
            <?php endwhile; ?>
        </select><br><br>
        <button type="submit">Cập nhật thông tin</button>
    </form>
        </div>
</body>
</html>