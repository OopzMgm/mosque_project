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

$query = "SELECT COUNT(family_id) FROM tbl_house";
$result = mysqli_query($conn, $query);  

$query1 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude 
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 15 
AND gender_sup = 'ชาย' 
AND status_quo = 'ยังอยู่'";
$result1 = mysqli_query($conn, $query1);  

$query2 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE gender_sup = 'ชาย' AND status_quo = 'ยังอยู่'";
$result2 = mysqli_query($conn, $query2);  

$query3 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE gender_sup = 'หญิง' AND status_quo = 'ยังอยู่'";
$result3 = mysqli_query($conn, $query3); 

$query4 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE status_quo = 'ยังอยู่'";
$result4 = mysqli_query($conn, $query4); 

$query5 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE gender_sup = 'ชาย' AND status_quo = 'เสียชีวิต'";
$result5 = mysqli_query($conn, $query5);  

$query6 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE gender_sup = 'หญิง' AND status_quo = 'เสียชีวิต'";
$result6 = mysqli_query($conn, $query6); 

$query7 = "SELECT COUNT(suppurude_id) FROM tbl_suppurude WHERE status_quo = 'เสียชีวิต'";
$result7 = mysqli_query($conn, $query7); 
// =======================================================================
$query8 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 1
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 3 AND gender_sup = 'ชาย'";
$result8 = mysqli_query($conn, $query8); 

$query9 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 4 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 6 AND gender_sup = 'ชาย'";
$result9 = mysqli_query($conn, $query9);

$query10 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 7 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 15 AND gender_sup = 'ชาย'";
$result10 = mysqli_query($conn, $query10);

$query11 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 1 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 15 AND gender_sup = 'ชาย'";
$result11 = mysqli_query($conn, $query11);
// =========================================================================
// =======================================================================
$query12 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 1 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 3 AND gender_sup = 'หญิง'";
$result12 = mysqli_query($conn, $query12); 

$query13 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 4 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 6 AND gender_sup = 'หญิง'";
$result13 = mysqli_query($conn, $query13);

$query14 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 7 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 15 AND gender_sup = 'หญิง'";
$result14 = mysqli_query($conn, $query14);

$query15 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 1 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 15 AND gender_sup = 'หญิง'";
$result15 = mysqli_query($conn, $query15);
// =========================================================================
$query16 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude
WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 1 
AND YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) <= 15";
$result16 = mysqli_query($conn, $query16);



$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'jasmineupc'
]);
$html .= '<div style="color:blue;position:absolute;top:50px;left:380px;"><img src="../assets/img/logo/musque1.jpg" width="50px"></div>';
while($row = mysqli_fetch_array($result)) {
	$html .= '<div style="color:blue;position:absolute;top:192px;left:570px;">'.'( '.$row['COUNT(family_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result1)) {
	$html .= '<div style="color:blue;position:absolute;top:225px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result2)) {
	$html .= '<div style="color:blue;position:absolute;top:287px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result3)) {
	$html .= '<div style="color:blue;position:absolute;top:320px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result4)) {
	$html .= '<div style="color:blue;position:absolute;top:353px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result5)) {
	$html .= '<div style="color:blue;position:absolute;top:417px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result6)) {
	$html .= '<div style="color:blue;position:absolute;top:450px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result7)) {
	$html .= '<div style="color:blue;position:absolute;top:483px;left:570px;">'.'( '.$row['COUNT(suppurude_id)'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result8)) {
	$html .= '<div style="color:blue;position:absolute;top:579px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result9)) {
	$html .= '<div style="color:blue;position:absolute;top:605px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result10)) {
	$html .= '<div style="color:blue;position:absolute;top:631px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result11)) {
	$html .= '<div style="color:blue;position:absolute;top:655px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result12)) {
	$html .= '<div style="color:blue;position:absolute;top:717px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result13)) {
	$html .= '<div style="color:blue;position:absolute;top:743px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result14)) {
	$html .= '<div style="color:blue;position:absolute;top:769px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result15)) {
	$html .= '<div style="color:blue;position:absolute;top:795px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}
while($row = mysqli_fetch_array($result16)) {
	$html .= '<div style="color:blue;position:absolute;top:824px;left:570px;">'.'( '.$row['age'].' )'.'</div>';
}






// $mpdf->SetImportUse();
$mpdf->SetDocTemplate('file_summary.pdf',true);

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
