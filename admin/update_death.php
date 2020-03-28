<?php 
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_death as d 
INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id
WHERE d.death_id=$ID";
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
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลใบมรณะบัตร<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลใบมรณะบัตร</li>
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
                <form role="form" action="update_death_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">รหัสผู้เสียชีวิต</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="" class="form-control"
                                            value="<?php echo 'D00'.$row['suppurude_id'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" class="form-control"
                                            value="<?php echo $row['title_sup'].''. $row['f_name_sup'].' '. $row['l_name_sup'];?>"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="float-right btn btn-dark btn-sm" href="./table_death.php">
                                    <i class="fas fa-th-list"></i>
                                    </i>
                                    ดูข้อมูล
                                </a>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>หมายเลขใบมรณะบัตร</label>
                                    <input type="text" name="d_certificate" class="form-control"
                                    value="<?php echo $row['d_certificate'];?>" placeholder="ป้อน . . .">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ออกโดย</label>
                                    <input type="text" name="officer" class="form-control"  value="<?php echo $row['officer'];?>"placeholder="ป้อน . . ."
                                        >
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>วัน-เวลาที่เสียชีวิต</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="datetime-local" name="date_death" value="<?php echo $row['date_death'];?>" class="form-control"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask="" im-insert="false">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>อายุ ณ วันที่ตาย</label>
                                    <input type="text" name="death_age" class="form-control"  value="<?php echo $row['death_age'];?>" placeholder="ป้อน . . ." disabled>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>เหตุที่เสียชีวิต</label>
                                    <select name="cause_death" class="form-control" >
                                        <option><?php echo $row['cause_death'];?></option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>ป่วย</option>
                                        <option>เกิดอุบัติเหตุ</option>
                                        <option>ชรา</option>
                                        <option>กระทำตัวเอง</option>
                                        <option>ถูกฆาตกรรม</option>
                                        <option>อื่นๆ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>สถานที่เสียชีวิต</label>
                                    <select name="death_place" class="form-control">
                                        <option><?php echo $row['death_place'];?></option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>ที่บ้าน</option>
                                        <option>โรงพยาบาล</option>
                                        <option>อื่นๆ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>สถานที่ละหมาด</label>
                                    <input type="text" name="prayer_place" class="form-control"  value="<?php echo $row['prayer_place'];?>" placeholder="ป้อน . . .">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>สถานที่ฝัง</label>
                                    <input type="text" name="burial_ground" class="form-control"  value="<?php echo $row['burial_ground'];?>" placeholder="ป้อน . . .">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>หมายเหตุเพิ่มเติม</label>
                                    <textarea name="remark_death" class="form-control" rows="3"
                                        placeholder="ป้อน . . ."><?php echo $row['remark_death'];?></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                     <input type="hidden" name="death_id" value="<?php echo $death_id;?>">
                     <input type="hidden" name="ref_suppurude_id" value="<?php echo $suppurude_id;?>">
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

    $('a[href^="./table_death.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>