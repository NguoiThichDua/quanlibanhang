<?php
    $str1 = 'ns-tn-database/ket-noi-admin.php';
    $str2 = '../ns-tn-database/ket-noi-admin.php';
    $str3 = '../../../ns-tn-database/ket-noi-admin.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class adminclass extends databaseAdmin{
        
        # Kiểm tra đăng nhập
        public function CheckDangNhap($tentaikhoan, $matkhau){
            $check = $this->connect->prepare("SELECT * FROM admin WHERE tentaikhoan=? AND matkhau=?");
            $check->setFetchMode(PDO::FETCH_OBJ);
            $check->execute(array($tentaikhoan, $matkhau));
            $list = $check->fetch();
            
            if($list != NULL){
                return $list->kieuadmin;
            }
            else{
                return NULL;
            }
        }
    }
?>