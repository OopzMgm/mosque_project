<?php  
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * FROM tbl_death as d 
INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id
INNER JOIN tbl_house as h ON s.ref_family_id = h.family_id
INNER JOIN tbl_board as b ON h.ref_board_id = b.board_id
INNER JOIN tbl_position as p ON b.ref_position_id = p.position_id 
INNER JOIN tbl_area_board as ar ON b.ref_area_id = ar.area_id 
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
                    <h1 class="m-0 text-dark">ข้อมูลสัปปุรุษที่เสียชีวิต</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลสัปปุรุษที่เสียชีวิต</li>
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
                    <div class="row">
                        <div class="col-7">
                            <h2 class="text-muted text-md"><b>รหัสสัปปุรุษ: </b>
                                <?php echo 'S'.$row['suppurude_id'];?> </h2>
                            <h2 class="text-muted text-md"><b>เลขประจำตัวประชาชน: </b> <?php echo $row['id_card_sup'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล:
                                </b><?php echo $row['title_sup'].' '.$row['f_name_sup'].' '.$row['l_name_sup'];?> </h2>
                            <h2 class="text-muted text-md"><b>เพศ: </b> <?php echo $row['gender_sup'];?> </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday_sup"]));?> </h2>
                        </div>
                        <div class="col-1">
                            <img class="img-circle img-fluid" alt="รูปภาพคณะกรรมการ" src="../bimg/<?php echo $row['image'];?>"
                                width="100px">
                        </div>
                        <div class="col-4">
                        <h2 class="text-muted text-md"><b>รหัสคณะกรรมการ : </b><?php echo 'B'.$row['board_id'];?></h2>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล : </b><?php echo $row['title'].' '.$row['f_name_board'].' '.$row['l_name_board'];?></h2>
                            <h2 class="text-muted text-md"><b>ตำแหน่ง : </b><?php echo $row['position_name'];?></h2>
                            <h2 class="text-muted text-md"><b>เขต : </b><?php echo $row['area_name'];?></h2>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <!-- <h2 class="lead"></h2> -->
                            <h2 class="text-muted text-md"><b>อยู่ในสถานะ: </b> <?php echo $row['family_status'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>สถานะภาพปัจจุบัน: </b> <?php echo $row['status_quo'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>สถานะทางสังคม: </b> <?php echo $row['social_status'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>บิดา: </b> <?php echo $row['father'];?> </h2>
                            <h2 class="text-muted text-md"><b>มารดา: </b> <?php echo $row['mother'];?> </h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                                    ที่อยู่ :
                                    <?php echo 'บ้านเลขที่ '.$row['house_no'] .' หมู่ที่ '.$row['villageno'] .' ซอย/แยก '.$row['lane'] .' ถนน/คลอง '.$row['street'];?>
                                    <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspตำบล'.$row['district'] .' อำเภอ'.$row['sub_district'] .' จังหวัด'.$row['province'];?>
                                    <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspรหัสไปรษณีย์ '.$row['postal_code'];?>
                                </li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-comment-dots"></i></span>
                                    หมายเหตุเพิ่มเติม : <?php echo $row['remark_sup'];?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-5 text-left">
                            <h2 class="text-muted text-md"><b>รหัสผู้เสียชีวิต: </b><?php echo 'D'.$row['death_id'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>หมายเลขใบมรณะบัตร: </b><?php echo $row['d_certificate'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>ออกโดย: </b> <?php echo $row['officer'];?></h2>
                            <h2 class="text-muted text-md"><b>วัน-เวลาที่เสียชีวิต: </b><?php echo  date('d-m-Y H:i:s', strtotime($row['date_death']));?>
                            </h2>
                            <h2 class="text-muted text-md"><b>อายุ ณ วันที่ตาย: </b> <?php echo $row['date_age'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>เหตุที่เสียชีวิต: </b><?php echo $row['cause_death'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>สถานที่เสียชีวิต: </b> <?php echo $row['death_place'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>สถานที่ละหมาด: </b> <?php echo $row['prayer_place'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>สถานที่ฝัง: </b> <?php echo $row['burial_ground'];?> </h2>
                            <h2 class="text-muted text-md"><b>หมายเหตุเพิ่มเติม: </b> <?php echo $row['remark_death'];?>
                            </h2>
                            <h3 class="text-muted text-sm"><b>วันที่ลงทะเบียน : </b>
                                <?php echo date('d-m-Y H:i:s', strtotime($row['datesave_death']));?> </h3>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a class="float-right btn btn-dark btn-sm" href="./table_death.php">
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

    $('a[href^="./table_death.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>