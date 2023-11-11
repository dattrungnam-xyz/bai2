<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            overflow-y: scroll;
            max-height: 100vh;
            flex: 1;
            padding: 20px;
        }
    </style>

    <div style="display:flex; ">
        <?php include_once('Sidebar.php'); ?>
        <div class="container">



            <?php
            if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {
                echo '
    <form onsubmit="return handleSubmit()" name="f1" style="width: 400px;" action="../Controller/C_NhanVien.php?mod3=1" method="post">
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="IDNV">IDNV</label>
            <input  onchange="handleChange()" type="text"     name="IDNV" id="IDNV">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="HoTen">Họ tên</label>
            <input onchange="handleChange()" type="text" name="HoTen"      id="HoTen">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="DiaChi">Địa Chỉ</label>
            <input onchange="handleChange()" type="text" name="DiaChi"      id="DiaChi">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="IDPB">ID Phòng ban</label>
            <input onchange="handleChange()" type="text"     name="IDPB" id="IDPB">
        </div>
        <p class="p_text"></p>
        <div style="margin-bottom: 8px">
            <button style="padding: 4px 8px; margin-right: 8px" type="submit">OK</button>
            <button style="padding: 4px 8px;" type="reset">Cancel</button>
        </div>
        </form>
        
        <script>
        let a = document.querySelector(".p_text");
        function handleSubmit() {
            let hoten = document.f1.HoTen.value;
            let diachi = document.f1.DiaChi.value;
            let idpb = document.f1.IDPB.value;
            let idnv = document.f1.IDNV.value;
            if (hoten === "" || diachi === "" || idpb === "" || idnv ==="") {
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
            ?>
            <?php
            if (isset($_REQUEST['error'])) {
                echo '<p class="p_text">' . $_REQUEST['error'] . '</p>';
            };

            ?>
</body>

</html>