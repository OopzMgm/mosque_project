<?php
include('./include_menu.php'); 
$query = "
SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE status_quo = 'ยังอยู่'" 
or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);  
//echo $query;

$query2 = "
SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE status_quo = 'เสียชีวิต'"
or die("Error:" . mysqli_error());
$result2 = mysqli_query($condb, $query2);  
//echo $query;

$query3 = "
SELECT COUNT(member_id) FROM tbl_member"
or die("Error:" . mysqli_error());
$result3 = mysqli_query($condb, $query3);  
//echo $query;

$query4 = "
SELECT COUNT(family_id) FROM tbl_house"
or die("Error:" . mysqli_error());
$result4 = mysqli_query($condb, $query4);  
//echo $query;
// ===================================================
$query5 = "
SELECT COUNT(b_log_id) FROM tbl_login_board"
or die("Error:" . mysqli_error());
$result5 = mysqli_query($condb, $query5);  
//echo $query;
$query6 = "
SELECT COUNT(m_log_id) FROM tbl_login_member"
or die("Error:" . mysqli_error());
$result6 = mysqli_query($condb, $query6);  
//echo $query;
// =======================================================
$querych = "
SELECT SUM(amount_charge) FROM tbl_charge"
or die("Error:" . mysqli_error());
$resultch = mysqli_query($condb, $querych); 

$querypay = "
SELECT SUM(amount_pay) FROM tbl_pay"
or die("Error:" . mysqli_error());
$resultpay = mysqli_query($condb, $querypay);  

