<?php
include_once("../Model/M_PhongBan.php");

class Ctrl_PhongBan
{
    public function __construct()
    {
    }
    public function invoke()
    {
        if (isset($_GET["mod1"])) {
            $this->capnhatPB();
        } else if (isset($_GET["mod2"])) {
            $this->themPB();
        } else {
            $this->xemthongtinPB();
        }
    }
    public function xemthongtinPB()
    {
        $modelPhongBan = new Model_PhongBan();
        $phongban = $modelPhongBan->xemthongtinPB();
        include_once("../View/ListPB.php");
    }
    public function capnhatPB()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['IDPB']) && isset($_REQUEST['TenPB']) && isset($_REQUEST['MoTa'])) {
                $modelPhongBan = new Model_PhongBan();
                $modelPhongBan->capnhatPB($_GET['IDPB'], $_REQUEST['TenPB'], $_REQUEST['MoTa']);
                header("Location:C_PhongBan.php?mod1=1");
            }
        } else {
            if (isset($_GET['IDPB'])) {
                $modelPhongBan = new Model_PhongBan();
                $phongban = $modelPhongBan->xemthongtinPBByID($_GET['IDPB']);
                include_once("../View/Form_CapNhatPhongBan.php");
            } else {
                $modelPhongBan = new Model_PhongBan();
                $phongban = $modelPhongBan->xemthongtinPB();
                include_once("../View/DSCapNhatPhongBan.php");
            }
        }
    }
    public function themPB()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['IDPB']) && isset($_REQUEST['TenPB']) && isset($_REQUEST['MoTa'])) {
                $modelPhongBan = new Model_PhongBan();
                $rs1 = $modelPhongBan->checkPBTonTai($_REQUEST['IDPB']);
                if ($rs1 == true) {
                    $error = "Mã phòng ban đã tồn tại.";
                    header("Location:C_PhongBan.php?mod2=1&error=" . $error);
                } else {
                    $modelPhongBan->themPB($_REQUEST['IDPB'], $_REQUEST['TenPB'], $_REQUEST['MoTa']);
                    header("Location:C_PhongBan.php");
                }
            }
        } else {
            include_once("../View/Form_ThemPhongBan.php");
        }
    }
}

$C_PhongBan = new Ctrl_PhongBan();
$C_PhongBan->invoke();
