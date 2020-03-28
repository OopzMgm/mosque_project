<?php 
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_board as b 
INNER JOIN tbl_house as h ON h.ref_board_id=b.board_id
WHERE h.family_id=$ID";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);


$ref_board_id = $row['ref_board_id'];

$query = "SELECT * FROM tbl_board
WHERE board_id!=$ref_board_id" or die("Error:" . mysqli_error());
$result2 = mysqli_query($condb, $query);

?>
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลสำเนาทะเบียนบ้าน<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลสำเนาทะเบียนบ้าน</li>
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
                    <form role="form" action="update_house_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>บ้านเลขที่</label>
                                    <input type="text" name="house_no" class="form-control" value="<?php echo $row['house_no'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>จังหวัด</label>
                                    <input type="text" name="province" class="form-control" value="<?php echo $row['province'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เลขรหัสประจำบ้าน</label>
                                    <input type="text" name="house_code" class="form-control" value="<?php echo $row['house_code'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>อำเภอ</label>
                                    <input type="text" name="sub_district" class="form-control" value="<?php echo $row['sub_district'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>หมู่ที่</label>
                                        <input type="text" name="villageno" class="form-control" value="<?php echo $row['villageno'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ตำบล</label>
                                    <input type="text" name="district" class="form-control" value="<?php echo $row['district'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ซอย-แยก</label>
                                    <input type="text" name="lane" class="form-control" value="<?php echo $row['lane'];?>"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>รหัสไปรษณีย์</label>
                                        <input type="text" name="postal_code" class="form-control" value="<?php echo $row['postal_code'];?>"
>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ถนน-คลอง</label>
                                    <input type="text" name="street" class="form-control" value="<?php echo $row['street'];?>"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                    <label>ผู้รับผิดชอบ</label>
                                    <select name="ref_board_id" class="form-control">
                                        <option value="<?php echo $row['ref_board_id'];?>">
                                            <?php echo $row['f_name_board'].' '.$row['l_name_board'];?>
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result2 as $results2){ ?>
                                            <option value="<?php echo $results2["board_id"];?>">
                                            - <?php echo $results2["f_name_board"].' '.$results2["l_name_board"];?>
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
                                    <input type="text" name="village" class="form-control"  value="<?php echo $row['village'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>หมายเหตุเพิ่มเติม</label>
                                        <textarea name="remark" class="form-control" rows="3"><?php echo $row['remark'];?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="family_id" value="<?php echo $row['family_id'];?>">
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