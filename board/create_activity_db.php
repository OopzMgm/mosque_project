<meta charset="utf-8">
<?php
include('../condb.php'); 

	$name = $_POST["name"];
	$detail = $_POST["detail"];
	$ref_board_id = $_POST['ref_board_id'];

    $date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$image = (isset($_POST['image']) ? $_POST['image'] : '');
	$upload=$_FILES['image']['name'];
	if($upload !='') { 
		//โฟลเดอร์ที่เก็บไฟล์
		$path="../ac_img/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['image']['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../ac_img/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);  
	}
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO tbl_activity
	(
	name,
	detail,
	image,
	ref_board_id
	)
	VALUES
	(
	'$name',
	'$detail',
	'$newname',
	 $ref_board_id
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($condb);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_activity.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'table_activity.php'; ";
	echo "</script>";
}
?>




