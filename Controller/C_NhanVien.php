<?php
include_once("../Model/M_NhanVien.php");
include_once("../Model/M_PhongBan.php");
class Ctrl_NhanVien
{
    public function __construct()
    {
    }
    public function invoke()
    {
        if (isset($_GET["mod1"])) {
            $this->timkiemNV();
        } else if (isset($_GET["mod2"])) {
            $this->capnhatNV();
        } else if (isset($_GET["mod3"])) {
            $this->themNV();
        } else if (isset($_GET["mod4"])) {
            $this->xoaNV();
        } else {
            if (isset($_GET['IDPB'])) {
                $this->xemthongtinNVPB($_GET['IDPB']);
            } else {
                $this->xemthongtinNV();
            }
        }
    }
    public function xemthongtinNV()
    {
        $modelNhanVien = new Model_NhanVien();
        $nhanvien = $modelNhanVien->xemthongtinNV();
        include_once("../View/ListNV.php");
    }
    public function xemthongtinNVPB($IDPB)
    {
        $modelNhanVien = new Model_NhanVien();
        $nhanvien = $modelNhanVien->xemthongtinNVPB($IDPB);
        include_once("../View/ListNV.php");
    }
    public function timkiemNV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['field']) && isset($_REQUEST['text_search'])) {
                $modelNhanVien = new Model_NhanVien();
                $nhanvien = $modelNhanVien->timkiemNV($_REQUEST['field'], $_REQUEST['text_search']);
                include_once("../View/KetQuaTimKiem.php");
            }
        } else {
            include_once("../View/Form_TimKiem.php");
        }
    }
    public function capnhatNV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['IDNV']) && isset($_REQUEST['HoTen']) && isset($_REQUEST['DiaChi']) && isset($_REQUEST['IDPB'])) {
                $modelPhongBan = new Model_PhongBan();
                $rs = $modelPhongBan->checkPBTonTai($_REQUEST['IDPB']);
                if ($rs == true) {
                    $modelNhanVien = new Model_NhanVien();
                    $modelNhanVien->capnhatNV($_GET['IDNV'], $_REQUEST['HoTen'], $_REQUEST['DiaChi'], $_REQUEST['IDPB']);
                    header("Location:C_NhanVien.php?mod2=1");
                } else {
                    header("Location:C_NhanVien.php?mod2=1&IDNV=" . $_GET['IDNV'] . "&error=IDPB không tồn tại");
                }
            }
        } else {
            if (isset($_GET['IDNV'])) {
                $modelNhanVien = new Model_NhanVien();
                $nhanvien = $modelNhanVien->xemthongtinNVByID($_GET['IDNV']);
                include_once("../View/Form_CapNhatNhanVien.php");
            } else {
                $modelNhanVien = new Model_NhanVien();
                $nhanvien = $modelNhanVien->xemthongtinNV();
                include_once("../View/DSCapNhatNhanVien.php");
            }
        }
    }
    public function themNV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['IDNV']) && isset($_REQUEST['HoTen']) && isset($_REQUEST['DiaChi']) && isset($_REQUEST['IDPB'])) {
                $modelPhongBan = new Model_PhongBan();
                $modelNhanVien = new Model_NhanVien();
                $rs1 = $modelPhongBan->checkPBTonTai($_REQUEST['IDPB']);
                $rs2 = $modelNhanVien->checkIDNVTonTai($_REQUEST['IDNV']);
                if ($rs1 == false || $rs2 == true) {
                    $error = "";
                    if ($rs1 == false) {
                        $error = "Mã phòng ban không tồn tại.";
                    }
                    if ($rs2 == true) {
                        $error .= " Mã nhân viên đã tồn tại.";
                    }
                    // $modelNhanVien->capnhatNV($_GET['IDNV'], $_REQUEST['HoTen'], $_REQUEST['DiaChi'], $_REQUEST['IDPB']);
                    // header("Location:C_NhanVien.php?mod3=1");
                    header("Location:C_NhanVien.php?mod3=1&error=" . $error);
                } else {
                    $modelNhanVien->themNV($_REQUEST['IDNV'], $_REQUEST['HoTen'], $_REQUEST['DiaChi'], $_REQUEST['IDPB']);
                    header("Location:C_NhanVien.php");
                }
            }
        } else {
            include_once("../View/Form_ThemNhanVien.php");
        }
    }
    public function xoaNV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modelNhanVien = new Model_NhanVien();
            if (isset($_REQUEST['deleteAll'])) {
                $modelNhanVien->xoatatcaNV();
            } else {
                foreach ($_REQUEST as $x => $val) {
                    $modelNhanVien->xoaNVId($x);
                }
            }
            header("Location:C_NhanVien.php?mod4=1");
        } else {
            $modelNhanVien = new Model_NhanVien();
            $nhanvien = $modelNhanVien->xemthongtinNV();
            include_once("../View/DSXoaNhanVien.php");
        }
    }
}

$C_NhanVien = new Ctrl_NhanVien();
$C_NhanVien->invoke();
