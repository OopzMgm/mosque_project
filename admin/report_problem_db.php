<meta charset="utf-8">
<?php
include('../condb.php');  
	$p_usernamae = $_POST["p_username"];
	$p_fname_lname = $_POST["p_fname_lname"];
	$p_detail = $_POST["p_detail"];
	$p_email = $_POST["p_email"];
	$p_phone = $_POST["p_phone"];
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO tbl_problem
	(p_username,p_fname_lname,p_detail,p_email,p_phone)
	VALUES
	('$p_usernamae','$p_fname_lname','$p_detail' ,'$p_email', '$p_phone')";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($condb);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ขอบคุณ');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}

?>