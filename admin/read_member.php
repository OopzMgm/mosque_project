<?php  
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_member as m 
INNER JOIN tbl_suppurude as s ON m.ref_suppurude_id = s.suppurude_id
INNER JOIN tbl_board as b ON m.ref_board_id = b.board_id
INNER JOIN tbl_house as h ON s.ref_family_id = h.family_id
WHERE m.member_id=$ID";
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
                    <h1 class="m-0 text-dark">ข้อมูลสมาชิกกองทุนฯ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลสมาชิกกองทุนฯ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    <h2 class="text-muted text-md"><b>ชื่อผู้ใช้: </b> <?php echo $row['username_member'];?> </h2>
                    <h2 class="text-muted text-md"><b>รหัสผ่าน: </b> <?php echo $row['password_member'];?> </h2>
                    <h2 class="text-muted text-md"><b>ระดับเข้าระบบ: </b> <?php echo $row['user_level_member'];?> </h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                           
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                    เบอร์โทรศัพท์: <?php echo $row['telephone_member'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>
                                    อีเมล: <?php echo $row['email_member'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span>
                                    เลขรหัสประจำตัวประชาชน: <?php echo $row['id_card_sup'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
                                    วัน เดือน ปีเกิด: <?php echo date('d/m/Y', strtotime($row["birthday_sup"]));?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span>
                                    เพศ: <?php echo $row['gender_sup'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                                    ที่อยู่ : <?php echo 'หมู่ที่ '.$row['villageno'] .' ซอย/แยก '.$row['lane'] .' ถนน/คลอง '.$row['street'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspตำบล'.$row['district'] .' อำเภอ'.$row['sub_district'] .' จังหวัด'.$row['province'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspรหัสไปรษณีย์ '.$row['postal_code'];?></li>
                                  <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-comment-dots"></i></span>
                                    หมายเหตุเพิ่มเติม: <?php echo $row['remark_sup'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                                    วันที่ลงทะเบียน: <?php echo date('d/m/Y H:i:s', strtotime($row["date_save_member"]));?></li>
                            </ul>
                        </div>
                   
                        <div class="col-5 text-center">
                            <img class="img-circle img-fluid" alt="image" src="../mimg/<?php echo $row['image_member'];?>"
                                width="50%">
                            <br><br>
                            <h1 class="text-muted text-md"><?php echo  $row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'];?></h1>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a class="float-right btn btn-dark btn-sm" href="./table_member.php">
                            <i class="fas fa-th-list">
                            </i>
                            ดูข้อมูล
                        </a>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
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

    $('a[href^="./table_member.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>