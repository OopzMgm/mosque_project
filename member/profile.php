<?php
    include './include_menu.php'
?>
<br><br>
<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ข้อมูลส่วนตัว</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:teal">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">


        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-teal">
                <h3 class="widget-user-username"><?php echo $title_sup.''.$f_name_sup.'  '.$l_name_sup;?></h3>
                <h5 class="widget-user-desc"><?php echo $position_name;?></h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../mimg/<?php echo $image_member;?>" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div>
                            <div class="card-header text-muted border-bottom-0">
                                <h2 class="text-muted text-sm"><b>ชื่อผู้ใช้: </b> <?php echo $row['username_member'];?> </h2>
                                <h2 class="text-muted text-sm"><b>รหัสผ่าน: </b> <?php echo $row['password_member'];?> </h2>
                                <h2 class="text-muted text-sm"><b>ระดับเข้าระบบ: </b> <?php echo $row['user_level_member'];?>
                                </h2>
                            </div>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h2 class="text-muted text-md"><b>ชื่อ-นามสกุล: </b>
                                <?php echo $row['title_sup'] .' '.$row['f_name_sup'] .' '.$row['l_name_sup'];?> </h2>
                            <!-- <h2 class="text-muted text-md"><b>ตำแหน่ง: </b> <?php echo $row['position_name'];?> </h2> -->
                            <!-- <h2 class="text-muted text-md"><b>เขตที่รับผิดชอบ: </b> <?php echo $row['area_name'];?></h2> -->
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                    เบอร์โทรศัพท์: <?php echo $row['telephone_member'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>
                                    อีเมล: <?php echo $row['email_member'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span>
                                    เลขรหัสประจำตัวประชาชน: <?php echo $row['id_card_sup'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
                                    วัน เดือน ปีเกิด: <?php echo date('d/m/Y', strtotime($row["birthday_sup"]));?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span>
                                    เพศ: <?php echo $row['gender_sup'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                                    ที่อยู่ : <?php echo 'หมู่ที่ '.$row['villageno'] .' ซอย/แยก '.$row['lane'] .' ถนน/คลอง '.$row['street'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspตำบล'.$row['district'] .' อำเภอ'.$row['sub_district'] .' จังหวัด'.$row['province'];?>
                                  <br><?php  echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspรหัสไปรษณีย์ '.$row['postal_code'];?></li>
                                  <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-comment-dots"></i></span>
                                    หมายเหตุเพิ่มเติม: <?php echo $row['remark_member'];?></li>
                                <li class="middle"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                                    วันที่ลงทะเบียน: <?php echo date('d/m/Y H:i:s', strtotime($row["date_save_member"]));?></li>
                            </ul>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->


    </section>
    <!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->
