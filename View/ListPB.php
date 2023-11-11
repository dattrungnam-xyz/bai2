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
    ?>
    <div class="container">
        <table class="table border=" 0" width="100%">
            <caption class="caption"> Dữ liệu truy xuất từ bảng phòng ban</caption>


            <tr>
                <th class="thead"> IDPB </th>
                <th class="thead">Tên PB</th>
                <th class="thead"> Mô tả </th>
                <th class="thead"> Xem NV </th>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($phongban); $i++) {
                echo '<tr><td class="td"> ' . $phongban[$i]->IDPB . '</td><td class="td"> ' . $phongban[$i]->TenPB . '</td><td class="td"> ' . $phongban[$i]->MoTa . '</td><td class="td"> <a href="../Controller/C_NhanVien.php?IDPB=' . $phongban[$i]->IDPB . '">x x x </a></td></tr>';
            }
            ?>
        </table>
    </div>