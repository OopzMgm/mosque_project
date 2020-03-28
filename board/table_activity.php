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
                    <h1 class="m-0 text-dark">ตารางข้อมูลรูปภาพกิจกรรม</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลรูปภาพกิจกรรม</li>
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
                        <a class="float-right btn btn-success btn-sm" href="./create_activity.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                            $query = "
                            SELECT a.*,b.f_name_board,b.l_name_board
                            FROM tbl_activity as  a
                            LEFT JOIN tbl_board as b ON a.ref_board_id = b.board_id
                            ORDER BY a.activity_id ASC"   
                            or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อกิจกรรม/รายละเอียด</th>
                                            <th>ผู้จัดการ</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>"."<img alt='image' width='100px' src='../ac_img/".$row['image']."'>"."</td>";
                                            echo "<td>"
                                            .' กิจกรรม : '
                                            .$row["name"];
                                            if($row["name"]!=''){

                                                    echo '<br>'
                                                    .' รายละเอียด : '
                                                    . $row["detail"]
                                                    ;
                                            }
                                            echo "</td> ";
                                            echo "<td>"
                                            .' เพิ่มโดย : '
                                            . $row["f_name_board"]
                                            .'<br>'
                                            .' ว-ด-ป '
                                            .date('d-m-Y H:i:s', strtotime($row["date_save"]));
                                            
                                            
                                            if($row["activity_edit_name"]!=''){

                                                    echo '<br>'
                                                    .' แก้โดย : '
                                                    . $row["activity_edit_name"]
                                                    .'<br>'
                                                    .' ว/ด/ป '
                                                    .date('d-m-Y H:i:s', strtotime($row["date_edit"]));
                                            }
                                            echo "</td> ";
                                            //ดูข้อมูล
                                            echo "<td class='project-actions text-center'>
                                            <a href='update_activity.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-pencil-alt'>
                                            </i></a>
                                            <a href='delete_activity_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
                                            </i></a></td> ";
                                            echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                            <tr align='center'>
                                            <th>ลำดับ</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อกิจกรรม/รายละเอียด</th>
                                            <th>ผู้จัดการ</th>
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

    $('a[href^="./table_activity.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>