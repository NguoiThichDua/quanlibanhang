function SoDienThoaiThemDonHangTon(){

    $(document).ready(function() {
        var sodienthoai = document.getElementById("sodienthoaithemdonhang").value.trim();
      
        $("#thongtinkhachthem").load("ns-tn-view/ns-tn-quan-li/ns-tn-ton-kho/thong-tin-khach-them.php" , {sodienthoai: sodienthoai, sodienthoai: sodienthoai}); 
   });
}

function SuaThongTinHangHoaDonHangTon(mahangton, makhachhang ,machitiethanghoahangton, soluong){
    var mahangtonsua = mahangton;
    var machitiethanghoadonhangsua = machitiethanghoahangton;
    var soluongsua = soluong;
    var makhachhangsua = makhachhang;
   
    document.getElementById("makhachhangsuahangton").value = makhachhangsua;
    document.getElementById("mahangtonsua").value = mahangtonsua;
    document.getElementById("machitiethanghoadonhangsua").value = machitiethanghoadonhangsua;
    document.getElementById("soluongsua").value = soluongsua;

    document.getElementById("makhachhangsuadatao").value = makhachhangsua;
    document.getElementById("madonhangsuadatao").value = mahangtonsua;
    document.getElementById("machitiethanghoadonhangsuadatao").value = machitiethanghoadonhangsua;
    document.getElementById("soluongsuadatao").value = soluongsua;
}