<?php
class ketnoi{
    var $ten;
    var $email;
    var $sdt;
    #end properties
    #Construct function
    function __construct($id, $ten, $email, $sdt)
    {
        $this->id=$id;
        $this->ten = $ten;
        $this->email = $email;
        $this->sdt=$sdt;
    }
    function display()
    {
        echo "Tên: " . $this->ten . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Số điện thoại: " . $this->sdt . "<br>";
    }
    
    static function connect()
    {
        $con = new mysqli("localhost", "root","","Contacts","3306");
        if($con->connect_error)
            die("kết nối thất bại. chi tiết: ".$con->connect_error);
        return $con;
    }
    static function insert( $ten, $email, $sdt){
        $con=ketnoi::connect();
        $sql = "INSERT INTO `contact` (Ten,Email, SDT) VALUES ('$ten', '$email', '$sdt')";
        $result=$con->query($sql);
        $lsBook=array();
        if($result==true){
               echo "<h3>Đã thêm thành công liên hệ</h3>";
        }
            $con->close();
            return $lsBook;
    }
    static function insertnhan(){
        $con=ketnoi::connect();
        $sql = "INSERT INTO `contact` (Ten,Email, SDT) VALUES ('$ten', '$email', '$sdt')";
        $result=$con->query($sql);
        $lsBook=array();
        if($result==true){
               echo "<h3>Đã thêm thành công liên hệ</h3>";
        }
            $con->close();
            return $lsBook;
    }
     static function getListfromDB(){
        //Bước 1: tạo kết nối
        $con=ketnoi::connect();
        //b2: thao tác với csdl: crud
        $sql = "SELECT * FROM `contact`";
        $result=$con->query($sql);
        $lsBook=array();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $book = new ketnoi($row["ID"],$row["Ten"], $row["Email"], $row["SDT"]);
                    array_push($lsBook, $book);
            }
        }
        //b3: giải phóng kết nối
        $con->close();
        return $lsBook;
    }
    static function getListSearch($search=null){
        //Bước 1: tạo kết nối
        $con=ketnoi::connect();
        if($search==null||$search==""){
            $lsContact =ketnoi::getListFromDB();
            return $lsContact;
        }
        $lsContact = array();
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * from `contact` where Ten like '%$search%'";
        $result = $con->query($sql);    
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $contact = new ketnoi($row["ID"],$row["Ten"], $row["Email"], $row["SDT"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
    static function removeByName($id){
        //Bước 1: tạo kết nối
        $con=ketnoi::connect();
        //b2: thao tác với csdl: crud
        $sql = "DELETE FROM `contact` WHERE `contact`.`ID` = '$id'";
        $result=$con->query($sql);
        $lsBook=array();
        //b3: giải phóng kết nối
        $con->close();
    }
    static function editcontact($id, $ten, $email, $sdt)
    {
         //b1: Tao ket noi
         
         $con = ketnoi::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "UPDATE `contact` SET `ten` = '$ten', `email` = '$email',`sdt` = '$sdt' WHERE `contact`.`ID` = '$id'";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
    
    
}
?>