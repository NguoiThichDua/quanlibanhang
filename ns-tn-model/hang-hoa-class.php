<?php
    $str1 = 'ns-tn-database/ket-noi-hang-hoa.php';
    $str2 = '../ns-tn-database/ket-noi-hang-hoa.php';
    $str3 = '../../../ns-tn-database/ket-noi-hang-hoa.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class hanghoaclass extends databaseHangHoa{

        # lấy tất cả hàng hóa
        public function LayTatCaHangHoa(){
            $hanghoa = $this->connect->prepare('SELECT * FROM hanghoa');
            $hanghoa->setFetchMode(PDO::FETCH_OBJ);
            $hanghoa->execute();
            $listhanghoa = $hanghoa->fetchAll();
            return $listhanghoa;
        }

         # tìm xem món hàng đó đã thêm vào đơn hàng chưa
         public function TimHangHoaDaThem($mahanghoa , $madonhang){
            $check = $this->connect->prepare("SELECT * FROM chitiethanghoadonhang WHERE mahanghoa =? AND madonhang = ?");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check -> execute(array($mahanghoa, $madonhang));
            $count = count($check->fetchAll());
            return $count;
        }
    }
?>