<?php
    if(isset($_SESSION['admin'])){
        ?>
        <div class="row">
            <!-- TITLE -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="position-absolute" style="z-index: 999; left: 10px">       
                    <a class="btn btn-outline-brown dangxuat rounded-pill" href="index.php?page=quanlixuatkho">Trở Về</a>
                </div>
    
                <div class="text-center">
                    <h4><strong><b>Tạo Mới Đơn Hàng</b></strong></h4>
                </div>
            </div>  <!-- END TITLE -->

            <!-- THEM HANG HOA VA SO LUONG -->
            <div class="col-12 col-sm-12 col-md-12 mt-3">
            <?php
                # nếu trả về id có nghĩ là trả về mã khách hàng=> thêm hàng hóa và số lượng
                if(isset($_GET['id'])){ 
                    $makhachhang = $_GET['id'];
        
                    require "ns-tn-model/nha-phan-phoi-class.php";
        
                    $khachhang = new nhaphanphoiclass();
                    $thongtin = $khachhang->LayThongTinKhachHangBangMa($makhachhang);
        
                    if($thongtin != NULL){
                        ?>
                        <marquee behavior="alternate">Bạn đang tạo đơn hàng cho nhà phân phối: <b><u><?php echo "  " . $thongtin->hovaten;?></u></b></marquee>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="card bg-custom">
                                        <div class="card-header bg-browns text-light" style="border-radius: 30px 30px 0 0">1. Thêm hàng hóa - Số lượng - Ngày sản xuất</div>
                                        <div class="card-body">
                                            <form action="ns-tn-controller/xuat-kho-controller.php?yeucau=themhanghoavasoluong" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="form-control rounded-pill" name="mahanghoa" title="Chọn hàng hóa cần thêm">
                                                            <?php 
                                                                try {
                                                                    require "ns-tn-model/hang-hoa-class.php";
                                                                    # lay tat ca hang hoa co san dua vao select box
                                                                    $hanghoa = new hanghoaclass();
                                                                    $thongtin = $hanghoa->LayTatCaHangHoa();

                                                                    foreach ($thongtin as $tt) {
                                                                        ?>
                                                                                <option value="<?php echo $tt->mahanghoa;?>"><?php echo $tt->tenhanghoa; ?></option>
                                                                        <?php
                                                                    }
                                                                } catch (\Throwable $th) {
                                                                    echo $th;
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!-- ma khach hang -->
                                                            <input type="text" name="makhachhang" min="1" class="form-control rounded-pill d-none" value="<?php echo $makhachhang; ?>" required>
                                                            <!-- them so luong cua mon hang vua chon -->
                                                            <input type="number" name="soluong" min="1" class="form-control rounded-pill" placeholder="Số lượng" required title="Số lượng phải lớn hơn 0">
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- them so luong cua mon hang vua chon -->
                                                            <input type="date" name="ngaysanxuat"  class="form-control rounded-pill" required title="Ngày sản xuất của món hàng này">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> <!-- END FORM -->
                                        </div>
                                    </div>
                                </div>  <!-- END THEM HANG HOA VA SO LUONG -->

                                <!-- GIO HANG -->
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="card bg-custom">
                                        <div class="card-header bg-browns text-light" style="border-radius: 30px 30px 0 0">
                                            2. Giỏ hàng
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tên hàng</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">NSX</th>
                                                        <th scope="col">Chức năng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require "ns-tn-model/cthh-don-hang-class.php";
                                                        require "ns-tn-model/don-hang-class.php";

                                                        # lấy thông tin đơn hàng đang tạo
                                                        $donhang = new donhangclass();
                                                        $thongtin = $donhang->LayDonHang($makhachhang);
                                                        $madonhang = $thongtin->MAX;

                                                        $chitiethanghoadonhang = new cthhdhclass();
                                                        $thongtin = $chitiethanghoadonhang->LayHangHoaCuaDonHang($madonhang);
                                                    
                                                        foreach ($thongtin as $tt) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $tt->tenhanghoa; ?></td>
                                                                <td><?php echo $tt->soluong; ?></td>
                                                                <td><?php echo $tt->ngaysanxuat; ?></td>
                                                                <td>
                                                                    <button onclick="SuaThongTinHangHoaDonHang('<?php echo $tt->madonhang?>','<?php echo $tt->makhachhang; ?>','<?php echo $tt->machitiethanghoadonhang?>', '<?php echo $tt->soluong?>', '<?php echo $tt->ngaysanxuat?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#suathongtindonhang">
                                                                        Sửa
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>

                                            <div class="mt-0">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydonhang">
                                                    Hủy đơn hàng này
                                                </button>

                                                <a href="index.php?page=quanlixuatkho" class="btn btn-success">Xác Nhận Tạo</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                        <?php
                    }else{
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Lỗi...</strong> Không tìm thấy thông tin nhà phân phối này...!
                            </div>
                        <?php
                    }
                # nếu không nhận được id nghĩa là không tìm thấy mã khách hàng => tìm và tạo đơn mới cho khách hàng
                }else{
            ?>
            </div>

                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <div class="card p-3 bg-custom">
                        <label for=""><b>Nhập số điện thoại cần thêm đơn hàng: </b></label>
                        <input type="number" class="form-control rounded-pill" id="sodienthoaithemdonhang" onkeyup="SoDienThoaiThemDonHang()">
                    </div>
                </div>
                
                <!-- load dữ liệu từ xuat-kho.js để tìm thông tin khách => tạo đơn hàng mới-->
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <div class="" id="thongtinkhachthem">
                
                    </div>
                </div>
        </div>      
        <?php 
                }
        }else{
        ?>
            <div class="alert alert-danger" role="alert">
                Lỗi... Không tìm thấy thông tin tài khoản admin...!
            </div>
        <?php
    }

    require "modal/modal-sua-don-hang.php";
    require "modal/modal-huy-don-hang.php";
?>


        

