<?php
    session_start();
    if(isset($_SESSION['admin'])){
        if(isset($_GET['page'])){
            $page = $_GET['page'];

            require "ns-tn-view/ns-tn-include/logo.php";
            require "ns-tn-view/ns-tn-include/message.php";

            switch ($page) {
                case 'quanli':
                    require "ns-tn-quan-li/index.php";
                break;
                
                default:
                    # code...
                break;
            }
        }else{
            require "ns-tn-dang-nhap/index.php";
        }
    }else {
        require "ns-tn-dang-nhap/index.php";
    }
?>