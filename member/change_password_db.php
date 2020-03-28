<meta charset="utf-8">
<?php
include('../condb.php'); 

	$member_id  = $_POST["member_id"];
	$password_member1  = md5($_POST["password_member1"]);
	$password_member2  = md5($_POST["password_member2"]);

	if($password_member1 != $password_member2){
		echo "<script type='text/javascript'>";
			echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
			echo "window.location = 'change_password.php'; ";
		echo "</script>";

	}else{

	$sql = "UPDATE tbl_member SET 
	password_member='$password_member1'
	WHERE member_id=$member_id
	 ";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	}

	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password สำเร็จ');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}
?>