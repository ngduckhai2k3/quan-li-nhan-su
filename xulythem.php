
<?php
    include('connect.php');
    if(! empty($_POST['ho_ten'])
        && !empty($_POST['ngay_sinh'])
        && !empty($_POST['gioi_tinh'])
        && !empty($_POST['email'])
        && !empty($_POST['sdt'])
        && !empty($_POST['phong_ban'])
        && !empty($_POST['chuc_vu'])
    ){
        $hoten = $_POST['ho_ten'];
        $ngaysinh = $_POST['ngay_sinh'];
        $gioitinh = $_POST['gioi_tinh'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $phongban = $_POST['phong_ban'];
        $chucvu = $_POST['chuc_vu'];
        
             #Bắt đầu xử lý thêm ảnh
            // Xử lý ảnh
            $target_dir = "avatar/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Kiểm tra xem file ảnh có hợp lệ không
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
            }
    
            // Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                echo "File này đã tồn tại trên hệ thống";
                $uploadOk = 2;
            }
    
            // Kiểm tra kích thước file
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "File quá lớn";
                $uploadOk = 0;
            }
    
            // Cho phép các định dạng file ảnh nhất định
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                $uploadOk = 0;
            }

            #Kết thúc xử lý ảnh
            if($uploadOk == 0){
                echo "File của bạn chưa được tải lên";
            }
            else{
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                $sql = "INSERT INTO `nhan_vien`(`ho_ten`, `ngay_sinh`, `gioi_tinh`, `email`, `sdt`, `phong_ban`, `chuc_vu`,`anh_dai_dien`) VALUES ('$hoten','$ngaysinh','$gioitinh', '$email', '$sdt', '$phongban', '$chucvu', '$target_file')";
                // echo $sql;
                mysqli_query($conn, $sql);
                header('location: trangchu.php?page_layout=dsnv');
            }
        
    }
?>