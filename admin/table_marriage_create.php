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
                    <h1 class="m-0 text-dark">ตารางบันทึกข้อมูลการสมรส</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางบันทึกข้อมูลการสมรส</li>
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
                            $query = "SELECT * FROM tbl_suppurude as s
                            INNER JOIN tbl_house as h ON h.family_id=s.ref_family_id
                            WHERE status_quo ='ยังอยู่'  ORDER BY house_no"
                            or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>#</th>
                                            <th>รหัสสัปปุรุษ</th>
                                            <th>เลขประจำตัวประชาชน</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>รหัสครอบครัว</th>
                                            <th>บ้านเลขที่</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'S'.$row["suppurude_id"] . "</td> "; 
                                            echo "<td align='center'>" .$row["id_card_sup"] . "</td> "; 
                                            echo "<td>" .$row["title_sup"] .''.$row["f_name_sup"] .' '.$row["l_name_sup"] . "</td> "; 
                                            echo "<td align='center'>" .'H'.$row["family_id"] . "</td> "; 
                                            echo "<td align='center'>" .$row["house_no"] . "</td> "; 
                                          
                                           //ดูข้อมูล
                                           echo "<td class='project-actions text-center'>
                                           <a href='create_marriage.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-save'>
                                           </i></a>
                                         </td> ";
                                           echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                        <tr align='center'>
                                        <th>#</th>
                                        <th>รหัสสัปปุรุษ</th>
                                        <th>เลขประจำตัวประชาชน</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>รหัสครอบครัว</th>
                                        <th>บ้านเลขที่</th>
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

    $('a[href^="./table_marriage_create.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>