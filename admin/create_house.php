<?php 
include('./include_menu.php'); 

$query = "SELECT * FROM tbl_board" or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);
?>

<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">เพิ่มข้อมูลสำเนาทะเบียนบ้าน<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลสำเนาทะเบียนบ้าน</li>
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
                    <a class="float-right btn btn-dark btn-sm" href="./table_house.php">
                        <i class="fas fa-th-list"></i>
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="create_house_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>บ้านเลขที่</label>
                                    <input type="text" name="house_no" class="form-control" placeholder="ป้อน . . ."
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>จังหวัด</label>
                                    <input type="text" name="province" class="form-control" value="สงขลา"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เลขรหัสประจำบ้าน</label>
                                    <!-- <input type="text" name="house_code" class="form-control" pattern="[0-9]{11}" placeholder="ป้อน 11 หลัก"
                                        required> -->
                                        <input type="text" name="house_code" class="form-control" pattern="[0-9]{11}" placeholder="ป้อน 11 หลัก"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>อำเภอ</label>
                                    <input type="text" name="sub_district" class="form-control" value="นาทวี"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>หมู่ที่</label>
                                        <input type="text" name="villageno" class="form-control"
                                            value="12" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ตำบล</label>
                                    <input type="text" name="district" class="form-control" value="นาทวี"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ซอย-แยก</label>
                                    <input type="text" name="lane" class="form-control" value="-"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>รหัสไปรษณีย์</label>
                                        <input type="text" name="postal_code" class="form-control" value="90160"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ถนน-คลอง</label>
                                    <input type="text" name="street" class="form-control" value="-"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ผู้รับผิดชอบ</label>
                                    <select name="ref_board_id" class="form-control" required>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result as $results){ ?>
                                        <option value="<?php echo $results["board_id"];?>">
                                            - <?php echo $results["f_name_board"].' '.$results["l_name_board"];?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>หมู่บ้าน</label>
                                    <input type="text" name="village" class="form-control" value="ลำลอง"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>หมายเหตุเพิ่มเติม</label>
                                        <textarea name="remark" class="form-control" rows="3"
                                            placeholder="ป้อน . . ."></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
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

    $('a[href^="./table_house.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>