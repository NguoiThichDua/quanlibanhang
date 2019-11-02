<?php
    $str1 = 'ns-tn-database/ket-noi-nha-phan-phoi.php';
    $str2 = '../ns-tn-database/ket-noi-nha-phan-phoi.php';
    $str3 = '../../../ns-tn-database/ket-noi-nha-phan-phoi.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class nhaphanphoiclass extends databaseNhaPhanPhoi{
         # lấy tất cả nhà phân phối lâu năm
         public function LayTatCaNhaPhanPhoiLauNam(){
            $khachhang = $this->connect->prepare('SELECT * FROM khachhang WHERE khachhang.loaikhachhang = "khachlaunam"');
            $khachhang->setFetchMode(PDO::FETCH_OBJ);
            $khachhang->execute();
            $listkhachhang = $khachhang->fetchAll();
            return $listkhachhang;
        }

        # thêm một nhà phân phối mới và cửa hàng nếu có
        public function ThemNhaPhanPhoiVaCuaHang($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $ngaytao){
            $cauLenh = 'INSERT INTO khachhang (hovaten, sodienthoai, cmnd, diachi, capbac, tructhuoc, mahopdong, macuahang, hethongnhaphanphoi, loaikhachhang, maadmin, ngaytao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $ngaytao));
        }
    }
?>