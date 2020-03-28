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
                    <h1 class="m-0 text-dark">ตารางประวัติการเข้าสู่ระบบตามจำนวน(ครั้ง)</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางประวัติการเข้าสู่ระบบตามจำนวน(ครั้ง)</li>
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
                    <div class="card-body">
                        <?php

                            //2. query ข้อมูลจากตาราง tb_member: 
                            $query = "
                            SELECT l.ref_board_id, b.f_name_board,b.l_name_board, COUNT(l.ref_board_id) as total 
                            FROM tbl_login_board as l 
                            INNER JOIN tbl_board as b ON l.ref_board_id=b.board_id
                            GROUP BY l.ref_board_id
                            " or die("Error:" . mysqli_error());

                            // echo $query;
                            // exit; 

                            //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                            $result = mysqli_query($condb, $query); 
                            //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
                            echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                            //หัวข้อตาราง
                            echo "
                            <thead>
                            <tr align='center' class='danger'>
                            <th>ลำดับ</th>
                            <th width='75%'>ชื่อ-นามสกุล</th>
                            <th>รวม(ครั้ง)</th>
                            </tr>
                            </thead>
                            ";
                            while($row = mysqli_fetch_array($result)) { 
                            echo "<tr>";
                            echo "<td align='center'>" .$i += 1 .'.'. "</td> "; 
                            echo "<td>" .$row["f_name_board"] .'  ' .$row["l_name_board"] .  "</td> "; 
                            echo "<td align='center'>" .$row["total"] .  "</td> ";  
                            echo "</tr>";
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