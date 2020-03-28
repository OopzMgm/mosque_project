<?php
 session_start();
//  echo $_SESSION['status'];
?>
<?php
include('./condb.php'); 
$query = "
SELECT * 
FROM tbl_board as b 
INNER JOIN tbl_position as p ON b.ref_position_id=p.position_id
INNER JOIN tbl_area_board as a ON b.ref_area_id=a.area_id
WHERE user_level = 'board'"
or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);  
//echo $query;

$query2 = "
SELECT a.*,b.f_name_board,b.l_name_board
FROM tbl_activity as  a
LEFT JOIN tbl_board as b ON a.ref_board_id = b.board_id
ORDER BY a.activity_id DESC"
or die("Error:" . mysqli_error());
$result2 = mysqli_query($condb, $query2);  
//echo $query;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>งานทะเบียนมัสยิด</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#myPage">มัสยิดดารุสสลามบ้านลำลอง</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#myPage">หน้าแรก</a></li>
                    <li><a href="#committee">คณะกรรมการ</a></li>
                    <li><a href="#subpurut">สัปปุรุษ</a></li>
                    <li><a href="#chapanakit">ฌาปนกิจสงเคราะห์</a></li>
                    <li><a href="#activity">กิจกรรม</a></li>
                    <li><a href="#contact">ติดต่อ/สอบถาม</a></li>
                    <li> <a href="./login.php">เข้าสู่ระบบ</a> </li>
                    <!-- <li><a href="#committee"><span class="glyphicon glyphicon-search"></span></a></li> -->
                </ul>




            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="./assets/img/pic.jpg" alt="New York" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>มัสยิด</h3>
                    <p>“มัสยิด” หมายความว่า สถานที่ซึ่งมุสลิมใช้ประกอบศาสนกิจโดยจะต้องมีละหมาดวันศุกร์เป็นเป็นปกติ
                        และเป็นสถานที่สอนศาสนาอิสลาม</p>
                </div>
            </div>

            <div class="item">
                <img src="./assets/img/pic.jpg" alt="Chicago" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>สัปปุรุษ</h3>
                    <p>“สัปปุรุษประจำมัสยิด” หมายความว่า
                        มุสลิมที่คณะกรรมการอิสลามประจำมัสยิดมีมติรับเข้าเป็นสัปปุรุษประจำมัสยิด
                        และมีชื่ออยู่ในทะเบียนสัปปุรุษประจำมัสยิด
                        แต่ผู้นั้นจะเป็นสัปปุรุษเกินกว่าหนึ่งมัสยิดในเวลาเดียวกันไม่ได้</p>
                </div>
            </div>

            <div class="item">
                <img src="./assets/img/pic.jpg" alt="Los Angeles" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>กองทุนการสงเคราะห์ผู้เสียชีวิต</h3>
                    <p>“กองทุนการสงเคราะห์ผู้เสียชีวิตประจำมัสยิด” ซึ่งเป็นกองทุนที่มีการทำงานแยกส่วนออกจากทะเบียนประวัติสัปปุรุษ แต่มีความเกี่ยวพันกันอย่างใกล้ชิด คือ สมาชิกของกองทุนก็คือสมาชิกของสัปปุรุษ กองทุนนี้ถูกตั้งขึ้นโดยมีวัตถุประสงค์เพื่อช่วยเหลือสมาชิกสัปปุรุษที่เสียชีวิต ซึ่งมีฐานะยากจน ที่ไม่มีค่าใช้จ่ายในการทำศพ เพราะเวลาจัดงานต้องมีการให้ค่าละหมาดเป็นสินน้ำใจแก่คนที่มาร่วมงาน </p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Container (The Band Section) -->
    <div id="committee" class="container text-center">



        <h3>คณะกรรมการ</h3>
        <br>

        <div class="row">
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <div class="col-sm-4">
                <a href="#demo" data-toggle="collapse">
                    <img src="bimg/<?php echo $row['image'];?>" class="img-circle person" alt="ภาพคณะกรรมการ"
                        width="255" height="255">
                </a>
                <p class="text-center">
                    <strong><?php echo $row['title'] .' '.$row['f_name_board'] .' '.$row['l_name_board'];?></strong></p>
                <p class="text-center"><strong><?php echo $row['telephone'];?></strong></p>
                <p class="text-center"><strong><?php echo $row['position_name'];?></strong></p><br>

                <!-- <div id="demo" class="collapse">
                </div> -->
            </div>
            <?php } ?>
        </div>
    </div>



    <div id="subpurut" class="bg-1" class="container text-center">

        <br>
        <br>

        <h3 class="text-center">ระเบียบสมาชิกสัปปุรุษ</h3>
        <div class="container" class="text-center">
            <p class="text-left"><em>“สัปปุรุษประจำมัสยิด” หมายความว่า
                    มุสลิมที่คณะกรรมการอิสลามประจำมัสยิดมีมติรับเข้าเป็นสัปปุรุษประจำมัสยิด
                    และมีชื่ออยู่ในทะเบียนสัปปุรุษประจำมัสยิด
                    แต่ผู้นั้นจะเป็นสัปปุรุษเกินกว่าหนึ่งมัสยิดในเวลาเดียวกันไม่ได้</em></p>
        </div>

        <br>
        <br>
        <div id="chapanakit" class="bg-1" class="container text-center">
            <br>
            <br>
            <h3 class="text-center">ระเบียบการเก็บเงิน ค่าจัดการศพ/เฝ้ากุโบร์ มัสยิดดารุสสลามลำลอง</h3>
            <div class="container" class="text-center">
                <em>
                    <p>1. สมาชิกกองทุนฯจะต้องมีคุณสมบัติดังนี้</p>
                    <p> - สมาชิกต้องเป็นบุคคลในครอบครัวอาศัยอยู่ในชุมชนบ้านลำลองและเป็นสัปปุรุษ</p>
                    <p> - มัสยิดดารุสสลาม อายุ 13 ปีขึ้นไป</p>
                    <p> - สมัครเป็นสมาชิกกองทุนฯและมีชื่ออยู่ในทะเบียนสมาชิก</p>
                    <p>2. สมาชิกที่เสียชีวิตต้องมีอายุ 13 ปีขึ้นไปจึงจะได้สิทธิรับเงิน</p>
                    <p>3. เก็บเงินจากสมาชิกครัวเรือนละ 105 บาท เข้ากองทุน 100 บาท หักให้ผู้เก็บเงิน 5 บาท</p>
                    <p>4. คณะกรรมการการมัสยิดที่รับผิดชอบแต่ละโซนเป็นผู้เก็บ</p>
                    <p>5. ระยะเวลาการเก็บ เก็บบทันทีหลังมีการเสียชีวิต-ภายในสองสัปดาห์</p>
                    <p>6. เงินที่เก็บได้ฝากธนาคาร โดยมีรายชื่อผู้เปิดบัญชี 3 คนคือ นายอับดุลเลาะ วาเย็ง เปาะซูยี
                        เจ๊ะฆูเละ</p>
                    <p>7. สมาชิกจะได้สิทธิรับเงินค่าช่วยเหลือศพเมื่อมับุคคลในครอบครัวเสียชีวิตตามเงินที่เก็บได้ทั้งหมด
                        เป็นค่าจัดการศพ เฝ้ากุโบร์
                        และทำบุญให้แก่ศพ และหักเข้ากองทุน 200 บาท เป็นค่าดำเนินการเอกสาร</p>
                    <p>8. ในกรณีที่เจ้าบ้านสมาชิกหาคนเฝ้ากุโบร์ไม่ได้ก็มอบให้อิหม่าม คอเต็บ บิลาล หาคนภายนอกได้ในราคา
                        20,000 บาท อาหารให้เจ้าบ้านหามาให้</p>
                    <p>9. คนเฝ้ากุโบร์ จะต้อง</p>
                    <p> - อ่าน กุลฮู 700,000 ครั้ง</p>
                    <p> - ซิกิร 700,000 ครั้ง</p>
                    <p> - อัล-กุรอาน 30 ญุซ</p>
                    <p>10. ในกรณีบุคคลใดบุคคลหนึ่งในครอบครัวต้องอาศัยต่างชุมชนแล้วเสียชีวิตสามารถรับสิทธิตามข้อ 7</p>
                    <p>11. คนที่ไม่ได้เป็นสมาชิก คนนอก มาเสียที่บ้านสมาชิก ไม่มีสิทธิรับเงิน</p>
                    <p>12. พ่อ แม่ พี่ น้อง ลูก หลาน ที่อยู่บ้านเดียวกับสมาชิกจะได้รับสิทธิตามข้อ 7</p>
                    <p>13. พ่อ แม่ พี่ น้อง ที่ไม่อยู่บ้านเดียวกับสมาชิก ไม่มีสิทธิรับเงิน</p>
                    <p>14. ผู้ที่พึ่งแต่งงานสมัครเป็นสมาชิกใหม่ได้ทันที</p>
                    <p>15. ลูกเลี้ยงที่อยู่บ้านสมาชิกเบิกได้ อยู่ต่างถิ่นไม่มีสิทธิ์รับเงิน </p>
                    <p>16. ในกรณีที่่แต่งงานแล้ว แต่หย่ากับสามีหรือภรรยา แล้วมาเสียชีวิตที่บ้านสมาชิกจะได้รับสิทธิ</p>
                    <p>17. เปิดรับสมาชิกใหม่ ปีละ 1 ครั้ง ภายใน วันที่ 1-15 เดือนมีนาคม ของทุกปี</p>
                    <p>18. ผู้ที่เป็นสมาชิกพ้นจากการเป็นสมาชิกก็ต่อเมื่อมีคนหนึ่งคนใดเสียชีวิตจะมีการประกาศที่มัสยิด
                        แล้วทางคณะกรรมการไปเก็บเงินแล้วยังไม่ให้
                        แล้วแจ้งให้อิหม่ามหรือคอเต็บหรือบิลาลทราบ แล้วให้อิหม่าม คอเต็บหรือบิลาล
                        ไปเก็บถ้ายังไม่ได้จึงพ้นจากการเป็ยสมาชิกตามระยะเวลาภายใน 15 วัน
                        นับจากวันที่มีการเสียชีวิต</p>
                    <p>19. ผู้ที่เป็นสมาชิกเมื่อพ้นจากการเป็นสมาชิกแล้ว
                        ถ้าจะสมัครเป็นสมาชิกใหม่จะต้องเสียตามจำนวนครั้งที่ขาดจนครบ ประกาศสมัครภายใน
                        วันที่ 1-15 เดือนมีนาคม ของทุกปี </p>
                    <p><em>20. ให้คณะกรรมการสำรวจรายชื่อผู้ที่เป็นสมาชิกทั้งภายนอกและภายในแล้วประกาศให้ทุกคนได้ทราบ</em>
                    </p>
                </em></div>
            <div id="activity" class="bg-1">
                <div class="container">
                    <h3 class="text-center">ภาพกิจกรรม</h3>
                    <div class="row">
                        <div class="row text-center">
                            <?php while($row = mysqli_fetch_array($result2)) { ?>
                            <div class="col-sm-4">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="ac_img/<?php echo $row['image'];?>" alt="ภาพกิจกรรม" width="100%">
                                    </a>
                                    <p class="text-center"><strong><?php echo $row['name'];?></strong></p>
                                    <p class="text-center"> <?php echo $row['detail'];?> </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>
                                    Tickets, $23 per person</label>
                                <input type="number" class="form-control" id="psw" placeholder="How many?">
                            </div>
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send
                                    To</label>
                                <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-block">Pay
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Cancel
                        </button>
                        <p>Need <a href="#">help?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <div id="contact" class="container">
        <h3 class="text-center">ติดต่อ/สอบถาม</h3>
        <p class="text-center"><em>ส่งข้อความ สอบถามเราได้ที่นี่!!!</em></p>

        <div class="row">
            <div class="col-md-4">
                <p>ข้อมูลติดต่อ</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>มัสยิดดารุสสลามบ้านลำลอง
                </p>
                <p><span class="glyphicon glyphicon-phone"></span>Phone: 074-805-215</p>
                <p><span class="glyphicon glyphicon-envelope"></span>Email: myname.mat9031@gmail.com</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <form action="./admin/report_problem_db.php" method="post">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="p_username" placeholder="ชื่อผู้ใช้" type="text"
                                required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="p_fname_lname" placeholder="ชื่อ-นามสกุล"
                                type="text" required>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="p_email" placeholder="อีเมล์" type="email"
                            required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="p_phone" placeholder="เบอร์โทรศัพท์" type="text"
                            required>
                    </div>

                </div>
                <textarea class="form-control" id="comments" name="p_detail" placeholder="ปัญหา" rows="5"></textarea>
                <br>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn pull-right" type="submit">Send</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <br>
        <h3 class="text-center">คนสำคัญของมัสยิด</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">ดอเซะ</a></li>
            <li><a data-toggle="tab" href="#menu1">สมัน</a></li>
            <li><a data-toggle="tab" href="#menu2">อีซอ</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h2>นายดอเซะ มะเซ็ง, อิหม่าม</h2>
                <p>“อิหม่าม” หมายความว่า ผู้นำศาสนาอิสลามประจำมัสยิด</p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h2>นายสมัน สะมะแอ, คอเต็บ</h2>
                <p> “คอเต็บ” หมายความว่า ผู้แสดงธรรมประจำมัสยิด</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h2>นายอีซอ ยาตี, บิหลั่น</h2>
                <p>“บิหลั่น” หมายความว่า ผู้ประกาศเชิญชวนให้มุสลิมปฏิบัติศาสนากิจตามเวลา</p>
            </div>
        </div>
    </div>

    <!-- Image of location/map -->
    <div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10180.
            034699360811!2d100.79948237984324!3d6.711987660276059!2m3!1f0!2f0!3f0!3m2
            !1i1024!2i768!4f13.1!3m3!1m2!1s0x31b339fc30c51db9%3A0x673262948967bcbc!2s
            Darusalam%20Mosque!5e0!3m2!1sen!2sth!4v1566661123620!5m2!1sen!2sth" width="100%" height="400"
            frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <!-- <img src="./assets/img/mas2.jpg" class="img-responsive" style="width:100%"> -->
    </div>
    <!-- Footer -->
    <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>เว็บไซต์<a href="index.php" data-toggle="tooltip" title="Visit w3schools">มัสยิดดารุสสาลามบ้านลำลอง</a>
        </p>
    </footer>

    <script>
    $(document).ready(function() {
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
    </script>

</body>

</html>