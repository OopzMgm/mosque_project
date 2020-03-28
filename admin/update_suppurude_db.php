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
$suppurude_id = $_POST["suppurude_id"];

	$sql = "UPDATE  tbl_suppurude SET 
	id_card_sup='$id_card_sup',
	title_sup='$title_sup',
	f_name_sup='$f_name_sup',
	l_name_sup='$l_name_sup',
	gender_sup='$gender_sup',
	birthday_sup='$birthday_sup',
	family_status='$family_status',
	status_quo='$status_quo',
	social_status='$social_status',
	father='$father',
	mother='$mother',
	ref_family_id='$ref_family_id',
	remark_sup='$remark_sup'
	WHERE suppurude_id=$suppurude_id
	";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'table_suppurude.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_suppurude.php'; ";
	echo "</script>";
}
?>