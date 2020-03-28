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
	$family_id = $_POST['family_id'];

	$sql = "UPDATE  tbl_house SET 
	house_no='$house_no',
	house_code='$house_code',
	villageno='$villageno',
	lane='$lane',
	street='$street',
	village='$village',
	district='$district',
	sub_district='$sub_district',
	province='$province',
	postal_code='$postal_code',
	remark='$remark',
	ref_board_id='$ref_board_id'
	WHERE family_id=$family_id
	";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'table_house.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_house.php'; ";
	echo "</script>";
}
?>