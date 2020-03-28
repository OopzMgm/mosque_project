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
                    <h1 class="m-0 text-dark">ข้อมูลสมรสของสัปปุรุษ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลสมรสของสัปปุรุษ</li>
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
                        <div class="col-3">
                            <h2 class="text-muted text-md"><b>รหัสสัปปุรุษ : </b>
                                <?php echo 'S'.$row['ref_suppurude_id'];?> </h2>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล :
                                </b><?php echo $row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'];?> </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday"]));?> </h2>
                            <span class="text-muted text-sm"><b>วันที่ลงทะเบียน : </b>
                                <?php echo date('d-m-Y H:i:s', strtotime($row['datesave_marriage']));?> </span>
                        </div>
                        <div class="col-3">
                            <br>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล :
                                </b><?php echo $row['title_mate1'].''.$row['firstname_mate1'].' '.$row['lastname_mate1'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday_mate1"]));?> </h2>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>วันแต่งงาน :
                                        </b><?php echo date('d-m-Y', strtotime($row['wedding_date1']));?>
                                    </span>
                                    <span class="info-box-text"><b>ชื่อผู้ทำพิธี : </b>
                                        <?php echo $row['organize1'];?></span>
                                    <span class="info-box-text"><b>ชื่อพยาน : </b><?php echo $row['witness1'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                           
                        </div>
                        <div class="col-3">
                            <br>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล :
                                </b><?php echo $row['title_mate2'].''.$row['firstname_mate2'].' '.$row['lastname_mate2'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday_mate2"]));?> </h2>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>วันแต่งงาน :
                                        </b><?php echo date('d-m-Y', strtotime($row['wedding_date2']));?>
                                    </span>
                                    <span class="info-box-text"><b>ชื่อผู้ทำพิธี : </b>
                                        <?php echo $row['organize2'];?></span>
                                    <span class="info-box-text"><b>ชื่อพยาน : </b><?php echo $row['witness2'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                          
                        </div>
                        <div class="col-3">
                            <br>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล :
                                </b><?php echo $row['title_mate3'].''.$row['firstname_mate3'].' '.$row['lastname_mate3'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday_mate3"]));?> </h2>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>วันแต่งงาน :
                                        </b><?php echo date('d-m-Y', strtotime($row['wedding_date3']));?>
                                    </span>
                                    <span class="info-box-text"><b>ชื่อผู้ทำพิธี : </b>
                                        <?php echo $row['organize3'];?></span>
                                    <span class="info-box-text"><b>ชื่อพยาน : </b><?php echo $row['witness3'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                          
                        </div>
                        <div class="col-3">
                            <br>
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล :
                                </b><?php echo $row['title_mate4'].''.$row['firstname_mate4'].' '.$row['lastname_mate4'];?>
                            </h2>
                            <h2 class="text-muted text-md"><b>วัน เดือน ปีเกิด: </b>
                                <?php echo  date('d-m-Y',strtotime($row["birthday_mate4"]));?> </h2>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>วันแต่งงาน :
                                        </b><?php echo date('d-m-Y', strtotime($row['wedding_date4']));?>
                                    </span>
                                    <span class="info-box-text"><b>ชื่อผู้ทำพิธี : </b>
                                        <?php echo $row['organize4'];?></span>
                                    <span class="info-box-text"><b>ชื่อพยาน : </b><?php echo $row['witness4'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a class="float-right btn btn-dark btn-sm" href="./table_marriage.php">
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

    $('a[href^="./table_marriage.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>