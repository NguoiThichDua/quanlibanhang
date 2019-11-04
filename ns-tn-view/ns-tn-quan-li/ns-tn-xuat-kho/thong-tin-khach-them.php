<div class="card p-3 bg-custom">
    <?php
        require "../../../ns-tn-model/nha-phan-phoi-class.php";
        require "../../../ns-tn-model/xuat-kho-class.php";

        if(isset($_REQUEST['sodienthoai'])){
            $sodienthoai = $_REQUEST['sodienthoai'];

            if(strlen($sodienthoai) >= 10){
                $khachhang = new nhaphanphoiclass(); 
                $thongtin = $khachhang->TimNhaPhanPhoiTheoSoDienThoai($sodienthoai);
                
                if($thongtin != NULL){
                    ?>
                        <div>
                            <label for=""><b>Tên nhà phân phối:</b></label>
                            <input type="text" value="<?php echo $thongtin->hovaten; ?>" class="form-control rounded-pill" readonly>
                            <label for=""><b>Địa chỉ:</b></label>
                            <input type="text" value="<?php echo $thongtin->diachi; ?>" class="form-control rounded-pill" readonly>
                            <label for=""><b>CMND:</b></label>
                            <input type="text" value="<?php echo $thongtin->cmnd; ?>" class="form-control rounded-pill" readonly>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taodonhang">
                                Tạo đơn hàng
                            </button>
                        </div>
                    <?php
                }else{
                    ?>
                        <label for="">Thông tin khách tìm được: </label>
                        <div class="alert alert-primary" role="alert">
                            Không tìm được khách hàng với số điện thoại này
                        </div>
                    <?php  
                }
            }else{
                ?>
                    <label for=""><b>Vui lòng nhập chính xác số điện thoại:</b> </label>
                    <button class="btn btn-primary rounded-pill" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Đang tìm thông tin nhà phân phối
                    </button>
                <?php
            }
        }else{
            # Không tìm thấy tài khoản được GET qua
        ?>
            <div class="alert alert-danger" role="alert">
                Lỗi... Không tìm thấy thông tin tài khoản vừa tìm...!
            </div>
        <?php
        }
    ?>
</div>

<?php
     require "modal/modal-tao-don-hang.php";
?>
