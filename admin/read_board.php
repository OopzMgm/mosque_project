<?php  
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_board as b 
INNER JOIN tbl_position as p ON b.ref_position_id=p.position_id
INNER JOIN tbl_area_board as a ON b.ref_area_id=a.area_id
WHERE b.board_id=$ID";
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
                    <h1 class="m-0 text-dark">ข้อมูลคณะกรรมการ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลคณะกรรมการ</li>
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
                    <h2 class="text-muted text-md"><b>ชื่อผู้ใช้: </b> <?php echo $row['username'];?> </h2>
                    <h2 class="text-muted text-md"><b>รหัสผ่าน: </b> <?php echo $row['password'];?> </h2>
                    <h2 class="text-muted text-md"><b>ระดับเข้าระบบ: </b> <?php echo $row['user_level'];?> </h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <!-- <h2 class="lead"></h2> -->
                            <h2 class="text-muted text-sm"><b>ชื่อ-นามสกุล: </b>
                                <?php echo $row['title'] .''.$row['f_name_board'] .' '.$row['l_name_board'];?> </h2>
                            <h2 class="text-muted text-sm"><b>ตำแหน่ง: </b> <?php echo $row['position_name'];?> </h2>
                            <h2 class="text-muted text-sm"><b>เขตที่รับผิดชอบ: </b> <?php echo $row['area_name'];?></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                    เบอร์โทรศัพท์: <?php echo $row['telephone'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>
                                    อีเมล: <?php echo $row['email'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span>
                                    เลขรหัสประจำตัวประชาชน: <?php echo $row['id_card'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
                                    วัน เดือน ปีเกิด: <?php echo date('d-m-',strtotime($row['birthday']));
                                     $y = date('Y',strtotime($row['birthday']));
                                     echo $y+543;
                                ?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span>
                                    เพศ: <?php echo $row['gender'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-comment-dots"></i></span>
                                    หมายเหตุเพิ่มเติม: <?php echo $row['remark'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                                    วันที่ลงทะเบียน: <?php echo $row['date_save'];?></li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img class="img-circle img-fluid" alt="image" src="../bimg/<?php echo $row['image'];?>"
                                width="50%">
                            <br><br>
                            <h2 class="text-muted text-md"><b>รหัสคณะกรรมการ</h2>
                            <h2 class="text-muted text-md"><?php echo $row['board_id'];?></h2>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a class="float-right btn btn-dark btn-sm" href="./table_board.php">
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

    $('a[href^="./table_board.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>