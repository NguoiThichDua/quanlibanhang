/* Xem thêm những thông tin của nhà phân phối */
function XemThemThongTin(hovaten, mahopdong, macuahang, hethongnhaphanphoi, danghi, tenadmin,ngaytao){
    var xem_hovaten = hovaten;
    var xem_mahopdong = mahopdong;
    var xem_macuahang = macuahang;
    var xem_hethongnhaphanphoi = hethongnhaphanphoi;
    var xem_danghi = danghi;
    var xem_tenadmin = tenadmin;
    var xem_ngaytao = ngaytao;

    if(xem_danghi == "chuanghi"){
        xem_danghi = "Chưa nghĩ";
    }else{
        xem_danghi = "Đã nghĩ";
    }

    document.getElementById("xem_tenkhachhang").innerHTML = xem_hovaten;
    document.getElementById("xem_mahopdong").innerHTML = xem_mahopdong;
    document.getElementById("xem_macuahang").innerHTML = xem_macuahang;
    document.getElementById("xem_hethongnhaphanphoi").innerHTML = xem_hethongnhaphanphoi;
    document.getElementById("xem_danghi").innerHTML = xem_danghi;
    document.getElementById("xem_tenadmin").innerHTML = xem_tenadmin;
    document.getElementById("xem_ngaytao").innerHTML = xem_ngaytao;
}

function TimKhachHang(){
    $(document).ready(function() {
        var tenkhach = document.getElementById("tenkhachtim").value.trim();
        var sodienthoai = document.getElementById("sodienthoaikhachtim").value.trim();
      
        $("#bangloc").load("ns-tn-view/ns-tn-quan-li/ns-tn-nha-phan-phoi/boloc.php" , {tenkhach: tenkhach, sodienthoai: sodienthoai}); 
      
   });
}

function CheckSoDienThoai(){
    $(document).ready(function() {
        var sodienthoai = document.getElementById("sodienthoaicheck").value.trim();
        
        $("#showthongtinsodienthoai").load("ns-tn-view/ns-tn-quan-li/ns-tn-nha-phan-phoi/tao-nha-phan-phoi-qua-duong.php" , {sodienthoai: sodienthoai}); 
      
   });
}