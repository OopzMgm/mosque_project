<?php 
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * FROM tbl_marriage as m
INNER JOIN tbl_suppurude as s ON m.ref_suppurude_id = s.suppurude_id
WHERE marriage_id=$ID";
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
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลสมรสของสัปปุรุษ<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลสมรสของสัปปุรุษ</li>
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
                    <form role="form" action="update_marriage_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">รหัสคู่สมรส</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" class="form-control" id="inputEmail3"
                                            value="<?php echo 'MR0'.$row['marriage_id'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="float-right btn btn-dark btn-sm" href="./table_marriage.php">
                                    <i class="fas fa-th-list"></i>
                                    </i>
                                    ดูข้อมูล
                                </a>
                            </div>
                        </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card card-gray-dark">
                            <div class="card-header">
                                <h3 class="card-title">ข้อมูลสัปปุรุษ</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="form-horizontal">
                                <div class="card-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>คำนำหน้า</label>
                                                <input type="text" name="" class="form-control"
                                                    value="<?php echo $row['title_sup'];?>" disabled>

                                                <!-- <select name="title_sup" class="form-control" disabled>
                                                    <option value="<?php echo $row['title_sup'];?>">
                                                        <?php echo $row['title_sup'];?>
                                                    </option>
                                                    <option value="">--เลือกข้อมูล--</option>
                                                </select> -->
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>ชื่อจริง</label>
                                                    <input type="text" name="" class="form-control"
                                                        value="<?php echo $row['f_name_sup'];?>" disabled>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>นามสกุลจริง</label>
                                                    <input type="text" name="" class="form-control"
                                                        value="<?php echo $row['l_name_sup'];?>" disabled>

                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>วัน
                                                        เดือน ปีเกิด</label>
                                                    <input type="date" name="" class="form-control"
                                                        value="<?php echo $row['birthday_sup'];?>" disabled>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>หมายเหตุเพิ่มเติม</label>
                                            <textarea name="remark_marriage" class="form-control"
                                                rows="3"><?php echo $row['remark_marriage'];?> </textarea>
                                        </div>

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <div class="card card-gray-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">ข้อมูลคู่สมรสคนที่1<h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>คำนำหน้า</label>
                                                    <select name="title_mate1" class="form-control">
                                                        <option value=""><?php echo $row['title_mate1'];?></option>
                                                        <option value="นาย">- นาย</option>
                                                        <option value="นาง">- นาง</option>
                                                        <option value="นางสาว">- นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3"
                                                    class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstname_mate1" class="form-control"
                                                        value="<?php echo $row['firstname_mate1'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">นามสกุลจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lastname_mate1" class="form-control"
                                                        value="<?php echo $row['lastname_mate1'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">วัน
                                                    เดือน ปีเกิด</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="birthday_mate1" class="form-control"
                                                        value="<?php echo $row['birthday_mate1'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">วันแต่งงาน</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="wedding_date1" class="form-control"
                                                            value="<?php echo $row['wedding_date1'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อผู้ทำพิธี</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="organize1" class="form-control"
                                                        value="<?php echo $row['organize1'];?>">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อพยาน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="witness1" class="form-control"
                                                        value="<?php echo $row['witness1'];?>">

                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <!-- /.card-footer -->
                                    </div>
                                </div>
                                <!-- /.card -->

                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="card card-gray-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">ข้อมูลคู่สมรสคนที่2</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>คำนำหน้า</label>
                                                    <select name="title_mate2" class="form-control">
                                                        <option value=""><?php echo $row['title_mate2'];?></option>
                                                        <option value="นาย">- นาย</option>
                                                        <option value="นาง">- นาง</option>
                                                        <option value="นางสาว">- นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3"
                                                    class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstname_mate2" class="form-control"
                                                        value="<?php echo $row['firstname_mate2'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">นามสกุลจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lastname_mate2" class="form-control"
                                                        value="<?php echo $row['lastname_mate2'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">วัน
                                                    เดือน ปีเกิด</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="birthday_mate2" class="form-control"
                                                        value="<?php echo $row['birthday_mate2'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">วันแต่งงาน</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="wedding_date2" class="form-control"
                                                            value="<?php echo $row['wedding_date2'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อผู้ทำพิธี</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="organize2" class="form-control"
                                                        value="<?php echo $row['organize2'];?>">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อพยาน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="witness2" class="form-control"
                                                        value="<?php echo $row['witness2'];?>">

                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                            <!-- /.card-footer -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <div class="card card-gray-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">ข้อมูลคู่สมรสคนที่3<h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>คำนำหน้า</label>
                                                    <select name="title_mate3" class="form-control">
                                                        <option value=""><?php echo $row['title_mate3'];?></option>
                                                        <option value="นาย">- นาย</option>
                                                        <option value="นาง">- นาง</option>
                                                        <option value="นางสาว">- นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3"
                                                    class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstname_mate3" class="form-control"
                                                        value="<?php echo $row['firstname_mate3'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">นามสกุลจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lastname_mate3" class="form-control"
                                                        value="<?php echo $row['lastname_mate3'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">วัน
                                                    เดือน ปีเกิด</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="birthday_mate3" class="form-control"
                                                        value="<?php echo $row['birthday_mate3'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">วันแต่งงาน</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="wedding_date3" class="form-control"
                                                            value="<?php echo $row['wedding_date3'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อผู้ทำพิธี</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="organize3" class="form-control"
                                                        value="<?php echo $row['organize3'];?>">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อพยาน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="witness3" class="form-control"
                                                        value="<?php echo $row['witness3'];?>">

                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <!-- /.card-footer -->
                                    </div>
                                </div>
                                <!-- /.card -->

                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="card card-gray-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">ข้อมูลคู่สมรสคนที่4</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>คำนำหน้า</label>
                                                    <select name="title_mate4" class="form-control">
                                                        <option value=""><?php echo $row['title_mate4'];?></option>
                                                        <option value="นาย">- นาย</option>
                                                        <option value="นาง">- นาง</option>
                                                        <option value="นางสาว">- นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3"
                                                    class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstname_mate4" class="form-control"
                                                        value="<?php echo $row['firstname_mate4'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">นามสกุลจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lastname_mate4" class="form-control"
                                                        value="<?php echo $row['lastname_mate4'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">วัน
                                                    เดือน ปีเกิด</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="birthday_mate4" class="form-control"
                                                        value="<?php echo $row['birthday_mate4'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">วันแต่งงาน</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="wedding_date4" class="form-control"
                                                            value="<?php echo $row['wedding_date4'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อผู้ทำพิธี</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="organize4" class="form-control"
                                                        value="<?php echo $row['organize4'];?>">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-3 col-form-label">ชื่อพยาน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="witness4" class="form-control"
                                                        value="<?php echo $row['witness4'];?>">

                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                            <!-- /.card-footer -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>

                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="marriage_id" value="<?php echo $row['marriage_id'];?>">
                        <input type="hidden" name="ref_suppurude_id" value="<?php echo $row['suppurude_id'];?>">
                        <button class="btn btn-info" type="submit">บันทึก</button>
                        <button class="btn btn-default" type="reset">ยกเลิก</button>
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

    $('a[href^="./table_marriage_create.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>