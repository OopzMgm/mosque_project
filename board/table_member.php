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
                    <h1 class="m-0 text-dark">ตารางข้อมูลสมาชิกกองทุนฯ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลสมาชิกกองทุนฯ</li>
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
                    <button  id="hd" class="btn btn-primary btn-sm" onclick="window.print();"> Print </button>
                        <a class="float-right btn btn-success btn-sm" href="./create_member.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                            $query = "SELECT * FROM tbl_member as m
                            INNER JOIN tbl_suppurude as s ON m.ref_suppurude_id = s.suppurude_id
                            INNER JOIN tbl_house as h ON s.ref_family_id = h.family_id 
                            INNER JOIN tbl_board as b ON m.ref_board_id = b.board_id
                            ORDER BY member_id DESC"
                            or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>#</th>
                                            <th>รหัส</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>บ้านเลขที่</th>
                                            <th>ผู้จัดการ</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'M'.$row["member_id"] . "</td> "; 
                                            echo "<td align='center'>"."<img class='table-avatar' alt='รูปภาพสมาชิก' src='../mimg/".$row['image_member']."'>"."</td>";
                                            echo "<td>" .$row["title_sup"] .' '.$row["f_name_sup"] .' '.$row["l_name_sup"] .  "</td> "; 
                                            echo "<td align='center'>" .$row["house_no"] . "</td> "; 
                                            echo "<td>"
                                            .' เพิ่มโดย : '
                                            . $row["f_name_board"]
                                            .'<br>'
                                            .' ว-ด-ป '
                                            .date('d-m-Y H:i:s', strtotime($row["date_save_member"]));
                                            
                                            
                                            if($row["name_edit_member"]!=''){

                                                    echo '<br>'
                                                    .' แก้โดย : '
                                                    . $row["name_edit_member"]
                                                    .'<br>'
                                                    .' ว/ด/ป '
                                                    .date('d-m-Y H:i:s', strtotime($row["date_edit_member"]));
                                            }
                                            echo "</td> ";
                                           //ดูข้อมูล
                                           echo "<td class='project-actions text-center'>
                                           <a href='read_member.php?ID=$row[0]' class='btn btn-primary btn-sm'> <i class='fas fa-eye'>
                                           </i></a>
                                           <a href='update_member.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-pencil-alt'>
                                           </i></a>
                                           <a href='delete_member_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-sm'> <i class='fas fa-trash'>
                                           </i></a></td> ";
                                           echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                            <tr align='center'>
                                            <th>#</th>
                                            <th>รหัส</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>บ้านเลขที่</th>
                                            <th>เพิ่มโดย</th>
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

    $('a[href^="./table_member.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>