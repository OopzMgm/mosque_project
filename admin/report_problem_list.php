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
                    <h1 class="m-0 text-dark">ตารางข้อมูลแจ้งปัญหา</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลแจ้งปัญหา</li>
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
                    <!-- <div class="card-header">
                      
                    </div> -->
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
                        <th width='5%'>รหัส</th>
                        <th width='50%'>รายการปัญหา</th>
                        <th width='15%'>ชื่อผู้ใช้</th>
                        <th width='15%'>ชื่อ-นามสกุล</th>
                        <th width='15%'>อีเมล</th>
                        <th width='10%'>เบอร์โทร</th>
                        <th width='20%'>ว/ด/ป</th>
                        </tr>
                        </thead>
                        ";
                        while($row = mysqli_fetch_array($result)) { 
                        echo "<tr>";
                        echo "<td align='center'>" .$row["p_id"] .'.'. "</td> "; 
                        echo "<td>" .$row["p_detail"] .  "</td> "; 
                        echo "<td>" .$row["p_username"] .  "</td> "; 
                        echo "<td>" .$row["p_fname_lname"] .  "</td> "; 
                        echo "<td>" .$row["p_email"] .  "</td> "; 
                        echo "<td>" .$row["p_phone"] .  "</td> "; 
                        echo "<td>" .date('d/m/Y H:i:s',strtotime($row["date_save"])) .  "</td> "; 
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

    $('a[href^="./report_problem_list.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>