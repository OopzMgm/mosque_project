<meta charset="utf-8">
<?php
include('../condb.php'); 

	$board_id  = $_POST["board_id"];
	$password1  = md5($_POST["password1"]);
	$password2  = md5($_POST["password2"]);

	if($password1 != $password2){
		echo "<script type='text/javascript'>";
			echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
			echo "window.location = 'change_password.php'; ";
		echo "</script>";

	}else{

	$sql = "UPDATE tbl_board SET 
	password='$password1'
	WHERE board_id=$board_id
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