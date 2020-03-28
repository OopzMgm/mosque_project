<?php
    include './include_menu.php'
?>

<br><br>
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ตารางข้อมูลประวัติการจ่ายเงิน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:teal">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลประวัติการจ่ายเงิน</li>
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
                            $query = "SELECT * FROM tbl_charge as ch
                            INNER JOIN tbl_house as h ON ch.ref_family_id = h.family_id
                            INNER JOIN tbl_board as b ON h.ref_board_id = b.board_id
                            INNER JOIN tbl_death as d ON ch.ref_death_id = d.death_id
                            INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id
                            WHERE h.family_id=$family_id ORDER BY charge_id DESC" or die("Error:" . mysqli_error());
                            $result = mysqli_query($condb, $query); 
                                echo "<table  id='example1' class='table table-bordered table-striped projects'>";
                                    //หัวข้อตาราง
                                    echo "
                                        <thead>
                                            <tr align='center'>
                                            <th>#</th>
                                            <th>รหัส</th>
                                            <th>บ้านเลขที่</th>
                                            <th>วันที่จ่ายเงิน</th>
                                            <th>จำนวนเงิน</th>
                                            <th>ผู้เสียชีวิต</th>
                                            <th>ผู้เก็บเงิน</th>
                                            <th>*หมายเหตุ</th>
                                            <th>วันที่บันทึก</th>
                                            </tr>
                                        </thead>
                                    ";
                                    $item = 0;
                                        while($row = mysqli_fetch_array($result)) { 
                                            echo "<tr>";
                                            echo "<td align='center'>".$item +=1 .'.'. "</td>";
                                            echo "<td align='center'>" .'CH'.$row["charge_id"] . "</td> ";
                                            echo "<td align='center'>" .$row["house_no"] . "</td> "; 
                                            echo "<td align='center'>" .date('d-m-Y', strtotime($row['charge_date'])). "</td> "; 
                                            echo "<td align='center'>" .$row["amount_charge"] . "</td> "; 
                                            echo "<td>" .$row["title_sup"] .' '.$row["f_name_sup"] .' '.$row["l_name_sup"] .  "</td> "; 
                                            echo "<td>" .$row["title"] .' '.$row["f_name_board"] .' '.$row["l_name_board"] .  "</td> "; 
                                            echo "<td align='center'>" .$row["remark_charge"] . "</td> "; 
                                            echo "<td align='center'>" .date('d-m-Y H:i:s', strtotime($row['datesave_charge'])). "</td> "; 
                                      
                                            //     echo "<td class='project-actions text-center'>
                                        //     <a href='read_house.php?ID=$row[0]' class='btn btn-primary btn-sm'> <i class='fas fa-eye'>
                                        //     </i></a>
                                        //  </td> ";
                                            echo "</tr>";
                                        }
                                    echo "
                                        <tfoot>
                                        <tr align='center'>
                                            <th>#</th>
                                            <th>รหัส</th>
                                            <th>บ้านเลขที่</th>
                                            <th>วันที่จ่ายเงิน</th>
                                            <th>จำนวนเงิน</th>
                                            <th>ผู้เสียชีวิต</th>
                                            <th>ผู้เก็บเงิน</th>
                                            <th>*หมายเหตุ</th>
                                            <th>วันที่บันทึก</th>
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
<!-- /.content-wrapper -->
<!-- page script -->
<script>
$(document).ready(function() {

    $('a[href^="./table_charge.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>