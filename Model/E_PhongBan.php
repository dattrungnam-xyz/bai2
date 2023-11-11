<?php

class Entity_PhongBan
{
    public $IDPB;
    public $TenPB;
    public $MoTa;

    public function __construct($_IDPB, $_TenPB, $_MoTa)
    {
        $this->IDPB = $_IDPB;
        $this->TenPB = $_TenPB;
        $this->MoTa = $_MoTa;
    }
}
