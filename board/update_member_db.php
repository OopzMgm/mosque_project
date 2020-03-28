<meta charset="utf-8">
<?php
include('../condb.php'); 

	$ref_board_id = $_POST['ref_board_id'];
	$f_name_board = $_POST["f_name_board"];
	$name_edit_member = $_POST["name_edit_member"];
	$date_edit_member = $_POST["date_edit_member"];
	$email_member = $_POST["email_member"];
	$telephone_member = $_POST["telephone_member"];
	$remark_member = $_POST["remark_member"];
	$member_id = $_POST["member_id"];
	$image_member2 = $_POST["image_member2"];

    $date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$image_member = (isset($_POST['image_member']) ? $_POST['image_member'] : '');
	$upload=$_FILES['image_member']['name'];
	if($upload !='') { 
		//โฟลเดอร์ที่เก็บไฟล์
		$path="../mimg/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['image_member']['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../mimg/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['image_member']['tmp_name'],$path_copy);  
	}else{
		$newname=$image_member2;
	}



	
	
	//edit prd
	$sql = "UPDATE tbl_member SET 
	email_member='$email_member',
	telephone_member='$telephone_member',
	remark_member='$remark_member',
	image_member='$newname',
	name_edit_member='$name_edit_member',
	date_edit_member='$date_edit_member'
	WHERE member_id=$member_id
	";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

//insert updat log 
	$sql2 = "INSERT INTO tbl_member_update
	(
	ref_member_id,
	ref_board_id
	)
	VALUES 
	(
	$member_id,
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
		echo "window.location = 'table_member.php'; ";
		echo "</script>";
		}else{
		echo "<script type='text/javascript'>";
		echo "window.location = 'table_member.php'; ";
		echo "</script>";
}
?>




