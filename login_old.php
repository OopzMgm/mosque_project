<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login_register.css">
    <!------ Include the above in your HEAD tag ---------->
</head>
<style>
a:hover {
  text-decoration: none;
}
</style>

<body>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <!-- <h2>มีบัญชีผู้ใช้แล้ว</h2> -->
            <!-- <p>สำหรับคนที่สมัครบัญชีแล้ว เข้าสู่ระบบได้เลย</p> -->
            <label id="label-register" for="log-reg-show">มัสยิดบ้านลำลอง</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
            <a id="label-login" for="log-login-show" style="color:lightgray" href="index.php">หน้าหลัก</a>
        </div>
        <div class="register-info-box">
            <!-- <h2>สร้างบัญชีผู้ใช้ใหม่</h2> -->
            <!-- <p>สำหรับคนไม่เคยสมัคร ต้องสมัครก่อน</p> -->
            <label id="label-login" for="log-login-show">เข้าสู่ระบบ <br>คณะกรรมการ</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
            <a id="label-login" for="log-login-show" style="color:lightgray" href="login_member.php">เข้าสู่ระบบสมาชิก</a><br>
            
        </div>

        <div class="white-panel">
            <form>
                <div class="login-show">
                    <h3 style="text-align:center">ระบบทะเบียนมัสยิดบ้านลำลอง</h3>
                    <br><br>
                     <img style="text-align:center" src="assets/img/pe.jpg" width="100%" alt="">
                </div>
            </form>
            <form action="action_login_board.php" method="post">
                <div class="register-show">
                     <h2>เข้าสู่ระบบ <h6><strong>(คณะกรรมการ)</strong></h6></h2>
                    <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
                    <input type="password" name="password" placeholder="รหัสผ่าน" required>
                    <input type="submit" class=btnsubmit name="submit" value="เข้าสู่ระบบ">
                    <!-- <a href="">ลืมรหัสผ่าน?</a> -->
                </div>
            </form>
        </div>
        <!--login_regis font white panel-->
    </div>
    <!--login_regis background gray panel-->
    <script src="login.js"></script>
</body>

</html>