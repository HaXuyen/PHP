<?php
session_start();
include_once("model/user.php");
if (!isset($_SESSION["user"]))
    header("location:login.php");
    include_once("header.php")
?>
<?php
//Mã php của trang chủ
$user = unserialize($_SESSION["user"]);
include_once("giaodien.php");
include_once("model/hang.php");
$con = hang::connect();
$lsfromDB=hang:: getListfromDB();

?>
<h1 align="center">Giỏ hàng</h1>
<div class="container">
    <div class="table-responsive w-100">
        <table class="table">
        <tr>
            <td><th>Mã hàng</th></td>
            <td><th>Tên hàng</th></td>
            <td><th>Số lượng</th></td>
            <td><th>Giá</th></td>
            <td><th>Tổng</th></td>
            <td><th>Thao tác</th></td>
        </tr>

        </table>
    </div>
</div>
<?php include_once("footer.php") ?>