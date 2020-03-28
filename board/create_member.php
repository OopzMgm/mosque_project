<?php 
include('./include_menu.php'); 
$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_suppurude 
WHERE suppurude_id=$ID";
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
                    <h1 class="m-0 text-dark">เพิ่มข้อมูลสมาชิกกองทุนผู้เสียชีวิต<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลสมาชิกกองทุนผู้เสียชีวิต</li>
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
                <form role="form" action="create_member_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">รหัสสัปปุรุษ</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ref_suppurude_id" class="form-control"
                                            value="<?php echo 'S'.$row['suppurude_id'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ref_suppurude_id" class="form-control"
                                            value="<?php echo $row['title_sup'].' '. $row['f_name_sup'].' '. $row['l_name_sup'];?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="float-right btn btn-dark btn-sm" href="./table_member_create.php">
                                    <i class="fas fa-th-list"></i>
                                    </i>
                                    ดูข้อมูล
                                </a>
                            </div>
                        </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" name="username_member" class="form-control" placeholder="ป้อน . . ."
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="password_member" class="form-control"
                                    placeholder="ป้อน . . ." required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputFile">รูปภาพ</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image_member" eccept="image/*"
                                            class="custom-file-input" required id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">เลือกรูปภาพ</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">อัพโหลด</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ภาพโปรไฟล์ :
                                </div>
                                <div class="col-sm-4">
                                    <input type="file" name="m_img" class="form-control" accept="image/*">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>อีเมล</label>
                                <input type="email" name="email_member" class="form-control" placeholder="ป้อน . . .">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" name="telephone_member" pattern="[0-9]{10}" class="form-control" placeholder="ป้อน . . .">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>หมายเหตุเพิ่มเติม</label>
                                <textarea name="remark_member" class="form-control" rows="3"
                                    placeholder="ป้อน . . ."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="user_level_member" value="member">
                        <input type="hidden" name="ref_suppurude_id" value="<?php echo $suppurude_id;?>">
                        <input type="hidden" name="ref_board_id" value="<?php echo $board_id;?>">
                        <button class="btn btn-info" type="submit">บันทึก</button>
                        <button class="btn btn-default" type="submit">ยกเลิก</button>
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

    $('a[href^="./table_member_create.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>