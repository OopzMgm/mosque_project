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
                    <h1 class="m-0 text-dark">ตารางข้อมูลใบมรณะบัตร</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลใบมรณะบัตร</li>
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
                        <a class="float-right btn btn-success btn-sm" href="./create_death.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div> -->
                     <!-- /.card-header -->
                     <div class="card-body">
                        <?php
                            $query = "
                            SELECT * FROM tbl_death as d 
                            INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id 
                            ORDER BY death_id DESC" or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>หมายเลขใบมรณะบัตร</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>วันที่เสียชีวิต</th>
                                            <th>อายุ ณ เสียชีวิต</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'D'.$row["death_id"] . "</td> "; 
                                            echo "<td align='center'>" .$row["d_certificate"] .  "</td> "; 
                                            echo "<td>" .$row["title_sup"] .''.$row["f_name_sup"] .' '.$row["l_name_sup"] . "</td> "; 
                                            echo "<td align='center'>" .$row["date_death"] . "</td> "; 
                                            echo "<td align='center'>" .$row["death_age"] . "</td> "; 
                                           //ดูข้อมูล
                                           echo "<td class='project-actions text-center'>
                                           <a href='read_death.php?ID=$row[0]' class='btn btn-primary btn-sm'> <i class='fas fa-eye'>
                                           </i></a>
                                           <a href='update_death.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-pencil-alt'>
                                           </i></a>
                                           <a href='delete_death_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
                                           </i></a></td> ";
                                           echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                        <tr align='center'>
                                        <th>ลำดับ</th>
                                        <th>รหัส</th>
                                        <th>หมายเลขใบมรณะบัตร</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>วันที่เสียชีวิต</th>
                                        <th>อายุ ณ เสียชีวิต</th>
                                        <th>จัดการ</th>
                                        </tr>
                                        </tfoot>
                                    ";
                                    $item++;
                                echo "</table>";
                            //5. close condb
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

    $('a[href^="./table_death.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>