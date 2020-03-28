<?php 
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * FROM tbl_suppurude as s 
INNER JOIN tbl_house as h ON s.ref_family_id=h.family_id
INNER JOIN tbl_board as b ON h.ref_board_id=b.board_id
WHERE s.suppurude_id=$ID";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);


$ref_family_id = $row['ref_family_id'];

$query = "SELECT * FROM tbl_house 
WHERE family_id!=$ref_family_id ORDER BY house_no DESC" or die("Error:" . mysqli_error());
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
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลสัปปุรุษ<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลสัปปุรุษ</li>
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
                    <a class="float-right btn btn-dark btn-sm" href="./table_suppurude.php">
                        <i class="fas fa-th-list">
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="update_suppurude_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>บ้านเลขที่</label>
                                    <select name="ref_family_id" class="form-control">
                                        <option value="<?php echo $row['ref_family_id'];?>">
                                            -<?php echo $row['house_no'];?>-
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result2 as $results2){ ?>
                                        <option value="<?php echo $results2["family_id"];?>">
                                            - <?php echo $results2["house_no"];?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- <div class="form-group">
                                    <label>ผู้รับผิดชอบ</label>
                                    <select class="form-control">
                                        <option>--</option>
                                        <option>เจ้าของบ้าน</option>
                                        <option>ผู้อยู่อาศัย</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>เลขประจำตัวประชาชน</label>
                                    <input type="text" name="id_card_sup" class="form-control"
                                        value="<?php echo $row['id_card_sup'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>อยู่ในสถานะ</label>
                                    <select name="family_status" class="form-control">
                                        <option value="<?php echo $row['family_status'];?>">
                                            -<?php echo $row['family_status'];?>-
                                        </option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>เจ้าของบ้าน</option>
                                        <option>ผู้อยู่อาศัย</option>
                                        <option>ไม่อยู่แล้ว</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>คำนำหน้า</label>
                                    <select name="title_sup" class="form-control">
                                        <option value="<?php echo $row['title_sup'];?>">
                                            -<?php echo $row['title_sup'];?>-
                                        </option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>นาย</option>
                                        <option>นาง</option>
                                        <option>นางสาว</option>
                                        <option>เด็กชาย</option>
                                        <option>เด็กหญิง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>สถานะภาพปัจจุบัน</label>
                                    <select name="status_quo" class="form-control">
                                        <option value="<?php echo $row['status_quo'];?>">
                                            -<?php echo $row['status_quo'];?>-
                                        </option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>ยังอยู่</option>
                                        <option>เสียชีวิต</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อจริง</label>
                                    <input type="text" name="f_name_sup" class="form-control"
                                        value="<?php echo $row['f_name_sup'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>สถานะทางสังคม</label>
                                    <select name="social_status" class="form-control">
                                        <option value="<?php echo $row['social_status'];?>">
                                            -<?php echo $row['social_status'];?>-
                                        </option>
                                        <option>--เลือกข้อมูล--</option>
                                        <option>ปกติ</option>
                                        <option>พิการ</option>
                                        <option>ผู้ยากไร้</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>นามสกุลจริง</label>
                                    <input type="text" name="l_name_sup" class="form-control"
                                        value="<?php echo $row['l_name_sup'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุลบิดา</label>
                                    <input type="text" name="father" class="form-control"
                                        value="<?php echo $row['father'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เพศ</label>
                                    <select name="gender_sup" class="form-control">
                                        <option value="<?php echo $row['gender_sup'];?>">
                                            -<?php echo $row['gender_sup'];?>-
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <option value="ชาย">- ชาย</option>
                                        <option value="หญิง">- หญิง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุลมารดา</label>
                                    <input type="text" name="mother" class="form-control"
                                        value="<?php echo $row['mother'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>วัน เดือน ปีเกิด</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="birthday_sup" class="form-control"
                                        value="<?php echo $row['birthday_sup'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>หมายเหตุเพิ่มเติม</label>
                                    <textarea name="remark_sup" class="form-control" rows="3"><?php echo $row['remark_sup'];?></textarea>
                                </div>
                            </div>

                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="suppurude_id" value="<?php echo $row['suppurude_id'];?>">
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

    $('a[href^="./table_suppurude.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>