<?php
    ob_start();
    session_start();

    require "../ns-tn-model/nha-phan-phoi-class.php"; 
    require "../ns-tn-model/admin-class.php";     

    if(isset($_GET["yeucau"])){
        $yeucau = $_GET["yeucau"];

        switch ($yeucau) {
            case 'themnhaphanphoi':
                # nhận các thông tin được post qua có đầy đủ không
                if(isset($_POST['hovaten']) && isset($_POST['sodienthoai']) && isset($_POST['diachi']) && isset($_POST['cmnd']) && isset($_POST['tructhuoc']) && isset($_POST['capbac'])){
                    # gán giá trị
                    $hovaten = trim($_POST['hovaten']);
                    $sodienthoai = trim($_POST['sodienthoai']);
                    $diachi = trim($_POST['diachi']);
                    $cmnd = trim($_POST['cmnd']);
                    $tructhuoc = trim($_POST['tructhuoc']);
                    $capbac = trim($_POST['capbac']);

                    # kiểm tra dữ liệu rỗng
                    if(strlen($hovaten) <= 0 || strlen($sodienthoai) <= 0 || strlen($diachi) <= 0 || strlen($cmnd) <= 0 || strlen($tructhuoc) <= 0 || strlen($capbac) <= 0){
                        header("Location: ../index.php?page=taomoinhaphanphoi&ketqua=thongtinrong");
                    }else if(isset($_POST['mahopdong']) || isset($_POST['macuahang']) || isset($_POST['hethongnhaphanphoi'])){
                        # nếu những thông tin này được post qua tiến hành thêm những thông tin này luôn
                        $mahopdong = trim($_POST['mahopdong']);
                        $macuahang = trim($_POST['macuahang']);
                        $hethongnhaphanphoi = trim($_POST['hethongnhaphanphoi']);

                        $loaikhachhang = 'khachlaunam';
                        $ngaytao = date("Y-m-d");

                        if(isset($_SESSION['admin'])){
                            $tentaikhoan = $_SESSION['admin'];

                            # lấy mã admin
                            $admin = new adminClass();
                            $thongtin = $admin->LayThongTinAdminBangTen($tentaikhoan);
                            $maadmin = $thongtin->maadmin;

                            # thêm mới khi biết mã admin
                            $nhaphanphoi = new nhaphanphoiclass();
                            $nhaphanphoi->ThemNhaPhanPhoiVaCuaHang($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $ngaytao);
                            header("Location: ../index.php?page=quanlinhaphanphoi&ketqua=themthanhcong");
                        }else{
                            # thêm mới khi không lấy được thông tin admin
                            $nhaphanphoi = new nhaphanphoiclass();
                            $nhaphanphoi->ThemNhaPhanPhoiVaCuaHang($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, 999 , $ngaytao);
                            header("Location: ../index.php?page=quanlinhaphanphoi&ketqua=themthanhcong");
                        }
                    }else{
                        # thêm nhà phân phối mà không cần 3 thông tin trên
                    }
                }
            break;
            default:
                # code...
                break;
        }
    }else{
        header("Location: ../index.php?page=taomoinhaphanphoi&ketqua=yeucaukhongxacdinh");
    }
    ob_end_flush();
?>