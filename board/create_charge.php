<?php 
include('./include_menu.php'); 

// require_once __DIR__ . '../../vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();
// ob_start();

$ID = $_GET['ID'];
$sql = "
SELECT * 
FROM tbl_house 
WHERE family_id=$ID";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

$query = "SELECT * FROM tbl_death as d
INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id 
ORDER BY death_id DESC" or die("Error:" . mysqli_error());
$result2 = mysqli_query($condb, $query);

?>


<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">บันทึกการเก็บเงินสมาชิก<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">บันทึกการเก็บเงินสมาชิก</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements disabled -->
            <div class="card">
                <div class="card-header">
                    <form role="form" action="create_charge_db.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">รหัสครอบครัว</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="ref_family_id" class="form-control"
                                            value="<?php echo 'H'.$row['family_id'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่อผู้เสียชีวิต</label>
                                    <div class="col-sm-7">
                                    <select name="ref_death_id" class="form-control" required>
                                        <!-- <option value="">--เลือกข้อมูล--</option> -->
                                        <?php foreach($result2 as $results){ ?>
                                        <option value="<?php echo $results["death_id"];?>">
                                            - <?php echo $results["title_sup"].''.$results["f_name_sup"].' '.$results["l_name_sup"];?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="float-right btn btn-dark btn-sm" href="./table_charge_create.php">
                                    <i class="fas fa-th-list"></i>
                                    </i>
                                    ดูข้อมูล
                                </a>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>วันที่จ่ายเงินของสมาชิก</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="charge_date" class="form-control" required
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask="" im-insert="false">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="form-group">
                                <label>จำนวนเงิน</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">฿</span>
                                </div>
                                <input type="number" name="amount_charge" class="form-control"   placeholder="ป้อน . . ." required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>หมายเหตุเพิ่มเติม</label>
                                <textarea name="remark_charge" class="form-control" rows="3"
                                    placeholder="ป้อน . . ."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <!-- <a class="btn btn-secondary btn-sm" href="../file/file_position.pdf" title="PDF [new window]" target="_blank"><i class="fas fa-print"> พิมพ์ใบเสร็จ</i></a> -->

                    <div class="float-right">
                        <input type="hidden" name="ref_family_id" value="<?php echo $family_id;?>">
                        <input type="hidden" name="ref_board_id" value="<?php echo $board_id;?>">
                        <button class="btn btn-info" type="submit">บันทึก</button>
                       
                        <!-- <button type="button" name="Submit2"  onclick=" window.location ='print_receipt.php?charge_id=<?php echo $family_id;?>';" class="btn btn-primary">  -->
                        <!-- <button type="submit" class="btn btn-info" onclick="return confirm('ยืนยัน');">บันทึก</button> -->
                        <button class="btn btn-default" type="submit">ยกเลิก</button>
                        <!-- <button class="btn btn-default float-right" type="submit">Cancel</button> -->
                    </div>

                </div>
                </form>
                <!-- /.card-header -->
            </div>
            <!-- /.card -->
        </div>
        <br><br>
</div>
<!-- /.card -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php
    // $html=ob_get_contents();
    // $mpdf->WriteHTML($html);
    // $mpdf->Output("charge.pdf");
    // ob_end_flush();
?>
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {

    $('a[href^="./table_charge_create.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>