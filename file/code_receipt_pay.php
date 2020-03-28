<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
require_once __DIR__ . '../../vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "darussalam_mosque_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_pay as p
	INNER JOIN tbl_death as d ON p.ref_death_id = d.death_id
    INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id
	INNER JOIN tbl_house as h ON p.ref_family_id = h.family_id
	INNER JOIN tbl_board as b ON p.ref_board_id = b.board_id
	WHERE pay_id=$ID";

$result = mysqli_query($conn, $sql);

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'jasmineupc'
]);

while($row = mysqli_fetch_array($result)) {
	$html .= '<div style="color:blue;position:absolute;top:55px;left:350px;"> <img src="../assets/img/logo/musque1.jpg"  width="100"></div>';
	$html .= '<div style="color:blue;position:absolute;top:179px;left:640px;">'.date('d/m/Y', strtotime($row["datesave_pay"])).'</div>';
	$html .= '<div style="color:blue;position:absolute;top:215px;left:280px;">'.'P'.$row['pay_id'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:250px;left:280px;">'.$row['name_get_money'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:285px;left:400px;">'.$row['house_code'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:320px;left:340px;">'.'`'.$row['house_no'].'`'.'</div>';
	$html .= '<div style="color:blue;position:absolute;top:320px;left:500px;">'.'`'.$row['villageno'].'`'.'</div>';
	// $html .= '<div style="color:blue;position:absolute;top:400px;left:350px;">'.$row['village'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:356px;left:320px;">'.$row['district'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:356px;left:510px;">'.$row['sub_district'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:390px;left:330px;">'.$row['province'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:356px;left:510px;">'.$row['sub_district'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:390px;left:560px;">'.$row['postal_code'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:425px;left:280px;">'.$row['amount_pay'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:460;left:280px;">'.date('d/m/Y', strtotime($row["pay_date"])).'</div>';
	// $html .= '<div style="color:blue;position:absolute;top:505px;left:140px;">'.$row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:505px;left:575px;">'.$row['title'].''.$row['f_name_board'].' '.$row['l_name_board'].'</div>';
	// $html .= '<div style="color:blue;position:absolute;top:505px;left:135px;">'.$row['name_death'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:505px;left:135px;">'.$row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'].'</div>';


}





// $mpdf->SetImportUse();
$mpdf->SetDocTemplate('file_receipt_pay.pdf',true);

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
