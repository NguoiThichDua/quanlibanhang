<?php
    require "ns-tn-model/nha-phan-phoi-class.php";
    require "ns-tn-model/admin-class.php";

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
                <a href="index.php?page=taomoinhaphanphoi" class="btn btn-success">Tạo mới nhà phân phối</a>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <table class="table table-hover table-bordered table-light text-center">
                    <thead>
                        <tr>
                            <th scope="col" colspan="8">TẤT CẢ NHÀ PHÂN PHỐI</th>
                           
                        </tr>
                        <tr class="bg-browns text-light">
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">CMND</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Cấp bậc</th>
                            <th scope="col">Trực thuộc</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $nhaphanphoi = new nhaphanphoiclass();
                        $thongtin = $nhaphanphoi->LayTatCaNhaPhanPhoiLauNam();
                        $stt = 1;

                       
                        foreach ($thongtin as $tt) {
                            $admin = new adminclass();
                            $thongtinadmin = $admin->LayThongTinAdminBangMa($tt->maadmin);
                    ?>
                        <tr>
                            <th scope="row"><?php echo $stt++; ?></th>
                            <td><?php echo $tt->hovaten ?></td>
                            <td><?php echo $tt->sodienthoai; ?></td>
                            <td><?php echo $tt->cmnd; ?></td>
                            <td><?php echo $tt->diachi; ?></td>
                            <td>
                            <?php 
                                 if($tt->capbac == 'le') echo 'Khách lẻ'; 
                                 else if($tt->capbac == 'si') echo 'Khách sĩ';
                                 else if($tt->capbac == 'chinhanh') echo 'Chi nhánh';  
                                 else if($tt->capbac == 'daili') echo 'Đại lí'; 
                                 else if($tt->capbac == 'tongdaili') echo 'Tổng đại lí'; 
                                 else if($tt->capbac == 'nhaphanphoi') echo 'Nhà phân phối';
                                 else if($tt->capbac == 'nhaphanphoivang') echo 'Nhà phân phối vàng';
                                 else if($tt->capbac == 'nhaphanphoikimcuong') echo 'Nhà phân phối kim cương';
                                 else if($tt->capbac == 'giamdockinhdoanh') echo 'Giám đốc kinh doanh';
                                  
                            ?>
                            </td>
                            <td><?php echo $tt->tructhuoc; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="XemThemThongTin('<?php echo $tt->hovaten ?>','<?php echo $tt->mahopdong;?>', '<?php echo $tt->macuahang;?>', '<?php echo $tt->hethongnhaphanphoi;?>', '<?php echo $tt->danghi;?>', '<?php echo $thongtinadmin->hovaten;?>','<?php echo $tt->ngaytao;?>')">Xem Thêm</button>
                                <button class="btn btn-warning">Sửa</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
                Lỗi... Không tìm thấy thông tin tài khoản admin...!
            </div>
        <?php
    }

    # gọi modal xem thêm thông tin nhà phân phối
    require "modal/modal-xem-thong-tin.php"
?>


