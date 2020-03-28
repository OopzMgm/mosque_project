<meta charset="utf-8">
<?php
include('../condb.php'); 

	$pay_date = $_POST["pay_date"];
	$amount_pay = $_POST["amount_pay"];
	$remark_pay = $_POST["remark_pay"];
	$name_get_money = $_POST["name_get_money"];
	$ref_death_id = $_POST["ref_death_id"]; 
	$ref_family_id = $_POST["ref_family_id"];
	$ref_board_id = $_POST["ref_board_id"];

	$check = "
	SELECT  ref_death_id
	FROM tbl_pay
	WHERE ref_death_id = '$ref_death_id' 
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

	$sql = "INSERT INTO tbl_pay
	(
		pay_date,
		amount_pay,
		remark_pay,
		name_get_money,
		ref_death_id,
		ref_family_id,
		ref_board_id
	)
	VALUES
	(
	'$pay_date',
	'$amount_pay',
	'$remark_pay',
	'$name_get_money',
	'$ref_death_id',
	'$ref_family_id',
	'$ref_board_id'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	}

    mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'table_pay.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'table_pay.php'; ";
	echo "</script>";
}
?>