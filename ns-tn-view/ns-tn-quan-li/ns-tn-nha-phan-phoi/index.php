<?php
    if(isset($_SESSION['admin'])){
        ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="position-absolute" style="z-index: 999; left: 10px">       
                    <a class="btn btn-outline-brown dangxuat rounded-pill" href="index.php">Trở Về</a>
                </div>
    
                <div class="text-center">
                    <h4><strong><b>Quản Lí Nhà Phân Phối</b></strong></h4>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center mt-3">
                <a href="index.php?page=taomoinhaphanphoi" class="btn btn-primary">Tạo mới nhà phân phối</a>
            </div>
        <?php
    }
    ?>
        