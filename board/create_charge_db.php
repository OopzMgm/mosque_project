<meta charset="utf-8">
<?php
include('../condb.php'); 

	$charge_date = $_POST["charge_date"];
	$amount_charge = $_POST["amount_charge"];
	$remark_charge = $_POST["remark_charge"];
	$ref_death_id = $_POST["ref_death_id"];
	$ref_family_id = $_POST["ref_family_id"];
	$ref_board_id = $_POST["ref_board_id"];

	$sql = "INSERT INTO tbl_charge
	(
		charge_date,
		amount_charge,
		remark_charge,
		ref_death_id,
		ref_family_id,
		ref_board_id
	)
	VALUES
	(
	'$charge_date',
	'$amount_charge',
	'$remark_charge',
	'$ref_death_id',
	'$ref_family_id',
	'$ref_board_id'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	



    mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_charge.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_charge.php'; ";
	echo "</script>";
}
?>

<script type="text/javascript">
	//alert("<?php // echo $msg;?>");
	window.location ='print.php?receipt_charge_id=<?php echo $ref_receipt_id;?>';
</script>