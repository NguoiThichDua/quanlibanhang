<?php
    $str1 = 'ns-tn-database/ket-noi-don-hang.php';
    $str2 = '../ns-tn-database/ket-noi-don-hang.php';
    $str3 = '../../../ns-tn-database/ket-noi-don-hang.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class donhangclass extends databaseDonHang{
        # thêm một đơn hàng mới
        public function ThemNhaPhanPhoiVaCuaHang($mabill, $ngaytao, $makhachhang, $ghichu, $maadmin){
            $cauLenh = 'INSERT INTO donhang (mabill, ngaytao, makhachhang, ghichu, maadmin) VALUES (?,?,?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($mabill, $ngaytao, $makhachhang,$ghichu, $maadmin));
        }

        # lấy mã đơn hàng đang thêm cho khách hàng
        public function LayDonHang($makhachhang){
            $donhangcho = $this->connect->prepare("SELECT MAX(dh.madonhang) AS MAX FROM donhang dh, khachhang kh WHERE dh.makhachhang = kh.makhachhang AND dh.makhachhang = ?");
			$donhangcho->setFetchMode(PDO::FETCH_OBJ);
			$donhangcho->execute(array($makhachhang));
			$list = $donhangcho->fetch(); 
			return $list;
        }

        # xóa các hàng hóa trong đơn hàng
        public function XoaHangHoaTrongDonHang($makhachhang , $madonhang){
            # xóa các món hàng trong chi tiet hàng hóa
            $cauLenh = 'DELETE chitiethanghoadonhang , donhang FROM chitiethanghoadonhang, donhang WHERE donhang.madonhang = chitiethanghoadonhang.madonhang AND donhang.makhachhang = ? AND donhang.madonhang = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($makhachhang, $madonhang));

            # sao đó xóa đơn hàng
            $cauLenh = 'DELETE FROM donhang WHERE donhang.madonhang = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($madonhang));
        }
    }
?>

