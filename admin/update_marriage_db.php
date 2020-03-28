<meta charset="utf-8">
<?php
include('../condb.php'); 

$title_mate1 = $_POST["title_mate1"];
$firstname_mate1 = $_POST["firstname_mate1"];
$lastname_mate1 = $_POST["lastname_mate1"];
$birthday_mate1 = $_POST["birthday_mate1"];
$wedding_date1 = $_POST["wedding_date1"];
$organize1 = $_POST["organize1"];
$witness1 = $_POST["witness1"];
$title_mate2 = $_POST["title_mate2"];
$firstname_mate2 = $_POST["firstname_mate2"];
$lastname_mate2 = $_POST["lastname_mate2"];
$birthday_mate2 = $_POST["birthday_mate2"];
$wedding_date2 = $_POST["wedding_date2"];
$organize2 = $_POST["organize2"];
$witness2 = $_POST["witness2"];
$title_mate3 = $_POST["title_mate3"];
$firstname_mate3 = $_POST["firstname_mate3"];
$lastname_mate3 = $_POST["lastname_mate3"];
$birthday_mate3 = $_POST["birthday_mate3"];
$wedding_date3 = $_POST["wedding_date3"];
$organize3 = $_POST["organize3"];
$witness3 = $_POST["witness3"];
$title_mate4 = $_POST["title_mate4"];
$firstname_mate4 = $_POST["firstname_mate4"];
$lastname_mate4 = $_POST["lastname_mate4"];
$birthday_mate4 = $_POST["birthday_mate4"];
$wedding_date4 = $_POST["wedding_date4"];
$organize4 = $_POST["organize4"];
$witness4 = $_POST["witness4"];
$remark_marriage = $_POST["remark_marriage"];
$ref_suppurude_id = $_POST["ref_suppurude_id"];
$marriage_id = $_POST["marriage_id"];

	$sql = "UPDATE  tbl_marriage SET 
	title_mate1='$title_mate1',
	firstname_mate1='$firstname_mate1',
	lastname_mate1='$lastname_mate1',
	birthday_mate1='$birthday_mate1',
	wedding_date1='$wedding_date1',
	organize1='$organize1',
	witness1='$witness1',
	title_mate2='$title_mate2',
	firstname_mate2='$firstname_mate2',
	lastname_mate2='$lastname_mate2',
	birthday_mate2='$birthday_mate2',
	wedding_date2='$wedding_date2',
	organize2='$organize2',
	witness2='$witness2',
	title_mate3='$title_mate3',
	firstname_mate3='$firstname_mate3',
	lastname_mate3='$lastname_mate3',
	birthday_mate3='$birthday_mate3',
	wedding_date3='$wedding_date3',
	organize3='$organize3',
	witness3='$witness3',
	title_mate4='$title_mate4',
	firstname_mate4='$firstname_mate4',
	lastname_mate4='$lastname_mate4',
	birthday_mate4='$birthday_mate4',
	wedding_date4='$wedding_date4',
	organize4='$organize4',
	witness4='$witness4',
	remark_marriage='$remark_marriage',
	ref_suppurude_id='$ref_suppurude_id'
	WHERE marriage_id=$marriage_id
	";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'table_marriage.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_marriage.php'; ";
	echo "</script>";
}
?>