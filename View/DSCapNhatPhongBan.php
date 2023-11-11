<?php
echo '<style>
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

<div style="display:flex; ">';


include_once('Sidebar.php');

if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {

    echo '<div class="container">';

    echo '<table class="table" border="0" width="100%">';
    echo '<caption class="caption"> Du lieu truy xuat tu bang phong ban</caption>';


    echo '<tr><th class="thead"> IDPB </th><th class="thead">Tên PB</th><th class="thead"> Mô tả </th><th class="thead"> Chỉnh sửa phòng ban </th></tr>';
    for ($i = 0; $i < sizeof($phongban); $i++) {
        echo '<tr><td class="td"> ' . $phongban[$i]->IDPB . '</td><td class="td"> ' . $phongban[$i]->TenPB . '</td><td class="td"> ' . $phongban[$i]->MoTa . '</td><td class="td"> <a href="../Controller/C_PhongBan.php?mod1=1&IDPB=' . $phongban[$i]->IDPB . '">x x x </a></td></tr>';
    }

    echo '</table>';
    echo '</div>';
} else {
    echo "Ban chua dang nhap";
}
echo '</div>';
