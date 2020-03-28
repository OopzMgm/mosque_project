<?php 
session_start();

include('../condb.php');

$board_id = $_SESSION['board_id'];
$user_level = $_SESSION['user_level'];

if($user_level!='admin'){
	Header("Location: ../logout.php");
}


$sql = "
SELECT * 
FROM tbl_board as b 
INNER JOIN tbl_position as p ON b.ref_position_id=p.position_id
INNER JOIN tbl_area_board as a ON b.ref_area_id=a.area_id WHERE board_id=$board_id";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

// $image = $row['image'];
// $f_name_board = $row['f_name_board'];

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบมัสยิดบ้านลำลอง/นายทะเบียน</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/test.js"></script>
    <!-- ============================================= -->
    <!-- (1) link-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
        from {
            opacity: .99
        }

        to {
            opacity: 1
        }
    }

    .chartjs-render-monitor {
        animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
        position: absolute;
        direction: ltr;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        pointer-events: none;
        visibility: hidden;
        z-index: -1
    }

    .chartjs-size-monitor-expand>div {
        position: absolute;
        width: 1000000px;
        height: 1000000px;
        left: 0;
        top: 0
    }

    .chartjs-size-monitor-shrink>div {
        position: absolute;
        width: 200%;
        height: 200%;
        left: 0;
        top: 0
    }
    </style>

</head>
<!-- ============================================= -->
<!-- </head>
<style>
li {
  font-family: "JasmineUPC", Times, serif;
  /* font-size: 15px; */
  /* font-size: large; */
  font-size: 120%;
}
</style> -->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <!-- ============================================= -->
        <!-- (2) navbar-->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-success navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link">หน้าแรก</a>
                </li>
            </ul>
            <!-- ( วันเวลา ณ ปัจจุบัน : <?php echo date('d/m/Y H:i:s' );?> ) -->
            ( วันเวลา ณ ปัจจุบัน : <?php echo date('d-m-');
                                     $y = date('Y');
                                     echo $y+543;
                                     echo date(' H:i:s');
                                ?> )
           

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../logout.php" class="nav-link">ออกจากระบบ</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- ============================================= -->

        <!-- ============================================= -->
        <!-- (3) sidebar_menu -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="../index.php" class="brand-link">
                <img src="../assets/img/logo/mus.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">ระบบมัสยิดลำลอง</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../bimg/<?php echo $image;?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?php echo $f_name_board.'  '.$l_name_board;?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="./index.php" class="nav-link">
                                <i class=" nav-icon fas fa-chart-pie"></i>

                                <p>
                                    รายงานสรุป
                                </p>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    หน้าหลัก

                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./profile.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>ข้อมูลส่วนตัว </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./update_profile.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>แก้ไขข้อมูลส่วนตัว</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./change_password.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>แก้ไขรหัสผ่าน </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">ตรวจสอบข้อมูล</li>
                        <li class="nav-item">
                            <a href="./table_member.php" class="nav-link">
                                <i class="nav-icon fas fa-user-check"></i>

                                <p>
                                    ข้อมูลสมาชิกกองทุนฯ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./login_history.php" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>

                                <p>
                                    ประวัติเข้าสู่ระบบกรรมการ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./report_problem_list.php" class="nav-link">
                                <i class=" nav-icon fas fa-exclamation-triangle"></i>

                                <p>
                                    แจ้งปัญหา
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">จัดการข้อมูล</li>
                        <li class="nav-item">
                            <a href="./table_position.php" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>

                                <p>
                                    ข้อมูลตำแหน่งคณะกรรมการ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./table_area_board.php" class="nav-link">
                                <i class="nav-icon fas fa-street-view"></i>

                                <p>
                                    ข้อมูลเขตคณะกรรมการ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./table_board.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    ข้อมูลคณะกรรมการ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./table_house.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>

                                <p>
                                    ข้อมูลสำเนาทะเบียนบ้าน
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./table_suppurude.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>

                                <p>
                                    ข้อมูลสัปปุรุษ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    ผู้เสียชีวิต
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-success right">2</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./table_death_create.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>บันทึกข้อมูลใบมรณะบัตร</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table_death.php" class="nav-link">
                                        <i class="nav-icon far fa-circle text-success"></i>
                                        <p>ข้อมูลสัปปุรุษที่เสียชีวิต</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-hand-holding-heart"></i>
                                <p>
                                    การสมรส
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./table_marriage_create.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>บันทึกข้อมูลการสมรส</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table_marriage.php" class="nav-link">
                                        <i class="nav-icon far fa-circle text-success"></i>
                                        <p>ข้อมูลสมรสของสัปปุรุษ</p>
                                    </a>
                                </li>
                            </ul>
                        <!-- <li class="nav-header">อัพโหลดไฟล์</li>
                        <li class="nav-item">
                            <a href="./upload_file.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>

                                <p>
                                    ข้อมูลไฟล์ทั้งหมด
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-header">รายงานข้อมูล</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-contract"></i>
                                <p>
                                    บริหารมัสยิด
                                    <i class="fas fa-angle-left right "></i>
                                    <span class="badge badge-success right">5</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../file/code_board.php" title="PDF [new window]" target="_blank"" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>รายชื่อคณะกรรมการ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../file/code_suppurude_all.php" title="PDF [new window]" target="_blank"class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>รายชื่อสัปปุรุษ</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../file/code_suppurude_house.php" title="PDF [new window]" target="_blank" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>สัปปุรุษตามทะเบียนบ้าน</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="./file_family.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>ข้อมูลครอบครัวสัปปุรุษ</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="../file/code_marriage_all.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>รายชื่อคู่สมรสสัปปุรุษ</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-export"></i>
                                <p>
                                    ส่งรายงาน
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-success right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="../file/code_vote.php" title="PDF [new window]" target="_blank" class="nav-link">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>บัญชีผู้มีสิทธิ์คัดเลือก</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="../file/code_summary.php" title="PDF [new window]" target="_blank" class="nav-link">
                                        <i class="nav-icon far fa-circle text-success"></i>
                                        <p>สรุปข้อมูลสัปปุรุษ</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-header">อื่นๆ</li>
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    หน้าแรก
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>

                                <p>
                                    ออกจากระบบ
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- ============================================= -->

        <!-- content -->

        <!-- ============================================= -->
        <!-- (4) footer-->
        <footer class="main-footer">
            <strong>ระบบทะเบียนประวัติสัปปุรุษ และจัดการกองทุนการสงเคราะห์ผู้เสียชีวิต
                กรณีศึกษา
                <a href="../index.php" style="color:green">มัสยิดดารุสสลามบ้านลำลอง</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>2019</b>
            </div>
        </footer>

        <!-- ============================================= -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- ============================================= -->
    <!-- (5) script-->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>
    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    </script>
</body>
<!-- ============================================= -->

</html>