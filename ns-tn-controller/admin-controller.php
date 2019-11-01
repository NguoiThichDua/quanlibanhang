<?php
    ob_start();
    session_start();

    require "../ns-tn-model/admin-class.php";   

    if(isset($_GET["yeucau"])){
        $yeucau = $_GET["yeucau"];

        switch ($yeucau) {
            case 'dangxuat':
                # Thoát khỏi session khi đã đăng nhập
                session_destroy();
                header("Location: ../index.php");
            break;
            case 'dangnhap':
                if(isset($_POST["tentaikhoan"]) && isset($_POST["matkhau"])){
                   
                    # lấy user và pass được post qua
                    $tentaikhoan = $_POST["tentaikhoan"];
                    $matkhau = $_POST["matkhau"];

                    # mã hóa mật khẩu
                    $md5 = md5($matkhau, false);

                    # check đăng nhập xem phải là admin
                    $admin = new adminclass();
                    $revalue_admin = $admin->CheckDangNhap($tentaikhoan, $md5);

                    # trả về session nếu tên đăng nhập và mật khẩu chính xác
                    if($revalue_admin != NULL){
                        $_SESSION['admin'] = $tentaikhoan;

                        header("Location: ../index.php?page=quanli&ketqua=dangnhapthanhcong");
                    }else{
                        header("Location: ../index.php?ketqua=dangnhapthatbai");
                    }
                }else{
                    # nếu không nhận được tai khoan mat khau post qua
                    header("Location: ../index.php?ketqua=taikhoankhongxacdinh");
                }
            break;
            default:
                # code...
                break;
        }
    }else{
        header("Location: ../index.php?ketqua=yeucaukhongxacdinh");
    }
    ob_end_flush();
?>