<?php

include('../condb.php'); 

	$ID  = $_GET["ID"];

	$sql = "DELETE FROM tbl_member WHERE member_id=$ID";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('ลบข้อมูลสำเร็จ');";
	echo "window.location = 'table_member.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_member.php'; ";
	echo "</script>";
}
?>