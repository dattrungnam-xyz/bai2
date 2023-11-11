
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
include_once("Sidebar.php");
?>

<div class="container">
<table class="table" border="0" width="100%">
<caption class="caption"> Kết quả tìm kiếm</caption>


<tr><th class="thead"> Mã số </th><th class="thead"> Họ tên</th><th class="thead"> Địa chỉ </th><th class="thead"> ID Phòng ban </th></tr>
<?php
for ($i = 0; $i < sizeof($nhanvien); $i++) {
	echo '<tr><td class="td"> ' . $nhanvien[$i]->IDNV . '</td><td class="td"> ' . $nhanvien[$i]->HoTen . '</td><td class="td"> ' . $nhanvien[$i]->DiaChi . '</td><td class="td"> ' . $nhanvien[$i]->IDPB . '</td></tr>';
}
?>
</table>
</div>
</div>

