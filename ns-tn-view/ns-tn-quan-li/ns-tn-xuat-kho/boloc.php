<?php
    require "../../../ns-tn-model/nha-phan-phoi-class.php";
    require "../../../ns-tn-model/admin-class.php";
    require "../../../ns-tn-model/don-hang-class.php";
    require "../../../ns-tn-model/hang-hoa-class.php";
    require "../../../ns-tn-model/cthh-don-hang-class.php";

    # dữ liệu nhận được từ nha-phan-phoi.js
    if(isset($_REQUEST['tenkhach']) || isset($_REQUEST['sodienthoai']) || isset($_REQUEST['ngaybatdautim']) || isset($_REQUEST['mabill']) || isset($_REQUEST['ngayketthuctim'])){
        $tenkhach = trim($_REQUEST['tenkhach']);
        $sodienthoai = trim($_REQUEST['sodienthoai']);
        $ngaybatdautim = trim($_REQUEST['ngaybatdautim']);
        $ngayketthuctim = trim($_REQUEST['ngayketthuctim']);
        $mabill = trim($_REQUEST['mabill']);
       
        ?>
            <!-- TABLE -->
            <table class="table table-hover table-bordered table-sm table-light text-center">
                <thead>
                    <tr>
                        <th scope="col" colspan="7">BẢNG TÌM KIẾM</th>
                    </tr>
                    <tr class="bg-browns text-light">
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tên sp & số lượng</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $stt = 1;

                    $donhang = new donhangclass();
                    
                    if($ngaybatdautim == "" || $ngayketthuctim == ""){
                        $thongtin = $donhang->TimDonHangKhongNgay($tenkhach, $sodienthoai, $mabill);

                        $tongsanpham = $donhang->TinhTongSanPhamKhongNgay($tenkhach, $sodienthoai, $mabill);
                    }else{
                        $thongtin = $donhang->TimDonHangCoNgay($tenkhach, $sodienthoai, $mabill, $ngaybatdautim, $ngayketthuctim);

                        $tongsanpham = $donhang->TinhTongSanPhamCoNgay($tenkhach, $sodienthoai, $mabill,$ngaybatdautim, $ngayketthuctim);
                    }
                   
                
                    foreach ($thongtin as $tt) {
                ?>
                    <tr>
                        <th scope="row" class="font-weight-normal"><?php echo $stt++; ?></th>
                        <th scope="row" class="font-weight-normal"><?php echo $tt->hovaten; ?></th>
                        <th scope="row" class="font-weight-normal"><?php echo $tt->sodienthoai; ?></th>
                        <th scope="row" class="font-weight-normal"><?php echo $tt->diachi; ?></th>
                        <th scope="row" class="font-weight-normal">
                            <?php 
                                # lấy chi tiết đơn hàng thông qua mã đơn hàng
                                $chitiet = new cthhdhclass();
                                $sanpham = $chitiet->LayHangHoaCuaDonHang($tt->madonhang);

                                # lấy tên hàng hóa bằng mã hàng hóa của chi tiết đơn hàng
                                # sử dụng ở dòng foreach
                                $hanghoa = new hanghoaclass();

                                foreach ($sanpham as $sp) {
                                    echo "<strong><span class='text-success' title='Ngày sản xuất: $sp->ngaysanxuat'>" .  $hanghoa->LayHangHoaTheoMa($sp->mahanghoa)->tenhanghoa . "</span>: <span>" . $sp->soluong . "</span></strong><br>";
                                }

                            ?>
                        </th>
                        <th scope="row"  class="font-weight-normal"><?php echo $tt->ghichu; ?></th>
                        <th scope="row"  class="font-weight-normal">
                            <?php
                                # lấy tên admin để show bằng modal
                                $admin = new adminclass();
                                $thongtin = $admin->LayThongTinAdminBangMa($tt->maadmin);
                                $tenadmin = $thongtin->hovaten;
                            ?>
                            <a href="index.php?page=suadonhang&id=<?php echo $tt->makhachhang?>&madonhang=<?php echo $tt->madonhang?>" class="btn btn-warning">Sửa</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitietdonhang" onclick="ChiTietDonHang('<?php echo $tt->ngaytao?>', '<?php echo $tt->mabill?>', '<?php echo $tenadmin?>')">Chi tiết</button>
                        </th>
                    </tr>

                   
                <?php
                    }
                ?>
                    <tr>
                        <th scope="col" colspan="7" class="bg-brown">
                        <h5 class="text-light">Tổng Các Món Hàng Đã Đặt</h5>
                        <?php
                            foreach ($tongsanpham as $tsp) {
                               echo "<span><span class='text-warning'>" . $tsp->tenhanghoa . "</span> - " . $tsp->soluong . "</span><br>";
                            }
                        ?>
                        </th>
                    </tr>
                </tbody>
            </table>    <!-- END TABLE -->
           <?php
    }else{  
        ?>
            <div class="alert alert-danger" role="alert">
                Lỗi... Không nhận được dữ liệu tìm kiếm...!
            </div>
        <?php
    }
?>