<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php
//Mã php của trang chủ
include_once("model/ketnoi.php");
$con = ketnoi::connect();
if (isset($_REQUEST["addBook"])) {
    $id = $_REQUEST["id"];
    $ten = $_REQUEST["Ten"];
    $email = $_REQUEST["Email"];
    $sdt = $_REQUEST["SDT"];
   ketnoi:: insert($ten, $email, $sdt);
}
if (isset($_REQUEST['id_edit'])) {
    $id = $_REQUEST["id_edit"];
    $ten = $_REQUEST["ten"];
    $email = $_REQUEST["email"];
    $sdt = $_REQUEST["sdt"];
    ketnoi::removeByName($id);
    ketnoi::insert( $ten, $email, $sdt);
}
if (isset($_REQUEST['id_delete'])) {
    ketnoi::removeByName($_REQUEST['id_delete']);
}
$lsfromDB=ketnoi:: getListfromDB();
$keyWord = null;
if (isset($_REQUEST["search"])) {
    $keyWord =  $_REQUEST["search"];
    if ($_REQUEST["search"] == "") {
        $keyWord = null;   
    }
    $lsContact =ketnoi::getListFromDB();
}
$lsFromSearchDB = ketnoi::getListSearch($keyWord);
?>
<div class="container pt-5">
<form action="" method="GET">
        <div class="form-group">
            <input class="form-control" value="<?php echo $keyWord ?>" name="search" style="max-width: 200px; display:inline-block;" placeholder="Search">
            <button type="submit" class="btn btn-default" style="margin-left:-50px" ><i class="fas fa-search"></i></button>
        </div>
    </form action="kiemtra.php">
<table class="table mt-5">
        <thead class="thead-dark">
            <tr>
               
                <th>Tên</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lsFromSearchDB as $key => $value) {
                ?>
                <tr>
                    <!-- <td><?php echo $key + 1 ?></td> -->
                    <td><?php echo $value->ten ?></td>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo $value->sdt ?></td>
                    <td>
                    <button type="button" data-toggle="modal" data-target="#editBook<?php echo $key ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i> Edit</button>

                        <button type="button" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $key ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <!-- modal delete_confirm -->
                        <form action="">
                            <div class="modal fade" id="confirmDeleteModal<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Delete this contact?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger" name='id_delete' value="<?php echo $value->id ?>">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal delete_confirm -->

                        </form>
                        <!-- modal editBook -->
                        <div class="modal fade" id="editBook<?php echo $key ?>"  tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit contact</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset>
                                                <!-- <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                                    <div class="col-md-10">
                                                        <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                                    </div>
                                                </div> -->
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="Ten">Tên</label>
                                                    <div class="col-md-10">
                                                        <input id="ten" name="ten" type="text" value="<?php echo $value->ten ?>" placeholder="<?php echo $value->ten ?>" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="email">Email</label>
                                                    <div class="col-md-10">
                                                        <input id="email" name="email" type="text" value="<?php echo $value->email ?>" placeholder="<?php echo $value->email ?>" class="form-control input-md">
                                                    </div>
                                                </div>


                                                <!-- Text input-->
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="sdt">SDT</label>
                                                    <div class="col-md-10">
                                                        <input id="sdt" name="sdt" type="text" value="<?php echo $value->sdt ?>" placeholder="<?php echo $value->sdt ?>" class="form-control input-md">

                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name='id_edit' value="<?php echo $value->id ?>" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- end modal editbook -->
                    </td>
                </tr>
                <?php
            }?>
            
        </tbody>
</table>
<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new contacts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="Ten">Tên</label>
                            <div class="col-md-10">
                                <input id="Ten" name="Ten" type="text" placeholder="Tên" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="Email">Email</label>
                            <div class="col-md-10">
                                <input id="Email" name="Email" type="text" placeholder="Email" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="SDT">SĐT</label>
                            <div class="col-md-10">
                                <input id="SDT" name="SDT" type="text" placeholder="Số điện thoại" class="form-control input-md">
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addBook" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="addnhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhãn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="Ten">Tên nhãn</label>
                            <div class="col-md-10">
                                <input id="Ten" name="Ten" type="text" placeholder="Tên" class="form-control input-md">
                            </div>
                        </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addnhan" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("footer.php") ?>