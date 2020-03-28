<meta charset="utf-8">
<?php
//condb
include('../condb.php'); 

	$email_member = $_POST["email_member"];
	$telephone_member = $_POST["telephone_member"];
	$remark_member = $_POST["remark_member"];
	$image_member2 = $_POST["image_member2"];
	$member_id  = $_POST["member_id"];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$image_member = (isset($_POST['image_member']) ? $_POST['image_member'] : '');
	$upload=$_FILES['image_member']['name'];
	if($upload !='') { 
		$path="../mimg/";
		$type = strrchr($_FILES['image_member']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../mimg/".$newname;
		move_uploaded_file($_FILES['image_member']['tmp_name'],$path_copy);  
	}else{
		$newname=$image_member2;
	}

	//update data 
	$sql = "UPDATE tbl_member SET 
	email_member='$email_member',
	telephone_member='$telephone_member',
	image_member='$newname',
	remark_member='$remark_member'
	WHERE member_id=$member_id
	 ";


	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}
?>