<?php  
include('./include_menu.php'); 

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_house as h 
INNER JOIN tbl_board as b ON h.ref_board_id=b.board_id
WHERE h.family_id=$ID";
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
                    <h1 class="m-0 text-dark">ข้อมูลสำเนาทะเบียนบ้าน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลสำเนาทะเบียนบ้าน</li>
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
                    <h2 class="text-muted text-md"><b>บ้านเลขที่: </b> <?php echo $row['house_no'];?> </h2>
                    <h2 class="text-muted text-md"><b>เลขรหัสประจำบ้าน: </b> <?php echo $row['house_code'];?> </h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <!-- <h2 class="lead"></h2> -->
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                                    ที่อยู่ : <?php echo 'หมู่ที่ '.$row['villageno'] .' ซอย/แยก '.$row['lane'] .' ถนน/คลอง '.$row['street'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspตำบล'.$row['district'] .' อำเภอ'.$row['sub_district'] .' จังหวัด'.$row['province'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspรหัสไปรษณีย์ '.$row['postal_code'];?></li>
                                  <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-comment-dots"></i></span>
                                    หมายเหตุเพิ่มเติม : <?php echo $row['remark'];?>
                                 </li>
                            </ul><br>
                            <h3 class="text-muted text-sm"><b>วันที่ลงทะเบียน : </b> <?php echo date('d-m-Y H:i:s', strtotime($row['house_date_save']));?> </h3>
                        </div>
                        <div class="col-5 text-center">
                            <img class="img-circle img-fluid" alt="image" src="../bimg/<?php echo $row['image'];?>"
                                width="50%">
                            <br><br>
                            <h2 class="text-muted text-md"><b>ผู้รับผิดชอบ</h2>
                            <h2 class="text-muted text-md"><?php echo $row['title'].''.$row['f_name_board'].' '.$row['l_name_board'];?></h2>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a class="float-right btn btn-dark btn-sm" href="./table_house.php">
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

    $('a[href^="./table_house.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>