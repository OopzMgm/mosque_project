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
                    <h1 class="m-0 text-dark">ตารางข้อมูลสัปปุรุษ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลสัปปุรุษ</li>
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
                  
                    <a class="btn btn-success btn-sm" href="./table_suppurude_live.php">
                            </i>
                            สัปปุรุษยังมีชีวิต
                        </a>
                        <a class="btn btn-danger btn-sm" href="./table_suppurude_death.php">
                            </i>
                            สัปปุรุษเสียชีวิต
                        </a>
                        <a class="btn btn-primary btn-sm" href="./table_suppurude_house_owner.php">
                            </i>
                            เจ้าของบ้าน
                        </a>
                        <a class="btn btn-info btn-sm" href="./table_suppurude_house_inmate.php">
                            </i>
                            ผู้อยู่อาศัย
                        </a>
                        <div></div> <br>
                        <!-- <a class="btn btn-secondary btn-sm" href="../file/file_suppurude_all.pdf" title="PDF [new window]" target="_blank"><i class="fas fa-print"> พิมพ์รายงาน</i></a> -->
                    <a class="btn btn-secondary btn-sm" href="../file/code_suppurude_all.php" title="PDF [new window]" target="_blank"><i class="fas fa-print"> พิมพ์รายงาน</i></a>

                        <a class="float-right btn btn-success btn-sm" href="./create_suppurude.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                      
                        <?php
                            $query = "SELECT *,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) as age FROM tbl_suppurude as s 
                                 INNER JOIN tbl_house as h ON s.ref_family_id=h.family_id
                                 INNER JOIN tbl_board as b ON h.ref_board_id=b.board_id ORDER BY house_no ASC" or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                          
                                echo "<table  id='example1' class='table table-bordered table-striped'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>วัน-เดือน-ปีเกิด/อายุปี</th>
                                            <th>อยู่ในสถานะ</th>
                                            <th>บ้านเลขที่</th>
                                            <th>ผู้รับผิดชอบ</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            $y = date('Y',strtotime($row['birthday_sup']));
                                            // echo $y+543;
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'S'.$row["suppurude_id"] . "</td> "; 
                                            echo "<td>" .$row["title_sup"] .''.$row["f_name_sup"] .' '.$row["l_name_sup"] .  "</td> "; 
                                            echo "<td align='center'>" .date('d-m-Y', strtotime($row['birthday_sup'])).'/'.$row["age"].' ปี'.  "</td> "; 
                                            // echo "<td align='center'>" .date('Y',strtotime($row['birthday_sup'])); 
                                            // echo $y + 543 .  "</td> "; 
                                            echo "<td align='center'>"; 
                                            $family_status = $row["family_status"];
                                            if($family_status=='เจ้าของบ้าน'){
                                              echo '<span class="badge bg-primary"><strong>เจ้าของบ้าน</strong></span>';
                                             
                                            }else if($family_status=='ผู้อยู่อาศัย'){
                                              echo '<span class="badge bg-info">ผู้อยู่อาศัย</span>';
                                            }else{
                                              echo '<span class="badge bg-warning">ไม่อยู่แล้ว</span>';
                                            }
                                            echo "</td> ";
                                            echo "<td align='center'>" .$row["house_no"] . "</td> "; 
                                            // echo "<td align='center'>"; 
                                            // $status_quo = $row["status_quo"];
                                            // if($status_quo=='ยังมีชีวิต'){
                                            //   echo '<span class="badge bg-success"><strong>ยังมีชีวิต</strong></span>';
                                             
                                            // }else{
                                            //   echo '<span class="badge bg-danger">เสียชีวิต</span>';
                                            // }
                                            // echo "</td> ";
                                            echo "<td>" .$row["f_name_board"] .' '.$row["l_name_board"] . "</td> "; 
                                           
                                            echo "<td class='project-actions text-center'>
                                            <a href='read_suppurude.php?ID=$row[0]' class='btn btn-primary btn-sm'> <i class='fas fa-eye'>
                                            </i></a>
                                            <a href='update_suppurude.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-pencil-alt'>
                                            </i></a>
                                            <a href='delete_suppurude_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
                                            </i></a></td> ";
                                            echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>วันเดือนปีเกิด (อายุ)</th>
                                            <th>อยู่ในสถานะ</th>
                                            <th>บ้านเลขที่</th>
                                            <th>ผู้รับผิดชอบ</th>
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

    $('a[href^="./table_suppurude.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>