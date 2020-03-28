<?php
include('../condb.php'); 
	$birthday = "1995-07-15";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
	$today = date("Y-m-d");   //จุดต้องเปลี่ยน
		

	list($byear, $bmonth, $bday)= explode("-",$birthday);       //จุดต้องเปลี่ยน
	list($tyear, $tmonth, $tday)= explode("-",$today);                //จุดต้องเปลี่ยน
		
	$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
	$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
	$mage = ($mnow - $mbirthday);
	
	
 
	echo "วันเกิด $birthday"."<br>\n";
 
	echo "วันที่ปัจจุบัน $today"."<br>\n";
	
	echo "รับค่า $mage"."<br>\n";

$u_y=date("Y", $mage)-1970;
$u_m=date("m",$mage)-1;
$u_d=date("d",$mage)-1;

echo"<br><br>$u_y   ปี    $u_m เดือน      $u_d  วัน<br><br>";
echo"===============<br>";
//date in mm/dd/yyyy format; or it can be in other formats as well
$birthDate = "07/15/1995";
echo "BIRTH DAYE : $birthDate <br>";
//explode the date to get month, day and year
$birthDate = explode("/", $birthDate);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
  ? ((date("Y") - $birthDate[2]) - 1)
  : (date("Y") - $birthDate[2]));
echo "Age is:" . $age;

//date in mm/dd/yyyy format; or it can be in other formats as well
$birthday = $_POST['birthday'];
//explode the date to get month, day and year
$birthday = explode("/", $birthday);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], 
$birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));

//date in mm/dd/yyyy format; or it can be in other formats as well
$birthDate = $_POST['month']."/".$_POST['date']."/".$_POST['year'];
//explode the date to get month, day and year
$birthDate = explode("/", $birthDate);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], 
$birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
?>

