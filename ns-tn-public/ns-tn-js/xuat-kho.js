function SoDienThoaiThemDonHang(){

    $(document).ready(function() {
        var sodienthoai = document.getElementById("sodienthoaithemdonhang").value.trim();
      
        $("#thongtinkhachthem").load("ns-tn-view/ns-tn-quan-li/ns-tn-xuat-kho/thong-tin-khach-them.php" , {sodienthoai: sodienthoai, sodienthoai: sodienthoai}); 
      
   });
}

function SuaThongTinHangHoaDonHang(madonhang,makhachhang,machitiethanghoadonhang, soluong, ngaysanxuat){
    var machitiethanghoadonhangsua = machitiethanghoadonhang;
    var soluongsua = soluong;
    var ngaysanxuatsua = ngaysanxuat;
    var makhachhangsua = makhachhang;
    var madonhangsua = madonhang;

    document.getElementById("machitiethanghoadonhangsua").value = machitiethanghoadonhangsua;
    document.getElementById("soluongsua").value = soluongsua;
    document.getElementById("ngaysanxuatsua").value = ngaysanxuatsua;
    document.getElementById("makhachhangsua").value = makhachhangsua;
    document.getElementById("madonhangsua").value = madonhangsua;
}