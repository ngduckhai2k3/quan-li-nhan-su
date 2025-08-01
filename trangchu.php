<?php
    session_start();
        if(!isset($_SESSION["username"])){
        header('location: login.php');
        }
        include('connect.php');
        $username = $_SESSION["username"];
        $sql = "SELECT nv.anh_dai_dien FROM nhan_vien nv JOIN nguoi_dung nd ON nv.id = nhan_vien_id WHERE nd.ten_dang_nhap = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
?>
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</head>
<style>
    body {
        width: 100%;
        height: 100%;
    }

    .navbar-brand {
        margin-left: 30px;
    }
    .navbar {
        height: 60px;
        background: linear-gradient(rgb(48, 48, 48));
    }
    .navbar-nav {
        margin: 5px 0px 5px 120px;
        color: white;
    }

    .navbar-nav li {
        margin-left: 15px;
        margin-right: 15px;
    }

    .footer {
        position: fixed;
        bottom: 0px;
        width: 100%;
        height: 12vh;
        background: linear-gradient(rgb(48, 48, 48));
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid grey;
    }

</style>

<body>
    <div class="navbar navbar-expand bg-body-tertiary" style="border-bottom: 1px solid grey">
        <img class="navbar-brand" src="logo_cti\OIP.jpg" style="width:60px; margin-top: 0; margin-bottom:0;">
        <div class="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-right: 10px; width: 100vh;">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" style="background-color:rgb(108, 108, 108);" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-sm btn-outline-secondary" type="submit" style="">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                </li>
                <li class="nav-item">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </li>
                <li class="nav-item" style="display:flex">
                    <div class="image_user">
                        <img src="<?php echo $row['anh_dai_dien']; ?>" style="width: 20px; margin-right: 10px; border-radius: 50%;">
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" style="height:35px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><?php echo $username; ?></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Trang chủ</button></li>
                            <li><button class="dropdown-item" type="button">Cài đặt</button></li>
                            <li><button class="dropdown-item" type="button">Hỗ trợ</button></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 10px; margin-top:12px"></i>
                        <a href="?page_layout=dangxuat" style="color:white; text-decoration:none;">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-flex" style="height: 80vh; overflow: hidden;">
        <div style="width: 20%">
              <!-- Menu dọc -->
            <ul class="nav flex-column bg-white p-3 bg-body-tertiary" style="width: 250px; height: 100%;background: linear-gradient(rgb(48, 48, 48));">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="?page_layout=trangchu"><i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i>Trang chủ</a>
                </li>
                <li class="nav-item" style="margin-left: 15px;">
                    <a class="d-block text-white text-decoration-none" data-bs-toggle="collapse" href="#submenuNhanVien" role="button" aria-expanded="false" aria-controls="submenuNhanVien"><i class="fa fa-user" aria-hidden="true" style="margin-right: 10px;"></i> Nhân viên
                    </a>
                    <div class="collapse ps-3" id="submenuNhanVien">
                        <a class="d-block text-white text-decoration-none py-1" href="?page_layout=ttcn">Thông tin cá nhân</a>
                        <a class="d-block text-white text-decoration-none py-1" href="?page_layout=phongban">Phòng ban</a>
                        <a class="d-block text-white text-decoration-none py-1" href="?page_layout=dsnv">Danh sách nhân viên</a>
                        <a class="d-block text-white text-decoration-none py-1" href="?page_layout=themnv">Thêm mới nhân viên</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page_layout=ktkl"><i class="fa fa-star" aria-hidden="true" style="margin-right: 10px;"></i>Khen thưởng - Kỷ luật</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page_layout=bangluong"><i class="fa fa-money" aria-hidden="true" style="margin-right: 10px;"></i>Bảng lương</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page_layout=bcc"><i class="fa fa-check-square-o" aria-hidden="true" style="margin-right: 10px;"></i>Bảng chấm công</a>
                </li>
            </ul>
        </div>
        <div style="width: 80%; overflow-x:auto">
            <?php
                if(isset($_GET['page_layout'])) {
                    switch($_GET['page_layout']) {
                        case 'dsnv':
                            include('dsnv.php');
                            break;
                        case 'ttcn':
                            include('ttcn.php');
                            break;
                        case 'themnv':
                            include('themnv.php');
                            break;
                        case 'capnhatttnv':
                            include('capnhatttnv.php');
                            break;
                        case 'xulyxoa':
                            include('xulyxoa.php');
                            break;
                        case 'bcc':
                            include('bcc.php');
                            break;
                        case 'bangluong':
                            include('bangluong.php');
                            break;
                        case 'phongban':
                            include('phongban.php');
                            break;
                        case 'ktkl':
                            include('khenthuong_kyluat.php');
                            break;
                        case 'dangxuat':
                            session_destroy();
                            session_unset();
                            header('location: login.php');
                            break;
                    }
                }
            ?>
        </div>      
    </div>
    <div class="footer">
        <p style="color:white">Nhóm thực hiện: 5
            <br>Thành viên thực hiện: Nguyễn Đức Khải - Bùi Thế Linh - Nguyễn Hoài Nam
        </p>
    </div>
</body>

</html>
<?php
ob_end_flush();
?>
