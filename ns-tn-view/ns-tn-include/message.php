<div class="row">
    <div class="col-md-12 mt-3">
        <?php
            if(isset($_GET['ketqua'])){
                $ketqua = $_GET['ketqua'];
                    # Nhận biến kết quả và kiểm tra để in ra thông báo
                switch ($ketqua) {
                    case 'yeucaukhongxacdinh':
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert" id="message" >
                            <strong>Thất bại!</strong> không nhận được yêu cầu..!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    break;
                    case 'dangnhapthatbai':
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show rounded-pill" role="alert" id="message" >
                            <strong>Thất bại!</strong> sai tài khoản hoặc mật khẩu..!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    break;
                    case 'dangnhapthanhcong':
                    ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-pill" role="alert" id="message" >
                            <strong>Thành công!</strong> bạn đang đăng nhập với tài khoản quản trị..!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    break;
                }
            }else{

            }
        ?>
    </div>
</div>






