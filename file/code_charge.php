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

	$sql = "SELECT * FROM tbl_charge as ch
	INNER JOIN tbl_house as h ON ch.ref_family_id = h.family_id
	INNER JOIN tbl_board as b ON h.ref_board_id = b.board_id
	INNER JOIN tbl_death as d ON ch.ref_death_id = d.death_id
	INNER JOIN tbl_suppurude as s ON d.ref_suppurude_id = s.suppurude_id";
	
	$result = mysqli_query($conn, $sql);
	$content = "";
	if (mysqli_num_rows($result) > 0) {
		$i = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$content .= '<tr>
				<td style="text-align:center;">'.$i.'</td>
				<td style="text-align:center;">'.'CH'.$row['charge_id'].'</td>
				<td style="text-align:center;">'.$row['house_no'].'</td>
				<td style="text-align:center;">'.date('d-m-Y', strtotime($row["charge_date"])).'</td>
				<td style="text-align:center;">'.$row['amount_charge'].'</td>
				<td style="text-align:left;">'.$row['f_name_sup'].' '.$row['l_name_sup'].'</td>
				<td style="text-align:center;">'.$row['l_name_board'].'</td>
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
               
<h2>รายรับการชำระเงินสมาชิก</h2>

<table>
<thead>
    <tr>
        <th  width="5%" >#</th>
		<th  width="15%" >รหัส</th>
		<th  width="15%" >บ้านเลขที่</th>
		<th  width="15%" >วันที่จ่ายเงิน</th>
		<th  width="15%" >จำนวนเงิน</th>
		<th  width="20%" >ผู้เสียชีวิต</th>
		<th  width="15%" >ผู้เก็บเงิน</th>
	
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
