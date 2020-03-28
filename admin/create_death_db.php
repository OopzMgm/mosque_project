<meta charset="utf-8">
<?php
include('../condb.php'); 

$d_certificate = $_POST["d_certificate"];
$officer = $_POST["officer"];
$date_death = $_POST["date_death"];
$death_age = $_POST["death_age"];
$cause_death = $_POST["cause_death"]; 
$death_place = $_POST["death_place"];
$prayer_place = $_POST["prayer_place"];
$burial_ground = $_POST["burial_ground"];
$remark_death = $_POST["remark_death"];
$ref_suppurude_id = $_POST["ref_suppurude_id"];

$check = "
SELECT  ref_suppurude_id
FROM tbl_death
WHERE ref_suppurude_id = '$ref_suppurude_id'
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
	$sql = "INSERT INTO tbl_death
	(
		d_certificate,
		officer,
		date_death,
		death_age,
		cause_death,
		death_place,
		prayer_place,
		burial_ground,
		remark_death,
		ref_suppurude_id
	)
	VALUES
	(
	'$d_certificate',
	'$officer',
	'$date_death',
	'$death_age',
	'$cause_death',
	'$death_place',
	'$prayer_place',
	'$burial_ground',
	'$remark_death',
	'$ref_suppurude_id'

	)";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
}
	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_death.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_death.php'; ";
	echo "</script>";
}
?>