<?php
echo '<div style="display:flex; ">';
include_once("Sidebar.php");
echo '<div class="container">';
if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {

    for ($i = 0; $i < sizeof($nhanvien); $i++) {
        echo '<form onsubmit="return handleSubmit()" name="f1" style="padding:20px; width: 400px;" action="C_NhanVien.php?mod2=1&IDNV=' . $nhanvien[$i]->IDNV . '" method="post">
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="IDNV">IDNV</label>
            <input readonly type="text" value="' . $nhanvien[$i]->IDNV . '" name="IDNVform" id="IDNV">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="HoTen">Họ tên</label>
            <input onchange="handleChange()" type="text" name="HoTen" value="' . $nhanvien[$i]->HoTen . '" id="HoTen">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="DiaChi">Địa Chỉ</label>
            <input onchange="handleChange()" type="text" name="DiaChi" value="' . $nhanvien[$i]->DiaChi . '" id="DiaChi">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="IDPB">ID Phòng ban</label>
            <input onchange="handleChange()" type="text" value="' . $nhanvien[$i]->IDPB . '" name="IDPB" id="IDPB">
        </div>
        <div style="display: block; margin-bottom:4px;">
            <p style="margin: 4px 0px;" class="p_text"></p>';

        echo '    
        </div>
       
       
        <div style="margin-bottom: 8px">
            <button style="padding: 2px 8px; margin-right: 8px" type="submit">OK</button>
            <button style="padding: 2px 8px;" type="reset">Cancel</button>
        </div>
        </form>
        ';
    }
    if (isset($_REQUEST['error'])) {
        echo '<p class="p_text" style="margin-left:16px;">' . $_REQUEST['error'] . '</p>';
    };


    echo '</div>';
    echo '   
        <script>
        let a = document.querySelector(".p_text");
        function handleSubmit() {
            let hoten = document.f1.HoTen.value;
            let diachi = document.f1.DiaChi.value;
            let idpb = document.f1.IDPB.value;
            if (hoten === "" || diachi === "" || idpb === "") {
                a.innerHTML = "không được để trống thông tin";
                return false
            }else{
                return true
                //document.f1.submit();
            }
        }
        function handleChange() {
            a.innerHTML = "";
        }

        </script>';
} else {
    echo "ban chua dang nhap";
}
