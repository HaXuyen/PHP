
<?php include_once("model/cart.php")?>
<?php include_once("model/cartItem.php")?>
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

?>
<?php
//khởi tạo:
if (!isset($_SESSION)) {
    session_start();
}
//unset($_SESSION["cart"]);
$lsCartItem = array();
$lsCartItem = unserialize($_SESSION["cart"]);
if (isset($_REQUEST["addFromDetail"])) {
    $MaHang = $_REQUEST["MaHang"];
    $num = $_REQUEST["numSL"];
    $hang = hang::searchHangByID($MaHang);
    //
    $kt = 0;
    foreach ($lsCartItem as $key => $value) {
        if ($value->MaHang == $MaHang) {
            $value->SoLuong += $num;
            echo $value->SoLuong;
            $kt = 1;
            break;
        }
    }
    if ($kt != 1) {
        $cartItem = new cartItem($MaHang, $hang->TenHang, $hang->Gia, $num);
        array_push($lsCartItem, $cartItem);
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:mua.php");
}
if (isset($_REQUEST["addFrom"])) {
    $MaHang = $_REQUEST["MaHang"];
    $num = $_REQUEST["numSL"];
    $hang = hang::searchHangByID($MaHang);
    //
    $kt = 0;
    foreach ($lsCartItem as $key => $value) {
        if ($value->MaHang == $MaHang) {
            $value->SoLuong += $num;
            echo $value->SoLuong;
            $kt = 1;
            break;
        }
    }
    if ($kt != 1) {
        $cartItem = new cartItem($MaHang, $hang->TenHang, $hang->Gia, $num);
        array_push($lsCartItem, $cartItem);
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:mua.php");
}
if (isset($_REQUEST["delete"])) {
    $MaHang = $_REQUEST["MaHang"];
    foreach ($lsCartItem as $key => $value) {
        if ($value->MaHang == $MaHang) {
            unset($lsCartItem[$key]);
            break;
        }
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:mua.php");
}
?>

<div class="container">
    <div class="table-responsive w-100">
        <table class="table">
        <tr>
            <th>Mã hàng</th>
            <th>Tên hàng</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Thao tác</th>
        </tr>
        <?php
            $total= 0;
            foreach ($lsCartItem as $key => $value){?>
                <tr>
                    <td><?php echo $value->MaHang?></td>
                    <td class="d-flex">
                    <?php echo $value->TenHang; ?>
                    </td>
                    <td><?php echo $value->Gia;?></td>
                    <td><input type="number" name="numSL" value="<?php echo $value->SoLuong?>"></td>
                    <td><?php echo $value->totalCost;?></td>
                    <td><a class="btn btn-info py-0" href="?delete=&MaHang=<?php echo $value->MaHang; ?>">Xóa</a></td>
                </tr>
                <?php $total+=$value->totalCost;
            }
                ?>
        </table>
        <div>
        <h5 align="right">Tổng: <?php $total; ?>Đ</h5>
        </div>
    </div>
</div>
<?php include_once("footer.php") ?>