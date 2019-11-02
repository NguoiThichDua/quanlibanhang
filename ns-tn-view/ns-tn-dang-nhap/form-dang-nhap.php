<!-- LOGO -->
<?php require "ns-tn-view/ns-tn-include/logo.php"; ?>

<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3 text-center">
    <h4><strong><b>ĐĂNG NHẬP</b></strong></h4>
</div>

<div> <?php require "ns-tn-view/ns-tn-include/message.php"; ?> </div>

<form action="ns-tn-controller/admin-controller.php?yeucau=dangnhap" method="post" class="w-100">   
    <div class="form-group inputBox">
        <input type="text" name="tentaikhoan" required title="Không được để trống tài khoản">
        <label for="" class="text-dark"><b>Tên tài khoản</b></label>
    </div> 

    <div class="form-group inputBox">
        <div class="input-group eye">
            <input type="password" name="matkhau" id="password" aria-label="" aria-describedby="basic-addon2" id="" required  title="Không được để trống mật khẩu">
            <img src="ns-tn-public/ns-tn-images/default/eye.png" class=" " onclick="ShowPass()" id="basic-addon2" alt="" width="30px" height="30px">
            <label for="" class="text-dark"><b>Mật khẩu</b></label>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center ">
                <input type="submit" value="ĐĂNG NHẬP" class="btn btn-success btn-lg">
            </div>
        </div>
    </div>
</form>

