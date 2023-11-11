<?php
echo '<div style="display:flex; ">';
include_once("Sidebar.php");
echo '<div class="container">';
if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {

    $value = $_GET['IDPB'];

    for ($i = 0; $i < sizeof($phongban); $i++) {
        echo '<form onsubmit="return handleSubmit()" name="f1" style="padding:20px; width: 400px;" action="C_PhongBan.php?mod1=1&IDPB=' . $phongban[$i]->IDPB . '" method="post">
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="IDPB">IDPB</label>
            <input readonly type="text" value="' . $phongban[$i]->IDPB . '" name="IDPBform" id="IDPB">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="TenPB">Tên phòng ban</label>
            <input onchange="handleChange()" type="text" name="TenPB" value="' . $phongban[$i]->TenPB . '" id="TenPB">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="MoTa">Mô tả</label>
            <input onchange="handleChange()" type="text" name="MoTa" value="' . $phongban[$i]->MoTa . '" id="MoTa">
        </div>
        <div style="display: block; margin-bottom:4px;">
            <p style="margin: 4px 0px;" class="p_text"></p>
        </div> 
        <div style="margin-bottom: 8px">
            <button style="padding: 2px 8px; margin-right: 8px" type="submit">OK</button>
            <button style="padding: 2px 8px; margin-right: 8px" type="reset">Cancel</button>
        </div>
        </form>
     
        
        ';
    }
    echo '   
        <script>
        let a = document.querySelector(".p_text");
        function handleSubmit() {
            let TenPB = document.f1.TenPB.value;
            let MoTa = document.f1.MoTa.value;

            if (TenPB === "" || MoTa === "" ) {
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
    echo "Ban chua dang nhap";
}
