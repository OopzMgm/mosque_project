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
                    <h1 class="m-0 text-dark">เพิ่มไฟล์สัปปุรุษ<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">เพิ่มไฟล์สัปปุรุษ</li>
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
                <!-- <div class="card-header">
                    <a class="float-right btn btn-dark btn-sm" href="./table_activity.php">
                        <i class="fas fa-th-list"></i>
                        </i>
                        ดูข้อมูล
                    </a>
                </div> -->
                <!-- /.card-header -->
                <!-- <div class="card-body">
                    <form role="form" action="create_activity_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ชื่อไฟล์</label>
                                    <input type="text" name="file_name" class="form-control" placeholder="ป้อน . . ."
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">ไฟล์</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file_upload" class="custom-file-input" required
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">อัพโหลด</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <input type="hidden" name="type" value="board">
                        <input type="hidden" name="ref_board_id" value="<?php echo $board_id;?>">
                        <button class="btn btn-info" type="submit">บันทึก</button>
                        <button class="btn btn-default" type="reset">ยกเลิก</button>
                    </div>
                </div>
                </form> -->
				<!-- /.card-header -->
				<div class="card-body">
                    <?php
                        $query = "SELECT * FROM tbl_problem ORDER BY p_id DESC" or die("Error:" . mysqli_error());
                        $result = mysqli_query($condb, $query); 
                        echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                        //หัวข้อตาราง
                        echo "
                        <thead>
                        <tr align='center' class='danger'>
                        <th>#</th>
                        <th width='30%'>ไฟล์อัพโหลด</th>
                        <th width='30%'>ชื่อไฟล์</th>
                        <th width='20%'>เพิ่มโดย</th>
                        <th width='20%'>วันที่โหลด</th>
                        </tr>
                        </thead>
                        ";
                        while($row = mysqli_fetch_array($result)) { 
                        echo "<tr>";
                        echo "<td align='center'>" .$row["p_id"] .'.'. "</td> "; 
                        echo "<td>" .$row["file_upload"] .  "</td> "; 
                        echo "<td>" .$row["file_name"] .  "</td> "; 
                        echo "<td>" .$row["create_name"] .  "</td> "; 
						echo "<td>" .date('d/m/Y H:i:s',strtotime($row["f_name_board"])) .  "</td> ";
						// echo "<td class='project-actions text-center'>
						// <a href='delete_marriage_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
						// </i> ลบ</a></td> ";
                        // echo "</tr>";
                        }
                        echo "</table>";
                        //5. close connection
                        mysqli_close($condb);
                        ?>
                    </div>
                    <!-- /.card-body -->
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

    $('a[href^="./file_suppurude.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>