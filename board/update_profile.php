<?php 
include('./include_menu.php'); 
?>
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลส่วนตัว<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลส่วนตัว</li>
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
                    <a class="float-right btn btn-dark btn-sm" href="./table_board.php">
                        <i class="fas fa-th-list">
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="update_profile_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <!-- <div class="row">
                            <div class="col-sm-2">

                            </div> -->

                        <div class="col-sm-10">
                            ________ ภาพปัจจุบัน ________
                            <br>
                            <img src="../bimg/<?php echo $row['image'];?>" width="200px">
                            <br>
                        </div><br>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?php echo $row['username'];?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>คำนำหน้า</label>
                                    <select name="title" class="form-control">
                                        <option value="<?php echo $row['title'];?>">-<?php echo $row['title'];?>-
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <option value="นาย">- นาย</option>
                                        <option value="นาง">- นาง</option>
                                        <option value="นางสาว">- นางสาว</option>
                                    </select>
                                </div>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ชื่อจริง</label>
                                    <input type="text" name="f_name_board" class="form-control"
                                        value="<?php echo $row['f_name_board'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>สถานะ</label>
                                    <select name="user_level" class="form-control" disabled>
                                        <option value="<?php echo $row['user_level'];?>">
                                            <?php echo $row['user_level'];?>
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php 
                                        $ul =  $row['user_level'];
                                        if($ul=='admin'){
                                        echo '<option value"board">admin</option>';
                                        }else{
                                        echo '<option value="admin">admin</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>นามสกุลจริง</label>
                                    <input type="text" name="l_name_board" class="form-control"
                                        value="<?php echo $row['l_name_board'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เพศ</label>
                                    <select name="gender" class="form-control">
                                        <option value="<?php echo $row['gender'];?>">-<?php echo $row['gender'];?>-
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <option value="ชาย">- ชาย</option>
                                        <option value="หญิง">- หญิง</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>วัน เดือน ปีเกิด</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="birthday" class="form-control"
                                            value="<?php echo $row['birthday'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เลขประจำตัวประชาชน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" name="id_card" class="form-control"
                                            value="<?php echo $row['id_card'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>อีเมล</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                            value="<?php echo $row['email'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="telephone" class="form-control"
                                            data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask=""
                                            im-insert="true" value="<?php echo $row['telephone'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <select name="ref_position_id" class="form-control" disabled>
                                        <option value="<?php echo $row['ref_position_id'];?>">
                                            <?php echo $row['position_name'];?>
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result2 as $results2){ ?>
                                        <option value="<?php echo $results2["position_id"];?>">
                                            - <?php echo $results2["position_name"];?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เขตคณะกรรมการ</label>
                                    <select name="ref_area_id" class="form-control" disabled>
                                        <option value="<?php echo $row['ref_area_id'];?>"><?php echo $row['area_name'];?>
                                        </option>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result3 as $results3){ ?>
                                        <option value="<?php echo $results3["area_id"];?>">
                                            - <?php echo $results3["area_name"];?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div name="remark" class="form-group">
                                    <label>หมายเหตุเพิ่มเติม</label>
                                    <textarea class="form-control" rows="3"><?php echo $row['remark'];?></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="image2" value="<?php echo $row['image'];?>">
                        <input type="hidden" name="board_id" value="<?php echo $row['board_id'];?>">
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

    $('a[href^="./update_profile.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>