<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
require_once __DIR__ . '../../vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mosque_project";
$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$ID = $_GET['ID'];
$sql = "SELECT * ,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_mate1 ) ) ) as age_mate1
,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_mate2 ) ) ) as age_mate2
,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_mate3 ) ) ) as age_mate3
,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_mate4 ) ) ) as age_mate4
,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) as age_sup FROM tbl_marriage as m
INNER JOIN tbl_suppurude as s ON m.ref_suppurude_id = s.suppurude_id
WHERE marriage_id=$ID";

$result = mysqli_query($conn, $sql);

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'jasmineupc'
]);

while($row = mysqli_fetch_array($result)) {
	$html .= '<div style="color:blue;position:absolute;top:265px;left:300px;">'.$row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'].' (อายุ '.$row['age_sup'].' ปี)'.'</div>';
	$html .= '<div style="color:blue;position:absolute;top:350px;left:230px;">'.$row['title_mate1'].''.$row['firstname_mate1'].' '.$row['lastname_mate1'].' (อายุ '.$row['age_mate1'].' ปี)'.' แต่งงานเมื่อวันที่ '.date('d/m/Y', strtotime($row["wedding_date1"])).'</div>';
	$html .= '<div style="color:blue;position:absolute;top:380px;left:230px;">'.$row['title_mate2'].''.$row['firstname_mate2'].' '.$row['lastname_mate2'].' (อายุ '.$row['age_mate2'].' ปี)'.' แต่งงานเมื่อวันที่ '.date('d/m/Y', strtotime($row["wedding_date2"])).'</div>';
	$html .= '<div style="color:blue;position:absolute;top:410px;left:230px;">'.$row['title_mate3'].''.$row['firstname_mate3'].' '.$row['lastname_mate3'].' (อายุ '.$row['age_mate3'].' ปี)'.' แต่งงานเมื่อวันที่ '.date('d/m/Y', strtotime($row["wedding_date3"])).'</div>';
	$html .= '<div style="color:blue;position:absolute;top:440px;left:230px;">'.$row['title_mate4'].''.$row['firstname_mate4'].' '.$row['lastname_mate4'].' (อายุ '.$row['age_mate4'].' ปี)'.' แต่งงานเมื่อวันที่ '.date('d/m/Y', strtotime($row["wedding_date4"])).'</div>';
	
	// $html .= '<div style="color:blue;position:absolute;top:490px;left:420px;">'.date('d/m/Y', strtotime($row["wedding_date1"])).'</div>';
	$html .= '<div style="color:blue;position:absolute;top:525px;left:420px;">'.$row['organize1'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:562px;left:420px;">'.$row['witness1'].'</div>';
	$html .= '<div style="color:blue;position:absolute;top:665px;left:410px;">'.date('d/m/Y', strtotime($row["datesave_marriage"])).'</div>';
	$html .= '<div style="color:red;font-size:16px;position:absolute;top:890px;left:365px;">ประทับตรามัสยิด</div>';
}





// $mpdf->SetImportUse();
$mpdf->SetDocTemplate('file_marriage.pdf',true);

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
