<?php
    include './include_menu.php'
?>

<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ตารางประวัติการเข้าสู่ระบบตามวันที่เลือก</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางประวัติการเข้าสู่ระบบตามวันที่เลือก</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark btn-sm" href="./log_by_user.php">
                            </i>
                            รายบุคคล
                        </a>
                        <a class="btn btn-dark btn-sm" href="./log_by_day.php">
                            </i>
                            รายวัน
                        </a>
                        <a class="btn btn-dark btn-sm" href="./log_by_monthly.php">
                            </i>
                            รายเดือน
                        </a>
                        <a class="btn btn-dark btn-sm" href="./login_by_yearly.php">
                            </i>
                            รายปี
                        </a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <form action="" method="get" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    <h5><strong>กรุณาเลือกวันที่ : </strong></h5>
                                </div>
                                <div class="row" style="text-align:center">
                                    <div class="col-sm-1 control-label">

                                    </div>
                                    <div class="col-sm-1 control-label">
                                        เริ่มต้น
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" name="ds" class="form-control" required>
                                    </div>
                                    <div class="col-sm-1 control-label">
                                        สิ้นสุด
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" name="de" class="form-control" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary">ตกลง</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <?php
                            $ds = $_GET['ds'];
                            $de = $_GET['de'];


                            if($ds==''){

                            }else{

                            //2. query ข้อมูลจากตาราง tb_member: 
                            $query = "
                            SELECT l.*, b.board_id, b.f_name_board, b.l_name_board 
                            FROM tbl_login_board as l 
                            INNER JOIN tbl_board as b ON l.ref_board_id=b.board_id 
                            WHERE l.log_date
                            BETWEEN '$ds 00:00:00.000000' 
                            AND '$de 23:59:59.000000' 
                            ORDER BY l.log_date DESC " or die("Error:" . mysqli_error());
                           
                            // echo $query;
                            // exit; 

                            //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                            $result = mysqli_query($condb, $query); 
                            //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
                            // echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                            echo "<table id='example1' class='display table table-bordered table-hover' cellspacing='0'>";
                            //หัวข้อตาราง
                            echo "
                            <thead>
                            <tr align='center' class='danger'>
                            <th width='10%'><center>ลำดับ</center></th>
                            <th width='70%'>ชื่อ-นามสกุล</th>
                            <th width='30%'><center>ว/ด/ป</center></th>
                            </tr>
                            </thead>
                            ";
                            while($row = mysqli_fetch_array($result)) { 
                            echo "<tr>";
                            echo "<td align='center'>" .$i += 1 .  "</td> ";
                            echo "<td>" .$row["f_name_board"] .'  ' .$row["l_name_board"] .  "</td> "; 
                            echo "<td align='center'>" .$row["log_date"] .  "</td> "; 
                            echo "</tr>";
                            }
                            echo "</table>";
                            }

                            //5. close connection
                            mysqli_close($condb);
                        ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <br><br>
</div>
<!-- /.content-wrapper -->
<!-- page script -->
<script>
$(document).ready(function() {

    $('a[href^="./login_history.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>