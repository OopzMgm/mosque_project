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
                    <h1 class="m-0 text-dark">ตารางประวัติการเข้าสู่ระบบรายเดือน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางประวัติการเข้าสู่ระบบรายเดือน</li>
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
                        SELECT DATE_FORMAT(log_date, '%M-%Y') AS mydate, 
                        COUNT(ref_board_id) AS total 
                        FROM tbl_login_board
                        GROUP BY DATE_FORMAT(log_date, '%m%')
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
                        <th width='80%'>เดือน</th>
                        <th width='20%'><center>รวม (ครั้ง)</center></th>
                        </tr>
                        </thead>
                        ";
                        $item = 0;
                        while($row = mysqli_fetch_array($result)) { 
                        echo "<tr>";
                        echo "<td align='center'>".$item +=1 .'.'. "</td>";
                        echo "<td>" .$row["mydate"] .  "</td> ";
                        echo "<td align='center'>" .$row["total"] .  "</td> "; 
                        
                        echo "</tr>";
                        }
                        $item++;
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