<meta charset="utf-8">
<?php
include('../condb.php'); 

	$ref_board_id = $_POST['ref_board_id'];
	$f_name_board = $_POST["f_name_board"];
	$activity_edit_name = $_POST["activity_edit_name"];
	$date_edit = $_POST["date_edit"];
	$name = $_POST["name"];
	$detail = $_POST["detail"];
	$activity_id = $_POST["activity_id"];
	$image2 = $_POST["image2"];

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
	}else{
		$newname=$image2;
	}



	
	
	//edit prd
	$sql = "UPDATE tbl_activity SET 
	name='$name',
	detail='$detail',
	image='$newname',
	activity_edit_name='$activity_edit_name',
	date_edit='$date_edit'
	WHERE activity_id=$activity_id
	";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

//insert updat log 
	$sql2 = "INSERT INTO tbl_activity_update
	(
	ref_activity_id,
	ref_board_id
	)
	VALUES 
	(
	$activity_id,
	$ref_board_id
	)
	";

	$result2 = mysqli_query($condb, $sql2) or die ("Error in query: $sql " . mysqli_error());



	
	//ปิดการเชื่อมต่อ database
	mysqli_close($condb);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	

	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('แก้ไขข้อมูลสำเร็จ');";
		echo "window.location = 'table_activity.php'; ";
		echo "</script>";
		}else{
		echo "<script type='text/javascript'>";
		echo "window.location = 'table_activity.php'; ";
		echo "</script>";
}
?>




