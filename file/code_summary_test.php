<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	include('./include_menu.php'); 
	require_once __DIR__ . '../../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf([
		'default_font_size' => 18,
		'default_font' => 'jasmineupc'
	]);

	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mosque_project";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	mysqli_set_charset($conn, "utf8");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM tbl_suppurude";
	$result = mysqli_query($conn, $sql); 




$head = '
<style>
	body{
		text-align: center;
	}
	.grid-container {
		display: grid;
		grid-template-columns: auto auto auto;
		padding: 2px;
	  }
	  .grid-item {
		background-color: rgba(255, 255, 255, 0.2);
		border: 1px solid rgba(0, 0, 0, 0.2);
		padding: 15px;
		font-size: 20px;
		text-align: left;
	  }
	
</style>
<h4><strong>ระบบทะเบียนมัสยิดดารุสสลามบ้านลำลอง</strong> <br>
ตั้งอยู่ เลขที่ 257 หมู่ที่ 12 ตำบลนาทวี อำเภอนาทวี จังหวัดสงขลา<h4>
        <img src="../assets/img/logo/musque1.jpg" width="100"></span>
               
<h2>สรุปข้อมูลสัปปุรุษ</h2>
';

$content = '
<div class="grid-container">
	<div class="grid-item">สัปปุรุษประจำมัสยิด :             จำนวน 5 ครอบครัว</div>
	<div class="grid-item">สัปปุรุษที่วายิบละหมาดวันศุกร์ : จำนวน 7 คน</div>
	<div class="grid-item">สัปปุรุษทั้งหมด : จำนวน 15 คน</div>  
	<div class="grid-item">จำนวนสัปปุรุษแบ่งได้ดังนี้ : <br> ชาย จำนวน 8 คน<br>  หญิง จำนวน 7 คน<br>  รวม จำนวน 15 คน</div>
	<div class="grid-item">จำนวนเด็กอายุตั้งแต่ 1-15 ขึ้นไปมีดังนี้ : 
	<br>ชาย <br> &nbsp; อายุ 1-3 ปี =>จำนวน 0 คน <br> &nbsp; อายุ 4-6 ปี => จำนวน 2 คน<br> &nbsp; อายุ 7-15 ปี => จำนวน 5 คน<br>รวม 
	<br>หญิง <br> &nbsp; อายุ 1-3 ปี =>จำนวน 0 คน <br> &nbsp; อายุ 4-6 ปี => จำนวน 4 คน<br> &nbsp; อายุ 7-15 ปี =>  จำนวน 4 คน<br>รวม 
	<br>รวมเด็กชาย-หญิง อายุตั้งแต่ 1-15 ปี จำนวน 15 คน</div>
  </div>
';

$end = '';
	
	mysqli_close($conn);
	


$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();
?>
