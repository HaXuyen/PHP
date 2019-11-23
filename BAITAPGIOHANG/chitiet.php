<?php
session_start();
include_once("model/user.php");
if (!isset($_SESSION["user"]))
    header("location:login.php");
    include_once("header.php")
?>
<?php
$user = unserialize($_SESSION["user"]);
include_once("giaodien.php");
include_once("model/hang.php");
$con = hang::connect();
if (isset($_REQUEST["MaHang"])) {
    $MaHang = $_REQUEST["MaHang"];
    $hang = hang::searchHangByID($MaHang);
}
?>



<br><br><br>
<h1 class="text-info text-center">Chi tiết sản phẩm</h1>
<br>
<div class="container">
    <div class="row m-0 ">
        <div class="col-12 col-lg-5">
            <?php echo $hang->Anh; ?> 
        </div>
        <div class="col-12 col-lg-7 px-3 py-3 bg-light">
            <form action="mua.php" method="get">
                <div class="w-100 my-2">
                    <h6>tên sản phẩm: <?php echo $hang->TenHang; ?></h6>

                </div>
                <div class="w-100 my-2 ">
                    <h6>giá sản phẩm: <?php echo $hang->Gia; ?> <u>VNĐ</u></h6>

                </div>
                <div class="w-100 my-2 ">
                    Số lượng mua:
                    <input type="number" name="numSL" required min="1">
                </div>
                <input type="hidden" name=MaHang" value="<?php echo $hang->MaHang;?>">
                <input type="hidden" name="Gia" value="<?php echo $hang->Gia;?>">
                <div class="w-100 ">
                    <button type="submit" class="btn btn-primary" name="addFromDetail">Thêm vào giỏ</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php include_once("footer.php") ?>