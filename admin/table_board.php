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
                    <h1 class="m-0 text-dark">ตารางข้อมูลคณะกรรมการ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลคณะกรรมการ</li>
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
                    <a class="btn btn-secondary btn-sm" href="../file/code_board.php" title="PDF [new window]" target="_blank"><i class="fas fa-print"> พิมพ์รายงาน</i></a>
                        <a class="float-right btn btn-success btn-sm" href="./create_board.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                            $query = "SELECT * FROM tbl_board as b 
                            INNER JOIN tbl_position as p ON b.ref_position_id=p.position_id
                            INNER JOIN tbl_area_board as a ON b.ref_area_id=a.area_id WHERE user_level = 'board' " or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ตำแหน่ง</th>
                                            <th>เขตรับผิดชอบ</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'B'.$row["board_id"] . "</td> "; 
                                            echo "<td align='center'>"."<img class='table-avatar' alt='image' src='../bimg/".$row['image']."'>"."</td>";
                                            echo "<td>" .$row["title"] .''.$row["f_name_board"] .' '.$row["l_name_board"] .  "</td> "; 
                                            echo "<td>" .$row["position_name"] . "</td> "; 
                                            echo "<td>" .$row["area_name"] . "</td> "; 
                                            //ดูข้อมูล
                                            echo "<td class='project-actions text-center'>
                                            <a href='read_board.php?ID=$row[0]' class='btn btn-primary btn-sm'> <i class='fas fa-eye'>
                                            </i></a>
                                            <a href='update_board.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-pencil-alt'>
                                            </i></a>
                                            <a href='delete_board_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
                                            </i></a></td> ";
                                            echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ตำแหน่ง</th>
                                            <th>เขตรับผิดชอบ</th>
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

    $('a[href^="./table_board.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>