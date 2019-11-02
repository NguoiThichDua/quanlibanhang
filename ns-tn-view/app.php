<?php
    session_start();
    if(isset($_SESSION['admin'])){
        
        require "ns-tn-view/ns-tn-include/logo.php";
        require "ns-tn-view/ns-tn-include/message.php";

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            switch ($page) {
                case 'quanli':
                    require "ns-tn-quan-li/index.php";
                break;
                case 'quanlinhaphanphoi':
                    require "ns-tn-quan-li/ns-tn-nha-phan-phoi/index.php";
                break;
                case 'taomoinhaphanphoi':
                    require "ns-tn-quan-li/ns-tn-nha-phan-phoi/taomoinhaphanphoi.php";
                break;
                
                default:
                    # code...
                break;
            }
        }else{
            require "ns-tn-quan-li/index.php";
        }
    }else {
        require "ns-tn-dang-nhap/index.php";
    }
?>