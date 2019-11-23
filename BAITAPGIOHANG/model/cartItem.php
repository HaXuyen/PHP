<?php
class cartItem{
    var $MaHang;
    var $TenHang;
    var $SoLuong;
    var $Gia;
    var $totalCost;

    function __construct($MaHang, $TenHang, $SoLuong, $Gia)
    {
        $this->MaHang = $MaHang;
        $this->TenHang = $TenHang;
        $this->SoLuong = $SoLuong;
        $this->Gia = $Gia;
        $this->totalCost = $Gia * $SoLuong;
    }
    public function getTotalCost(){
        return $this->totalCost;
    }
    public function setTotalCost()
    {
        $this->totalCost = $this->Gia * $this->SoLuong;
    }
}

?>