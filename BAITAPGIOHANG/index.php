
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
<h1 align="center">SẢN PHẨM</h1>
<div class="container pt-5">
<!-- <table class="table mt-5"> -->
            <?php
            foreach ($lsfromDB as $key => $value) {
                ?>
              <div class=" col-6 col-md-4 col-lg-3  mx-0 px-2 mt-4 mb-5">
                        <div class="w-100 d-inline-block bg-white px-3 py-2 m-0 text-center" class="w-auto h-100" style="height:240px;"><?php echo $value->Anh?></div>
                        <br>
                        <div class="row product-name d-block text-center  px-3 py-5 m-0 " style="height: 50px;">
                            <h4 style="color: red"><?php echo $value->TenHang; ?></h4>
                        </div>
                        <div class="row product-name d-block text-center  px-3 py-3 m-0" style="height: 50px;">
                            <h6>Số lượng: <?php echo $value->SoLuong; ?></h6>
                        </div>
                        <div class="row product-price d-block text-center px-3 py-2 m-0" style="height: 50px; overflow: hidden;">
                            <h5>Giá: <?php echo $value->Gia; ?> đ</h5>
                        </div>
                        <div class="row product-name d-block text-center  px-3 py-3 m-0" style="height: 50px;">
                            <h6>Mã loại: <?php echo $value->MaLoai; ?></h6>
                        </div>
                        <div class="row product-action   px-5 py-2 m-0" style="height: 100px;">
                        <div class="w-50 text-center pl-4"><a href="chitiet.php?MaHang=<?php echo $value->MaHang;?>" style="font-size: 15px;">Chi tiết</a></div><br>
                        <div class="w-50 text-center pr-4"><button class="btn btn-success" ><a href="mua.php?addForm=&MaHang=<?php echo $value->MaHang?>&numSL=1" style="font-size: 15px; color: white; text-decoration: none;">Đặt mua</a></button></div>
                        </div>
                    </div>
                <?php
            }
            ?>
            
<!-- </table> -->
</div>

<?php include_once("footer.php") ?>
