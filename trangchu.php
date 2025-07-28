<?php
    session_start();
        if(!isset($_SESSION["username"])){
        header('location: login.php');
        }
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
        background-color: gray;
        width: 100%;
        height: 100%;
    }

    .navbar-brand {
        margin-left: 30px;
    }

    .navbar-nav {
        margin: 5px 0px 5px 500px;
    }

    .navbar-nav li {
        margin-left: 15px;
        margin-right: 15px;
    }


    .container {
        margin: 10px 0px 0px 10px;
    }
</style>

<body>
    <div class="navbar navbar-expand bg-body-tertiary" style="border-bottom: 1px solid grey">
        <img class="navbar-brand" src="OIP.jpg" style="width:60px; margin-top: 0; margin-bottom:0;">
        <div class="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                </li>
                <li class="nav-item">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </li>
                <li class="nav-item">
                    <div class="image_user">
                        <img src="#" style="margin-right: 20px; border-radius: 50%;">
                        <span>Name User</span>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 5px;"></i>
                        <a href="?page_layout=dangxuat" style="color:black; text-decoration:none;">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-flex" style="height: 100vh;border-bottom:1px solid black;">
        <!-- Menu dọc -->
        <ul class="nav flex-column bg-white p-3 bg-body-tertiary" style="width: 300px">
            <li class="nav-item">
                <a class="nav-link active text-black" href="#"><i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i>Trang chủ</a>
            </li>
            <li class="nav-item" style="margin-left: 15px;">
                <a class="d-block text-black text-decoration-none" data-bs-toggle="collapse" href="#submenuNhanVien" role="button" aria-expanded="false" aria-controls="submenuNhanVien"><i class="fa fa-user" aria-hidden="true" style="margin-right: 10px;"></i> Nhân viên
                </a>
                <div class="collapse ps-3" id="submenuNhanVien">
                    <a class="d-block text-black text-decoration-none py-1" href="#">Phòng ban</a>
                    <a class="d-block text-black text-decoration-none py-1" href="#">Chức vụ</a>
                    <a class="d-block text-black text-decoration-none py-1" href="#">Trình độ</a>
                    <a class="d-block text-black text-decoration-none py-1" href="#">Thêm mới nhân viên</a>
                    <a class="d-block text-black text-decoration-none py-1" href="?page_layout=dsnv">Danh sách nhân viên</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="#"><i class="fa fa-star" aria-hidden="true" style="margin-right: 10px;"></i>Khen thưởng - Kỷ luật</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="#"><i class="fa fa-money" aria-hidden="true" style="margin-right: 10px;"></i>Bảng lương</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="#"><i class="fa fa-check-square-o" aria-hidden="true" style="margin-right: 10px;"></i>Bảng chấm công</a>
            </li>
        </ul>

        
    </div>
</body>

</html>
<?php
    if(isset($_GET['page_layout'])) {
        switch($_GET['page_layout']) {
            case 'dsnv':
                include('dsnv.php');
                break;
            case 'ttnv':
                include('ttnv.php');
                break;
            case 'capnhatttnv':
                include('capnhatttnv.php');
                break;
            case 'xulyxoa':
                include('xulyxoa.php');
                break;
            case 'dangxuat':
                session_destroy();
                session_unset();
                header('location: login.php');
                break;
        }
    }
?>