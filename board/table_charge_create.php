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
                    <h1 class="m-0 text-dark">ตารางบันทึกการเก็บเงินสมาชิก</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางบันทึกการเก็บเงินสมาชิก</li>
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
                    <a class="btn btn-secondary btn-sm" href="../file/file_house.pdf" title="PDF [new window]" target="_blank"><i class="fas fa-print"> พิมพ์รายงาน</i></a>
                        
                        <a class="float-right btn btn-success btn-sm" href="./create_house.php">
                        <i class="fas fa-plus-circle"></i>
                            </i>
                            เพิ่มข้อมูล
                        </a>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                            $query = "SELECT * FROM tbl_house as h 
                            INNER JOIN tbl_board as b ON b.board_id=h.ref_board_id
                            WHERE b.board_id=$board_id" or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>#</th>
                                            <th>รหัสครอบครัว</th>
                                            <th>เลขรหัสประจำบ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>ที่อยู่</th>
                                            <th>ผู้รับผิดชอบ</th>
                                            <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'H'.$row["family_id"] . "</td> ";
                                            echo "<td align='center'>" .$row["house_code"] . "</td> ";  
                                            echo "<td align='center'>" .$row["house_no"] . "</td> "; 
                                            echo "<td>".'หมู่ที่'.''.$row["villageno"] .' บ้าน'.$row["village"] .' ต.'.$row["district"] .' อ.'.$row["sub_district"] .' จ.'.$row["province"] . ' '.$row["postal_code"] . "</td> "; 
                                            echo "<td>" .$row["f_name_board"] .' '.$row["l_name_board"] .  "</td> "; 
                                            //ดูข้อมูล
                                            echo "<td class='project-actions text-center'>
                                            <a href='create_charge.php?ID=$row[0]' class='btn btn-info btn-sm'> <i class='fas fa-save'>
                                            </i></a>
                                          </td> ";
                                            echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                        <tr align='center'>
                                            <th>#</th>
                                            <th>รหัสครอบครัว</th>
                                            <th>เลขรหัสประจำบ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>ที่อยู่</th>
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

    $('a[href^="./table_charge_create.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>