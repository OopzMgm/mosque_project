<meta charset="utf-8">
<?php
include('../condb.php'); 

	$d_certificate = $_POST['d_certificate'];
	$officer = $_POST["officer"];
	$date_death = $_POST["date_death"];
	$death_age = $_POST["death_age"];
	$cause_death = $_POST["cause_death"];
	$death_place = $_POST["death_place"];
	$prayer_place = $_POST["prayer_place"];
	$burial_ground = $_POST["burial_ground"];
	$remark_death = $_POST["remark_death"];
	$ref_suppurude_id = $_POST["ref_suppurude_id"];
	$death_id = $_POST["death_id"];
	
	//edit prd
	$sql = "UPDATE tbl_death SET 
	d_certificate='$d_certificate',
	officer='$officer',
	date_death='$date_death',
	death_age='$death_age',
	cause_death='$cause_death',
	death_place='$death_place',
	prayer_place='$prayer_place',
	burial_ground='$burial_ground',
	remark_death='$remark_death',
	ref_suppurude_id='$ref_suppurude_id'
	WHERE death_id=$death_id
	";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	//ปิดการเชื่อมต่อ database
	mysqli_close($condb);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('แก้ไขข้อมูลสำเร็จ');";
		echo "window.location = 'table_death.php'; ";
		echo "</script>";
		}else{
		echo "<script type='text/javascript'>";
		echo "window.location = 'table_death.php'; ";
		echo "</script>";
}
?>




