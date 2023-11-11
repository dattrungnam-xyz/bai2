<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .thead {

        font-family: Lato-Bold;
        font-size: 18px;
        color: #fff;
        line-height: 1.4;
        background-color: #6c7ae0;
        padding-top: 9px;
        padding-bottom: 9px;
    }

    .td {
        font-family: Lato-Regular;
        font-size: 15px;
        color: #808080;
        line-height: 1.4;
        padding-top: 7px;
        padding-bottom: 7px;
        padding-left: 16px;
    }

    .table {
        max-height: 200px;
        border-radius: 8px;
        overflow-y: scroll;
    }

    .container {
        height: 100vh;
        overflow-y: scroll;
        max-height: 100vh;
        flex: 1;
        padding: 20px;
    }

    .caption {
        margin: 8px 0px;
        font-size: 20px;
    }
</style>

<div style="display:flex; ">
    <?php
    include_once('Sidebar.php');

    if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {

        echo '<div class="container">';

        echo '<form name="f1" action="../Controller/C_NhanVien.php?mod4=1" method="post">';
        echo '<table class="table" border="0" width="100%">';
        echo '<caption  class="caption"> Dữ liệu truy xuất từ bảng nhân viên</caption>';


        echo '<tr><th class="thead"> Mã số </th><th class="thead"> Họ tên</th><th class="thead"> Địa chỉ </th><th class="thead"> ID Phòng ban </th><th class="thead"> Xóa nhân viên </th></tr>';
        for ($i = 0; $i < sizeof($nhanvien); $i++) {
            echo '<tr><td class="td"> ' . $nhanvien[$i]->IDNV . '</td><td class="td"> ' . $nhanvien[$i]->HoTen . '</td> <td class="td">' . $nhanvien[$i]->DiaChi . '</td><td class="td"> ' . $nhanvien[$i]->IDPB . '</td><td class="td"> <input name="' . $nhanvien[$i]->IDNV . '"  type = "checkbox"></td></tr>';
        }

        echo '</table>';
        echo '<button style="margin: 8px 16px 0px; padding: 4px 8px;" type="submit">Xóa</button>';
        echo '<button style=" padding: 4px 8px;" onclick="handleSubmit()" type="button">Xóa tất cả</button>';
        echo '<input class="deleteAll" type="checkbox" hidden name="deleteAll">';
        echo '</form>';
        echo '</div>';

        echo '   
        <script>
        let a = document.querySelector(".deleteAll");
        function handleSubmit() {
            a.checked = !a.checked;
			document.f1.submit();
        }
    
        </script>';
    
    } else {
        echo "Ban chua dang nhap";
    }

    ?>
</div>