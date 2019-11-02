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
            $khachhang = $this->connect->prepare('SELECT * FROM khachhang WHERE khachhang.loaikhachhang = "khachlaunam" ORDER BY khachhang.ngaytao DESC');
            $khachhang->setFetchMode(PDO::FETCH_OBJ);
            $khachhang->execute();
            $listkhachhang = $khachhang->fetchAll();
            return $listkhachhang;
        }

        # lấy thông tin của 1 tài khoản khách hàng bằng mã tài khoản
        public function LayThongTinKhachHangBangMa($makhachhang){
            $khachhang = $this->connect->prepare("SELECT * FROM khachhang  WHERE makhachhang=?");
			$khachhang->setFetchMode(PDO::FETCH_OBJ);
			$khachhang->execute(array($makhachhang));
			$list = $khachhang->fetch(); 
			return $list;
        }

        # thêm một nhà phân phối mới và cửa hàng nếu có
        public function ThemNhaPhanPhoiVaCuaHang($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $ngaytao){
            $cauLenh = 'INSERT INTO khachhang (hovaten, sodienthoai, cmnd, diachi, capbac, tructhuoc, mahopdong, macuahang, hethongnhaphanphoi, loaikhachhang, maadmin, ngaytao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $ngaytao));
        }

         # sửa một nhà phân phối mới và cửa hàng nếu có
         public function SuaNhaPhanPhoiVaCuaHang($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $danghi, $ngaysua, $maadminsua, $makhachhang){
            $cauLenh = ' UPDATE khachhang SET hovaten = ?, sodienthoai = ?, cmnd = ?, diachi = ?, capbac = ?, tructhuoc = ?, mahopdong = ?, macuahang = ?, hethongnhaphanphoi = ?, loaikhachhang = ?, maadmin = ?, danghi = ?, ngaysua = ? , maadminsua = ? WHERE khachhang.makhachhang = ?';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($hovaten, $sodienthoai, $cmnd, $diachi, $capbac, $tructhuoc, $mahopdong, $macuahang, $hethongnhaphanphoi, $loaikhachhang, $maadmin, $danghi, $ngaysua, $maadminsua, $makhachhang));
        }

        # tìm khách theo tên và số điện thoại
        public function TimNhaPhanPhoiTheoTenVaSoDienThoai($tenkhach, $sodienthoai){
            $khachhang = $this->connect->prepare(" SELECT * FROM khachhang WHERE hovaten like '%$tenkhach%' AND sodienthoai like '%$sodienthoai%' ORDER BY khachhang.ngaytao DESC");
            $khachhang->setFetchMode(PDO::FETCH_OBJ);
			$khachhang->execute(array($tenkhach,$sodienthoai));
			$list = $khachhang->fetchAll(); 
			return $list;
        }
       
       
    }
?>