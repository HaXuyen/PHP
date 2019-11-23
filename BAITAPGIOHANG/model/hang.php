<?php
class hang{
    var $MaHang;
    var $TenHang;
    var $SoLuong;
    var $Gia;
    var $MaLoai;
    var $Anh;
    function __construct($MaHang, $TenHang, $SoLuong, $Gia, $MaLoai, $Anh)
    {
        $this->MaHang=$MaHang;
        $this->TenHang = $TenHang;
        $this->SoLuong = $SoLuong;
        $this->Gia=$Gia;
        $this->MaLoai=$MaLoai;
        $this->Anh=$Anh;
    }
    function display()
    {
        echo "Mã hàng: " . $this->MaHang . "<br>";
        echo "Tên hàng: " . $this->TenHang . "<br>";
        echo "Số lượng: " . $this->SoLuong . "<br>";
        echo "Giá: " . $this->Gia . "<br>";
        echo "Mã loại: " . $this->MaLoai . "<br>";
        echo "Anh: " . $this->Anh . "<br>";
    }
    static function connect()
    {
        $con = new mysqli("localhost", "root","","giohang","3306");
        if($con->connect_error)
            die("kết nối thất bại. chi tiết: ".$con->connect_error);
        return $con;
    }
    static function getListfromDB(){
        //Bước 1: tạo kết nối
        $con=hang::connect();
        //b2: thao tác với csdl: crud
        $sql = "SELECT * FROM `hanghoa`";
        $result=$con->query($sql);
        
        $lsHang=array();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $hang = new hang($row["MaHang"],$row["TenHang"], $row["SoLuong"], $row["Gia"],$row["MaLoai"],"<img src= ". $row["Anh"].">");
                    array_push($lsHang, $hang);
                    

                   
            }
        }
        //b3: giải phóng kết nối
        $con->close();
        return $lsHang;
    }
    static function searchHang($search = null)
    {
        //b1: Tao ket noi
        $con = hang::connect();
        $lsHang = array();
        if ($search == null) {
            $lsHang = hang::getListHang();
            return $lsHang;
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `hanghoa` where TenHang like '%$search%'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $hang = new hang($row["MaHang"],$row["TenHang"], $row["SoLuong"], $row["Gia"],$row["MaLoai"],"<img src= ". $row["Anh"].">");
                    array_push($lsHang, $hang);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsHang;
    }
    static function searchHangByID($MaHang = null)
    {
        //b1: Tao ket noi
        $con = hang::connect();
       
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `hanghoa` where MaHang = '$MaHang'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
           // while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                $hang = new hang($row["MaHang"],$row["TenHang"], $row["SoLuong"], $row["Gia"],$row["MaLoai"],"<img src= ". $row["Anh"].">");
              
        }
        //b3: giai phong ket noi
        $con->close();
        return $hang;
    }
    
}
?>