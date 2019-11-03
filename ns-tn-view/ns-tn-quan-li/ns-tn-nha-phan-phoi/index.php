<?php
    require "ns-tn-model/nha-phan-phoi-class.php";
    require "ns-tn-model/admin-class.php";

    # tìm thấy tài khoản admin đăng nhập
    if(isset($_SESSION['admin'])){
        ?>
            <!-- TITLE -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="position-absolute" style="z-index: 999; left: 10px">       
                    <a class="btn btn-outline-brown dangxuat rounded-pill" href="index.php">Trở Về</a>
                </div>
    
                <div class="text-center">
                    <h4><strong><b>Quản Lí Nhà Phân Phối</b></strong></h4>
                </div>
            </div>  <!-- END TITLE -->

            <div class="">
                <div class="row">
                    <!-- MENU -->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-center mt-3">
                        <a href="index.php?page=taomoinhaphanphoi" class=" btn btn-success">Tạo nhà phân phối</a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-center mt-3 ">
                        <button class=" btn btn-secondary text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Tìm nhà phân phối
                        </button>
                    </div>  <!-- END MENU -->
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <!-- TIM KIEM -->
                <div class="collapse card bg-custom" id="collapseExample">
                    <div class="card-header bg-browns text-light" style="border-radius: 30px 30px 0 0">
                        <h6><strong><b>Tìm kiếm</b></strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for=""><b>Nhập tên: </b></label>
                                <input type="text" id="tenkhachtim" onkeyup="TimKhachHang()" class="form-control rounded-pill">
                            </div>    
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for=""><b>Nhập số điện thoại: </b></label>
                                <input type="number" id="sodienthoaikhachtim" onkeyup="TimKhachHang()" class="form-control rounded-pill">
                            </div>  
                        </div>           
                    </div>
                </div>  <!-- END TIM KIEM -->
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <!-- TABLE -->
                <div class="table-responsive-lg" id="bangloc">
                    <!-- TABLE -->
                    <table class="table table-hover table-bordered table-sm table-light text-center">
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
                            <tr <?php if($tt->danghi == 'danghi') echo 'style="color: #D8D8D8 "' ?>>
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
                                    <a href="index.php?page=suanhaphanphoi&id=<?php echo $tt->makhachhang; ?>" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xemthongtinchitiet" onclick="XemThemThongTin('<?php echo $tt->hovaten ?>','<?php echo $tt->mahopdong;?>', '<?php echo $tt->macuahang;?>', '<?php echo $tt->hethongnhaphanphoi;?>', '<?php echo $tt->danghi;?>', '<?php echo $thongtinadmin->hovaten;?>','<?php echo $tt->ngaytao;?>')">Xem chi tiết</button>
                                </td>
                            </tr>
                        <?php
                            }
                        
                        ?>
                        </tbody>
                    </table>    <!-- END TABLE -->
                </div>
            </div>
        <?php
    }else{
            # Không tìm thấy tài khoản admin đăng nhập
        ?>
            <div class="alert alert-danger" role="alert">
                Lỗi... Không tìm thấy thông tin tài khoản admin...!
            </div>
        <?php
    }

    # gọi modal xem thêm thông tin nhà phân phối
    require "modal/modal-xem-thong-tin.php"
?>
