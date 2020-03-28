<meta charset="utf-8">
<?php
include('../condb.php'); 

	$position_name = $_POST["position_name"];
	$position_id = $_POST['position_id'];

	$sql = "UPDATE  tbl_position SET 
	position_name='$position_name'
	WHERE position_id=$position_id
	";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'table_position.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_position.php'; ";
	echo "</script>";
}
?>