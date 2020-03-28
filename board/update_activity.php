<?php 
include('./include_menu.php'); 
$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_activity as a 
WHERE a.activity_id=$ID";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลรูปภาพกิจกรรม<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลรูปภาพกิจกรรม</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements disabled -->
            <div class="card">
                <div class="card-header">
                    <a class="float-right btn btn-dark btn-sm" href="./table_activity.php">
                        <i class="fas fa-th-list">
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="update_activity_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <!-- <div class="row">
                            <div class="col-sm-2">

                            </div> -->

                        <div class="col-sm-10">
                            ________ ภาพปัจจุบัน ________
                            <br>
                            <img src="../ac_img/<?php echo $row['image'];?>" width="200px">
                            <br>
                        </div><br>
                        <div class="col-sm-6">

                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อกิจกรรม</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?php echo $row['name'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea name="detail" class="form-control" required id="editor"><?php echo $row['detail'];?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">รูปภาพ</label>
                                    (เลือกภาพใหม่)
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="exampleInputFile" accept="image/*" class="form-control">
                                            <label class="custom-file-label" for="exampleInputFile">เลือกรูปภาพ</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">อัพโหลด</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div>
                        <input type="hidden" name="image2" value="<?php echo $row['image'];?>">
                        <input type="hidden" name="activity_id" value="<?php echo $row['activity_id'];?>">
                        <input type="hidden" name="activity_edit_name" value="<?php echo $f_name_board;?>">
                        <input type="hidden" name="date_edit" value="<?php echo date('Y-m-d H:i:s');?>">
                        <input type="hidden" name="ref_board_id" value="<?php echo $board_id;?>">
                        <button class="btn btn-info" type="submit">บันทึก</button>
                        <button class="btn btn-default" type="reset">ยกเลิก</button>
                        <!-- <button class="btn btn-default float-right" type="submit">Cancel</button> -->
                    </div>

                </div>
                </form>
                <!-- /.card-header -->
            </div>
            <!-- /.card -->
        </div>
        <br><br>
</div>
<!-- /.card -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {

    $('a[href^="./table_activity.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>