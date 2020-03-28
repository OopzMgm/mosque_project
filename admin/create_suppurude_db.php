<meta charset="utf-8">
<?php
include('../condb.php'); 

$id_card_sup = $_POST["id_card_sup"];
$title_sup = $_POST["title_sup"];
$f_name_sup = $_POST["f_name_sup"];
$l_name_sup = $_POST["l_name_sup"];
$gender_sup = $_POST["gender_sup"];
$birthday_sup = $_POST["birthday_sup"];
// $birthday_sup = ($_POST["birthday_sup"])-543;
$family_status = $_POST["family_status"];
$status_quo = $_POST["status_quo"];
$social_status = $_POST["social_status"];
$father = $_POST["father"];
$mother = $_POST["mother"];
$ref_family_id = $_POST["ref_family_id"];
$remark_sup = $_POST["remark_sup"];

	$check = "
	SELECT  id_card_sup , f_name_sup
	FROM tbl_suppurude 
	WHERE id_card_sup = '$id_card_sup'
	AND f_name_sup = '$f_name_sup' 
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

	$sql = "INSERT INTO tbl_suppurude
	(
		id_card_sup,
		title_sup,
		f_name_sup,
		l_name_sup,
		gender_sup,
		birthday_sup,
		family_status,
		status_quo,
		social_status,
		father,
		mother,
		ref_family_id,
		remark_sup
	)
	VALUES
	(
	'$id_card_sup',
	'$title_sup',
	'$f_name_sup',
	'$l_name_sup',
	'$gender_sup',
	'$birthday_sup',
	'$family_status',
	'$status_quo',
	'$social_status',
	'$father',
	'$mother',
	'$ref_family_id',
	'$remark_sup'
	)";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
}
	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_suppurude.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_suppurude.php'; ";
	echo "</script>";
}
?>