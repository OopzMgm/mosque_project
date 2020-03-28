<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
    require_once __DIR__ . '../../vendor/autoload.php';
	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "darussalam_mosque_db";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	mysqli_set_charset($conn, "utf8");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM tbl_marriage as mr
	INNER JOIN tbl_suppurude as s ON s.suppurude_id = mr.ref_suppurude_id";
	
	$result = mysqli_query($conn, $sql);
	$content = "";
	if (mysqli_num_rows($result) > 0) {
		$i = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$content .= '<tr>
				<td style="text-align:center;">'.$i.'</td>
				<td style="text-align:center;">'.'MR'.$row['marriage_id'].'</td>
				<td style="text-align:left;">'.$row['title_sup'].''.$row['f_name_sup'].' '.$row['l_name_sup'].'</td>
				<td style="text-align:left;">'.$row['title_mate1'].''.$row['firstname_mate1'].' '.$row['lastname_mate1'].'</td>
				<td style="text-align:center;">'.date('d-m-Y',strtotime($row["wedding_date1"])).'</td>
				<td style="text-align:center;">'.$row['organize1'].'</td>
				<td style="text-align:center;">'.$row['witness1'].'</td>
			</tr>';
			$i++;
		}
	}
	
	mysqli_close($conn);
	
$mpdf = new \Mpdf\Mpdf();

$head = '
<style>
	body{
        text-align: center;
		font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
	}
	table {
		font-family:  "Garuda";
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
        <img src="../assets/img/logo/musque1.jpg"  width="100"></span>
               
<h2>รายชื่อคู่สมรสสัปปุรุษ</h2>

<table>
<thead>
    <tr>
        <th  width="10%" >ลำดับ</th>
        <th  width="10%" >รหัส</th>
        <th  width="25%" >ชื่อ-นามสกุลสัปปุรุษ</th>
        <th  width="25%" >ชื่อ-นามสกุลคู่สมรส</th>
        <th  width="10%">วันแต่งงาน</th>
        <th  width="15%">ผู้ทำพิธี</th>
        <th  width="15%">พยาน</th>
    </tr>

</thead>
	<tbody>';
	
$end = "</tbody>
</table>";

$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();
?>
