<meta charset="utf-8">
<?php
include('../condb.php'); 

	$username_member = $_POST["username_member"];
	$password_member = md5($_POST["password_member"]);
	$email_member = ($_POST["email_member"]);
	$telephone_member = ($_POST["telephone_member"]);
	$remark_member = $_POST["remark_member"];
	$ref_suppurude_id = $_POST["ref_suppurude_id"];
	$ref_board_id = $_POST["ref_board_id"];
	$user_level_member = $_POST["user_level_member"];

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
	}

    $check = "
	SELECT username_member,ref_suppurude_id 
	FROM tbl_member 
	WHERE username_member = '$username_member' 
	OR ref_suppurude_id='$ref_suppurude_id'
	";
    $result1 = mysqli_query($condb, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
	    echo "<script>";
	    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
	    echo "window.history.back();";
	    echo "</script>";
    }else{

	$sql = "INSERT INTO tbl_member
	(
	username_member,
	password_member,
	image_member,
	email_member,
	telephone_member,
	ref_suppurude_id,
	ref_board_id,
	remark_member,
	user_level_member
	)
	VALUES
	(
	'$username_member',
	'$password_member',
	'$newname',
	'$email_member',
	'$telephone_member',
	'$ref_suppurude_id',
	'$ref_board_id',
	'$remark_member',
	'$user_level_member'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	}//close chk duplicat username_member

    mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_member.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_member.php'; ";
	echo "</script>";
}
?>