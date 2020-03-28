<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
    require_once __DIR__ . '../../vendor/autoload.php';
	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mosque_project";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	mysqli_set_charset($conn, "utf8");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT *,YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) as age FROM tbl_suppurude 
	WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 18 AND status_quo = 'ยังอยู่'";
	$result = mysqli_query($conn, $sql);

	$sql1 = "SELECT COUNT(YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) )) as age FROM tbl_suppurude 
	WHERE YEAR( FROM_DAYS( DATEDIFF( NOW( ) , birthday_sup ) ) ) >= 18 
	AND status_quo = 'ยังอยู่'";
	$result1 = mysqli_query($conn, $sql1); 
	$content = "";
	$html .= '<div style="color:black;font-size:24;position:absolute;top:289px;left:284px;">อายุ 18 ปี ขึ้นไป</div>';

	while($row = mysqli_fetch_array($result1)) {
		$html .= '<div style="color:blue;position:absolute;top:290px;left:405px;">'.'(ทั้งหมด '.$row['age'].' คน)'.'</div>';
	}
	if (mysqli_num_rows($result) > 0) {
		$i = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$content .= '<tr>
				<td style="text-align:center;">'.$i.'</td>
				<td style="text-align:center;">'.'S'.$row['suppurude_id'].'</td>
				<td style="text-align:left;">'.$row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'].'</td>
				<td style="text-align:center;">'.date('d-m-Y', strtotime($row['birthday_sup'])).'</td>
				<td style="text-align:center;">'.$row['age'].'</td>
				</tr>';
			$i++;
		}
	}
	mysqli_close($conn);

	
	
// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'jasmineupc'
]);

$head = '
<style>
	body{
        text-align: center;
	}
	table {
		border-collapse: collapse;
		width: 100%;
	  }
	  th {
		text-align: center;
	  }
	  
	  th, td {
		border: 1px solid #dddddd;
		padding: 8px;
	  }

	  tr:nth-child(even) {
		background-color: #dddddd;
	  }
</style>
<h4><strong>ระบบทะเบียนมัสยิดดารุสสลามบ้านลำลอง</strong> <br>
ตั้งอยู่ เลขที่ 257 หมู่ที่ 12 ตำบลนาทวี อำเภอนาทวี จังหวัดสงขลา<h4>
        <img src="../assets/img/logo/musque1.jpg" width="100"></span>
               
<h2>บัญชีผู้มีสิทธิ์คัดเลือก</h2>
<p></p>

<table>
<thead>
    <tr>
        <th  width="10%" >ลำดับ</th>
        <th  width="20%" >รหัส</th>
		<th  width="40%" >ชื่อ-นามสกุล</th>
		<th  width="20%" >วัน-เดือนปีเกิด</th>
		<th  width="10%" >อายุ</th>
		
    </tr>

</thead>
	<tbody>';
	
$end = "</tbody>
</table>";
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();
?>
