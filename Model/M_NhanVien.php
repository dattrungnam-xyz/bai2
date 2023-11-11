<?php
include_once("E_NhanVien.php");
class Model_NhanVien
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
    public function xemthongtinNV()
    {
        $sql = "SELECT * FROM nhanvien ";
        $rs = mysqli_query($this->connection, $sql);
        $nhanvien = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['IDNV'];
            $hoten = $row['HoTen'];
            $diachi = $row['DiaChi'];
            $idpb = $row['IDPB'];

            $nhanvien[$i++] = new Entity_NhanVien($id, $hoten, $diachi, $idpb);
        }
        return $nhanvien;
    }
    public function xemthongtinNVByID($IDNV)
    {
        $sql = "SELECT * FROM nhanvien WHERE IDNV = '" . $IDNV . "'";
        $rs = mysqli_query($this->connection, $sql);
        $nhanvien = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['IDNV'];
            $hoten = $row['HoTen'];
            $diachi = $row['DiaChi'];
            $idpb = $row['IDPB'];

            $nhanvien[$i++] = new Entity_NhanVien($id, $hoten, $diachi, $idpb);
        }
        return $nhanvien;
    }
    public function xemthongtinNVPB($IDPB)
    {
        $sql = "SELECT * FROM nhanvien where IDPB = '" . $IDPB . "'";
        $rs = mysqli_query($this->connection, $sql);
        $nhanvien = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['IDNV'];
            $hoten = $row['HoTen'];
            $diachi = $row['DiaChi'];
            $idpb = $row['IDPB'];

            $nhanvien[$i++] = new Entity_NhanVien($id, $hoten, $diachi, $idpb);
        }
        return $nhanvien;
    }
    public function timkiemNV($field, $value)
    {
        $sql = "SELECT * FROM nhanvien WHERE " . $field . " = '" . $value . "'";
        $rs = mysqli_query($this->connection, $sql);
        $nhanvien = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['IDNV'];
            $hoten = $row['HoTen'];
            $diachi = $row['DiaChi'];
            $idpb = $row['IDPB'];

            $nhanvien[$i++] = new Entity_NhanVien($id, $hoten, $diachi, $idpb);
        }
        return $nhanvien;
    }
    public function capnhatNV($IDNV, $HoTen, $DiaChi, $IDPB)
    {
        $sql_update = " UPDATE nhanvien
                    SET HoTen = '" . $HoTen . "', DiaChi  = '" . $DiaChi . "', IDPB  = '" . $IDPB . "'
                    WHERE IDNV  = '" . $IDNV . "';";
        mysqli_query($this->connection, $sql_update);
    }
    public function themNV($IDNV, $HoTen, $DiaChi, $IDPB)
    {
        $sql_update = " INSERT INTO nhanvien (IDNV,HoTen,DiaChi,IDPB)
                     VALUES ('" . $IDNV . "','" . $HoTen . "','" . $DiaChi . "','" . $IDPB . "')
                    ;";
        mysqli_query($this->connection, $sql_update);
    }
    public function xoatatcaNV()
    {

        $sql_deleteAll = "DELETE FROM nhanvien";
        mysqli_query(
            $this->connection,
            $sql_deleteAll
        );
    }
    public function xoaNVId($Id)
    {

        $sql_delete = "DELETE FROM nhanvien where IDNV = '" . $Id . "'";
        mysqli_query(
            $this->connection,
            $sql_delete
        );
    }
    public function checkIDNVTonTai($IDNV)
    {
        $sql_check_idnv = "SELECT * FROM nhanvien WHERE IDNV = '"  . $IDNV .  "'";

        $rs_check_idnv = mysqli_query($this->connection, $sql_check_idnv);

        $check = false;
        while ($row = mysqli_fetch_array($rs_check_idnv)) {
            if ($row['IDNV'] == $IDNV) {
                $check = true;
                break;
            }
        }
        return $check;
    }
}
