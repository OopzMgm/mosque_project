<?php 
include('./include_menu.php'); 

$query = "SELECT * FROM tbl_position" or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);

$query2 = "SELECT * FROM tbl_area_board" or die("Error:" . mysqli_error());
$result2 = mysqli_query($condb, $query2);
?>

<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">เพิ่มข้อมูลคณะกรรมการ<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลคณะกรรมการ</li>
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
                        <i class="fas fa-th-list"></i>
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form role="form" action="create_board_db.php" method="post" name="form1"  onsubmit="return checkForm();" class="form-horizontal" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้</label>
                                    <input type="text" name="username" class="form-control" placeholder="ป้อน . . ." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>คำนำหน้า</label>
                                    <select name="title" class="form-control" required>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <option value="นาย">- นาย</option>
                                        <option value="นาง">- นาง</option>
                                        <option value="นางสาว">- นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" placeholder="ป้อน . . ." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ชื่อจริง</label>
                                    <input type="text" name="f_name_board" class="form-control" placeholder="ป้อน . . ." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="exampleInputFile">รูปภาพ</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" required
                                                id="exampleInputFile" eccept="image/*">
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
                                    <label>นามสกุลจริง</label>
                                    <input type="text" name="l_name_board" class="form-control" placeholder="ป้อน . . ." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ระดับเข้าระบบ</label>
                                    <select name="user_level" class="form-control" required>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <option value="admin">- นายทะเบียน/admin</option>
                                        <option value="board">- คณะกรรมการ/board</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>เพศ</label>
                                    <select name="gender" class="form-control" required>
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
                                        <div class="input-group-prepend" >
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <!-- <input type="date" name="birthday" class="form-control" required> -->
                                        <input type="date" name="birthday" class="form-control">
                                        <!-- <input class="input-medium" type="text" data-provide="datepicker" data-date-language="th-th"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เลขประจำตัวประชาชน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <!-- <input type="text" name="id_card" id="idcard" pattern="[0-9]{13,16}" class="form-control" required> -->
                                        <!-- <input type="text" name="id_card" id="idcard" pattern="[0-9]{13}" class="form-control" required> -->
                                        <input type="text" name="id_card"  pattern="[0-9]{13}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>อีเมล</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <!-- <input type="email" name="email" class="form-control" required> -->
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <!-- <input type="text" name="telephone" minlength="10" maxlength="10" class="form-control" required> -->
                                        <!-- <input type="tel" id="phone" name="telephone" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"  class="form-control" required oninvalid="this.setCustomValidity('ป้อนในรูปแบบตัวอย่าง')"/> -->
                                        <!-- <input type="tel" id="phone" name="telephone" placeholder="" pattern="[0-9]{10}"  class="form-control" required> -->
                                        <input type="tel" id="phone" name="telephone" placeholder="" pattern="[0-9]{10}"  class="form-control">
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
                                    <select name="ref_position_id" class="form-control" required>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result as $results){ ?>
                                        <option value="<?php echo $results["position_id"];?>">
                                            - <?php echo $results["position_name"];?>
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
                                    <select name="ref_area_id" class="form-control" required>
                                        <option value="">--เลือกข้อมูล--</option>
                                        <?php foreach($result2 as $results2){ ?>
                                        <option value="<?php echo $results2["area_id"];?>">
                                            - <?php echo $results2["area_name"];?>
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
                                    <label>หมายเหตุเพิ่มเติม</label>
                                    <textarea name="remark" class="form-control" rows="3" placeholder="ป้อน . . ."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <button class="btn btn-info" type="submit" >บันทึก</button>
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

    $('a[href^="./table_board.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>
<!-- <script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm(){ 
    if(!checkID(document.form1.id_card.value)){
    $('#idcard').select().focus().val('');
    alert('รหัสประชาชนไม่ถูกต้อง');
    return false;
    }else{
    return true;
    }
}
</script> -->

<script type="text/javascript">
      function demo() {
        $('.datepicker').datepicker();
      }
    
        </script>