<meta charset="utf-8">
<?php
include('../condb.php'); 
	
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$id_card = $_POST["id_card"];
	$title = $_POST["title"];
	$f_name_board = $_POST["f_name_board"];
	$l_name_board = $_POST["l_name_board"];
	$gender = $_POST["gender"];
	$birthday = $_POST["birthday"];
	// $birthday = ($_POST['birthday'])-543;
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];
	$ref_position_id = $_POST["ref_position_id"];
	$ref_area_id = $_POST["ref_area_id"];
	$user_level = $_POST["user_level"];
	$remark = $_POST["remark"];

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
	}

    $check = "
	SELECT username 
	FROM tbl_board  
	WHERE username = '$username' 
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

	$sql = "INSERT INTO tbl_board
	(
	username,
	password,
	id_card,
	title,
	f_name_board,
	l_name_board,
	gender,
	birthday,
	telephone,
	email,
	ref_position_id,
	ref_area_id,
	image,
	user_level,
	remark
	)
	VALUES
	(
	'$username',
	'$password',
	'$id_card',
	'$title',
	'$f_name_board',
	'$l_name_board',
	'$gender',
	'$birthday',
	'$telephone',
	'$email',
	'$ref_position_id',
	'$ref_area_id',
    '$newname',
    '$user_level',
    '$remark'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	}//close chk duplicat username

    mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_board.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_board.php'; ";
	echo "</script>";
}
?>