$querysum = "
SELECT SUM(amount_pay) FROM tbl_pay"
or die("Error:" . mysqli_error());
$resultsum = mysqli_query($condb, $querysum);  
// ===============================================================
//echo $query;
$query8 = "
SELECT COUNT(marriage_id) FROM tbl_marriage"
or die("Error:" . mysqli_error());
$result8 = mysqli_query($condb, $query8);  
//echo $query;
// ================================================
$query9 = "
SELECT * 
FROM tbl_board as b 
INNER JOIN tbl_position as p ON b.ref_position_id=p.position_id
INNER JOIN tbl_area_board as a ON b.ref_area_id=a.area_id WHERE user_level = 'board'"
or die("Error:" . mysqli_error());
$result9 = mysqli_query($condb, $query9);  
//echo $query;
$query10 = "
SELECT COUNT(board_id) FROM tbl_board"
or die("Error:" . mysqli_error());
$result10 = mysqli_query($condb, $query10);  
//echo $query;
// ================================================
$query11 = "
SELECT * 
FROM tbl_member"
or die("Error:" . mysqli_error());
$result11 = mysqli_query($condb, $query11);  
//echo $query;
$query12 = "
SELECT COUNT(member_id) FROM tbl_member"
or die("Error:" . mysqli_error());
$result12 = mysqli_query($condb, $query12);  
//echo $query;
?>
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ข้อมูลรายงานสรุป</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:green">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลรายงานสรุป</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $row['COUNT(suppurude_id)'];?></h3>

                            <p>จำนวนสัปปุรุษ</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="table_suppurude.php" class="small-box-footer">ดูข้อมูล <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <!-- ./col -->
                <?php while($row = mysqli_fetch_array($result3)) { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $row['COUNT(member_id)'];?></h3>
                            <!-- <sup style="font-size: 20px">%</sup> -->
                            <p>จำนวนสมาชิก</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-friends"></i>
                        </div>
                        <a href="table_member.php" class="small-box-footer">ดูข้อมูล <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <!-- ./col -->
                <?php while($row = mysqli_fetch_array($result4)) { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $row['COUNT(family_id)'];?></h3>

                            <p>จำนวนครอบครัว</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <a href="table_house.php" class="small-box-footer">ดูข้อมูล <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <!-- ./col -->
                <?php while($row = mysqli_fetch_array($result2)) { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $row['COUNT(suppurude_id)'];?></h3>

                            <p>จำนวนผู้เสียชีวิต</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-ambulance"></i>
                        </div>
                        <a href="table_death.php" class="small-box-footer">ดูข้อมูล <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <!-- ./col -->
            </div>
            <div class="row">
                <?php while($row = mysqli_fetch_array($result5)) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> Total Login Board</span>
                            <span class="info-box-number">
                                <?php echo $row['COUNT(b_log_id)'];?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php } ?>
                <!-- /.col -->
                <?php while($row = mysqli_fetch_array($result6)) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Login Member</span>
                            <span class="info-box-number">  <?php echo $row['COUNT(m_log_id)'];?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } ?>
                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div>
                <?php while($row = mysqli_fetch_array($resultch)) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนเงินเรียกเก็บ</span>
                            <span class="info-box-number"><?php 
                            $sum1 = $row['SUM(amount_charge)'];
                            echo number_format($row['SUM(amount_charge)'],2);
                            ?>฿</span>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php while($row = mysqli_fetch_array($resultpay)) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนเงินจ่ายญาติ</span>
                            <span class="info-box-number"><?php 
                              $sum2 = $row['SUM(amount_pay)'];
                              echo number_format($row['SUM(amount_pay)'],2);
                            ?>฿</span>
                        </div>
                    </div>
                </div>
                <?php } ?> -->
                <?php while($row = mysqli_fetch_array($resultsum)) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนเงินกองทุนฯ</span>
                            <span class="info-box-number"><?php 
                            $sum3 = $sum2-$sum1;
                            echo number_format(abs($sum3),2);
                            // echo number_format($row['SUM(amount_pay)'],2);
                            
                            ?>฿</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php } ?>
                <!-- /.col -->
                <?php while($row = mysqli_fetch_array($result8)) { ?>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนคู่สมรส</span>
                            <span class="info-box-number"> <?php echo $row['COUNT(marriage_id)'];?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php } ?>

                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">คณะกรรมการ</h3>
                            <?php while($row = mysqli_fetch_array($result10)) { ?>
                            <div class="card-tools">
                                <span class="badge badge-dark"> คณะกรรมการ <?php echo $row['COUNT(board_id)'];?> คน</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <?php while($row = mysqli_fetch_array($result9)) { ?>
                                <div class="col-sm-4">
                                    <a href="#demo" data-toggle="collapse">
                                        <img src="../bimg/<?php echo $row['image'];?>" class="img-circle person"
                                            alt="ภาพคณะกรรมการ" width="100px">
                                    </a>
                                    <p class="text-center">
                                      
                                    </p>

                                    <!-- <div id="demo" class="collapse">
                </div> -->
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="table_board.php" style="color:gray">ดูข้อมูล</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">สมาชิก</h3>
                            <?php while($row = mysqli_fetch_array($result12)) { ?>
                            <div class="card-tools">
                                <span class="badge badge-dark"> สมาชิก <?php echo $row['COUNT(member_id)'];?> คน</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <?php while($row = mysqli_fetch_array($result11)) { ?>
                                <div class="col-sm-4">
                                    <a href="#demo" data-toggle="collapse">
                                        <img src="../mimg/<?php echo $row['image_member'];?>" class="img-circle person"
                                            alt="ภาพคณะกรรมการ" width="100px">
                                    </a>
                                    <p class="text-center">
                                      
                                    </p>

                                    <!-- <div id="demo" class="collapse">
                </div> -->
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="table_suppurude.php" style="color:gray">ดูข้อมูล</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer -->
                <!--/.card -->
                <!-- /.card -->
                <!-- <div class="col-6">
                    <div class="card bg-gradient-gray-dark">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3> -->
                            <!-- tools card -->
                            <!-- <div class="card-tools"> -->
                                <!-- button with a dropdown -->
                                <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i></button>
                                    <div class="dropdown-menu float-right" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div> -->
                                <!-- <button type="button" class="btn btn-gray btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-gray btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> -->
                            <!-- /. tools -->
                        <!-- </div> -->
                        <!-- /.card-header -->
                        <!-- <div class="card-body pt-0">
                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                </th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Month">February 2020</th>
                                                                <th class="next" data-action="next">
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="01/26/2020"
                                                                    class="day old weekend">26</td>
                                                                <td data-action="selectDay" data-day="01/27/2020"
                                                                    class="day old">27</td>
                                                                <td data-action="selectDay" data-day="01/28/2020"
                                                                    class="day old">28</td>
                                                                <td data-action="selectDay" data-day="01/29/2020"
                                                                    class="day old">29</td>
                                                                <td data-action="selectDay" data-day="01/30/2020"
                                                                    class="day old">30</td>
                                                                <td data-action="selectDay" data-day="01/31/2020"
                                                                    class="day old">31</td>
                                                                <td data-action="selectDay" data-day="02/01/2020"
                                                                    class="day weekend">1</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="02/02/2020"
                                                                    class="day weekend">2</td>
                                                                <td data-action="selectDay" data-day="02/03/2020"
                                                                    class="day">3</td>
                                                                <td data-action="selectDay" data-day="02/04/2020"
                                                                    class="day">4</td>
                                                                <td data-action="selectDay" data-day="02/05/2020"
                                                                    class="day">5</td>
                                                                <td data-action="selectDay" data-day="02/06/2020"
                                                                    class="day">6</td>
                                                                <td data-action="selectDay" data-day="02/07/2020"
                                                                    class="day">7</td>
                                                                <td data-action="selectDay" data-day="02/08/2020"
                                                                    class="day weekend">8</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="02/09/2020"
                                                                    class="day weekend">9</td>
                                                                <td data-action="selectDay" data-day="02/10/2020"
                                                                    class="day">10</td>
                                                                <td data-action="selectDay" data-day="02/11/2020"
                                                                    class="day">11</td>
                                                                <td data-action="selectDay" data-day="02/12/2020"
                                                                    class="day">12</td>
                                                                <td data-action="selectDay" data-day="02/13/2020"
                                                                    class="day">13</td>
                                                                <td data-action="selectDay" data-day="02/14/2020"
                                                                    class="day active today">14</td>
                                                                <td data-action="selectDay" data-day="02/15/2020"
                                                                    class="day weekend">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="02/16/2020"
                                                                    class="day weekend">16</td>
                                                                <td data-action="selectDay" data-day="02/17/2020"
                                                                    class="day">17</td>
                                                                <td data-action="selectDay" data-day="02/18/2020"
                                                                    class="day">18</td>
                                                                <td data-action="selectDay" data-day="02/19/2020"
                                                                    class="day">19</td>
                                                                <td data-action="selectDay" data-day="02/20/2020"
                                                                    class="day">20</td>
                                                                <td data-action="selectDay" data-day="02/21/2020"
                                                                    class="day">21</td>
                                                                <td data-action="selectDay" data-day="02/22/2020"
                                                                    class="day weekend">22</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="02/23/2020"
                                                                    class="day weekend">23</td>
                                                                <td data-action="selectDay" data-day="02/24/2020"
                                                                    class="day">24</td>
                                                                <td data-action="selectDay" data-day="02/25/2020"
                                                                    class="day">25</td>
                                                                <td data-action="selectDay" data-day="02/26/2020"
                                                                    class="day">26</td>
                                                                <td data-action="selectDay" data-day="02/27/2020"
                                                                    class="day">27</td>
                                                                <td data-action="selectDay" data-day="02/28/2020"
                                                                    class="day">28</td>
                                                                <td data-action="selectDay" data-day="02/29/2020"
                                                                    class="day weekend">29</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="03/01/2020"
                                                                    class="day new weekend">1</td>
                                                                <td data-action="selectDay" data-day="03/02/2020"
                                                                    class="day new">2</td>
                                                                <td data-action="selectDay" data-day="03/03/2020"
                                                                    class="day new">3</td>
                                                                <td data-action="selectDay" data-day="03/04/2020"
                                                                    class="day new">4</td>
                                                                <td data-action="selectDay" data-day="03/05/2020"
                                                                    class="day new">5</td>
                                                                <td data-action="selectDay" data-day="03/06/2020"
                                                                    class="day new">6</td>
                                                                <td data-action="selectDay" data-day="03/07/2020"
                                                                    class="day new weekend">7</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">2020</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Dec</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {

    $('a[href^="./index.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>
<br><br>