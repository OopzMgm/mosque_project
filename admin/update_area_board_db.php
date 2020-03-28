<meta charset="utf-8">
<?php
include('../condb.php'); 

	$area_name = $_POST["area_name"];
	$area_id = $_POST['area_id'];

	$sql = "UPDATE  tbl_area_board SET 
	area_name='$area_name'
	WHERE area_id=$area_id
	";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'table_area_board.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_area_board.php'; ";
	echo "</script>";
}
?>