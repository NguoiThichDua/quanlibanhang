<?php
    if(isset($_SESSION['admin'])){
        ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="position-absolute" style="z-index: 999; left: 10px">       
                    <a class="btn btn-outline-brown dangxuat rounded-pill" href="index.php?page=quanlinhaphanphoi">Trở Về</a>
                </div>
    
                <div class="text-center">
                    <h4><strong><b>Tạo Mới Nhà Phân Phối</b></strong></h4>
                </div>
            </div>
              
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <div class="card p-3">
                    <form action="ns-tn-controler/admin-controller?yeucau=themnhaphanphoi" method="POST">
                        <div class="form-group">
                            <label for=""><b>Họ và tên:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="hovaten" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Số điện thoại:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="sodienthoai" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Địa chỉ:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="diachi" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>CMND:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="cmnd" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Trực thuộc:</b>(<span class="need">*</span>)</label>
                            <input type="text" name="tructhuoc" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-dark"><b>Cấp bậc:</b> (<span class="need">*</span>)</label>
                            <select name="capbac" class="form-control rounded-pill">
                                <option value="si">Sĩ</option>
                                <option value="le">Lẻ</option>
                                <option value="chinhanh">Chi nhánh</option>
                                <option value="daili">Đại lí</option>
                                <option value="tongdaili">Tổng đại lí</option>
                                <option value="nhaphanphoi">Nhà phân phối</option>
                                <option value="nhaphanphoivang">Nhà phân phối vàng</option>
                                <option value="nhaphanphoikimcuong">Nhà phân phối kim cương</option>
                                <option value="giamdockinhdoanh">Giám đốc kinh doanh</option>
                            </select>
                        </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <div class="card p-3">
                    <div class="form-group">
                            <label for=""><b>Mã hợp đồng:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="mahopdong" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Mã cửa hàng: </b>(<span class="need">*</span>)</label>
                            <input type="text" name="macuahang" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Hệ thống phân phối:</b> (<span class="need">*</span>)</label>
                            <input type="text" name="hethongphanphoi" class="form-control rounded-pill" title="Không được bỏ rỗng trường này" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="reset" class="btn btn-danger" value="Xóa các dữ liệu trên">
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <a href="index.php?page=quanlinhaphanphoi" class="btn btn-warning mr-3">Hủy bỏ</a>
                                    <input type="submit" value="Thêm mới" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
        <?php
    }
    ?>
        