<?php
    $str1 = 'ns-tn-database/ket-noi-xuat-kho.php';
    $str2 = '../ns-tn-database/ket-noi-xuat-kho.php';
    $str3 = '../../../ns-tn-database/ket-noi-xuat-kho.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class xuatkhoclass extends databaseXuatKho{
       
    }
?>