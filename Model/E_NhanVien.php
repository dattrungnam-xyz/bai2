<?php

class Entity_NhanVien
{
    public $IDNV;
    public $HoTen;
    public $IDPB;
    public $DiaChi;

    public function __construct($_IDNV, $_HoTen, $_DiaChi,$_IDPB)
    {
        $this->IDNV = $_IDNV;
        $this->HoTen = $_HoTen;
        $this->IDPB = $_IDPB;
        $this->DiaChi = $_DiaChi;
    }
}
