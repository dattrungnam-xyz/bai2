<?php
include_once("E_PhongBan.php");
class Model_PhongBan
{
    public $connection;
    public function __construct()
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu2");
        $this->connection = $connection;
    }
    public function xemthongtinPB()
    {
        $sql = "SELECT * FROM phongban ";
        $rs = mysqli_query($this->connection, $sql);
        $phongban = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $idpb = $row['IDPB'];
            $tenpb = $row['TenPB'];
            $mota = $row['MoTa'];
            $phongban[$i++] = new Entity_PhongBan($idpb, $tenpb, $mota);
        }
        return $phongban;
    }
    public function xemthongtinPBByID($IDPB)
    {
        $sql = "SELECT * FROM phongban WHERE IDPB = '"  . $IDPB .  "'";
        $rs = mysqli_query($this->connection, $sql);
        $phongban = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $idpb = $row['IDPB'];
            $tenpb = $row['TenPB'];
            $mota = $row['MoTa'];
            $phongban[$i++] = new Entity_PhongBan($idpb, $tenpb, $mota);
        }
        return $phongban;
    }
    public function capnhatPB($IDPB, $TenPB, $MoTa)
    {
        $sql_update = " UPDATE phongban
                    SET TenPB = '" . $TenPB . "', MoTa  = '" . $MoTa . "'
                    WHERE IDPB  = '" . $IDPB. "';";
        mysqli_query($this->connection, $sql_update);
    }
    public function themPB($IDPB, $TenPB, $MoTa)
    {
        $sql_insert = " INSERT INTO phongban (IDPB,MoTa,TenPB)
                     VALUES  ('" . $IDPB . "','" . $MoTa . "','" . $TenPB . "'  ) ;";
        mysqli_query($this->connection, $sql_insert);
    }
    public function checkPBTonTai($IDPB_Value)
    {
        $sql_check_idpb = "SELECT * FROM phongban WHERE IDPB = '"  . $IDPB_Value .  "'";

        $rs_check_idpb = mysqli_query($this->connection, $sql_check_idpb);

        $check = false;
        while ($row = mysqli_fetch_array($rs_check_idpb)) {
            if ($row['IDPB'] == $IDPB_Value) {
                $check = true;
                break;
            }
        }
        return $check;
    }
}
