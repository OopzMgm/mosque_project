<meta charset="utf-8">
<?php
include('../condb.php'); 

$house_no = $_POST["house_no"];
$house_code = $_POST["house_code"];
$villageno = $_POST["villageno"];
$lane = $_POST["lane"];
$street = $_POST["street"];
$village = $_POST["village"];
$district = $_POST["district"];
$sub_district = $_POST["sub_district"];
$province = $_POST["province"];
$postal_code = $_POST["postal_code"];
$remark = $_POST["remark"];
$ref_board_id = $_POST["ref_board_id"];

	$check = "
	SELECT  house_no 
	FROM tbl_house 
	WHERE house_no = '$house_no' 
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

	$sql = "INSERT INTO tbl_house
	(
	house_no,
	house_code,
	villageno,
	lane,
	street,
	village,
	district,
	sub_district,
	province,
	postal_code,
	remark,
	ref_board_id
	)
	VALUES
	(
	'$house_no',
	'$house_code',
	'$villageno',
	'$lane',
	'$street',
	'$village',
	'$district',
	'$sub_district',
	'$province',
	'$postal_code',
	'$remark',
	'$ref_board_id'
	)";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
}
	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_house.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_house.php'; ";
	echo "</script>";
}
?>