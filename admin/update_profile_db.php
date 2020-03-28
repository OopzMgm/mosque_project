<meta charset="utf-8">
<?php
//condb
include('../condb.php'); 

	$id_card = $_POST["id_card"];
	$title = $_POST["title"];
	$f_name_board = $_POST["f_name_board"];
	$l_name_board = $_POST["l_name_board"];
	$gender = $_POST["gender"];
	$birthday = $_POST["birthday"];
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];
	$remark = $_POST["remark"];
	$image2 = $_POST["image2"];
	$board_id  = $_POST["board_id"];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$image = (isset($_POST['image']) ? $_POST['image'] : '');
	$upload=$_FILES['image']['name'];
	if($upload !='') { 
		$path="../bimg/";
		$type = strrchr($_FILES['image']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../bimg/".$newname;
		move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);  
	}else{
		$newname=$image2;
	}

	//update data 
	$sql = "UPDATE tbl_board SET 
	id_card='$id_card',
	title='$title',
	f_name_board='$f_name_board',
	l_name_board='$l_name_board',
	gender='$gender',
	birthday='$birthday',
	telephone='$telephone',
	email='$email',
	image='$newname',
	remark='$remark'
	WHERE board_id=$board_id
	 ";


	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'profile.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'profile.php'; ";
	echo "</script>";
}
?>