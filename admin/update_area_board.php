<?php 
include('./include_menu.php'); 

$area_id = $_GET['ID'];
$sql = "SELECT * FROM tbl_area_board WHERE area_id=$area_id";
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
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลเขตคณะกรรมการ<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลเขตคณะกรรมการ</li>
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
                    <a class="float-right btn btn-dark btn-sm" href="./table_area_board.php">
                        <i class="fas fa-eye">
                        </i>
                        ดูข้อมูล
                    </a>
                </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <form role="form" action="update_area_board_db.php" method="post">
                        <div class="row">
                        </div>
                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label>ลำดับ</label>
                                <input type="text" class="form-control" value="<?php echo $row['area_id'];?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>เขตคณะกรรมการ</label>
                                <input type="text" name="area_name" required class="form-control"
                                    value="<?php echo $row['area_name'];?>">
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="area_id" value="<?php echo $row['area_id'];?>">
                    <button class="btn btn-info" type="submit">แก้ไข</button>
                    <button class="btn btn-default" type="reset">ยกเลิก</button>
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

    $('a[href^="./table_area_board.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>