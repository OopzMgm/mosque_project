<?php include './include_menu.php' ?>

<br><br>
<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">แก้ไขรหัสผ่าน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:teal">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขรหัสผ่าน</li>
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
                <!-- <div class="card-header">
                    <a class="float-right btn btn-dark btn-sm" href="./table_board.php">
                        <i class="fas fa-th-list">
                        </i>
                        ดูข้อมูล
                    </a>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                <form action="change_password_db.php" method="post" class="form-horizontal">
                        <div class="row">
                        <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้</label>
                                    <input type="text" name="username_member" required class="form-control" autocomplete="off" value="<?php echo $row['username_member'];?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" name="password_member1" required class="form-control" placeholder="ป้อน . . .">
                                </div>
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ยืนยันรหัสผ่าน</label>
                                    <input type="password" name="password_member2" required class="form-control" placeholder="ป้อน . . .">
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="member_id" value="<?php echo $row['member_id'];?>">
                  <button class="btn btn-info" type="submit">แก้ไข</button>
                  <button class="btn btn-default" type="reset">ยกเลิก</button>
                  <!-- <button class="btn btn-default float-right" type="submit">Cancel</button> -->
                </div>
                <!-- /.card-header -->
                </form>

            </div>
            <!-- /.card -->
        </div>
        <br><br>
</div>
<!-- /.card -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {

    $('a[href^="./change_password.php"]').addClass('nav-item has-treeview menu-open nav-link active ');

});
</script>