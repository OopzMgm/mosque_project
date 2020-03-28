<?php
require_once __DIR__ . '../../vendor/autoload.php';
ob_start();
session_start(); //เรื่มต้น session
 
$db_name = "mosque_project"; //ชื่อฐานข้อมูล
$db_host = "localhost";
$db_user = "root"; //ชื่อuser
$db_pass = ""; //ชื่อรหัสผ่าน
 
try {
   $db_con = new PDO( "mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass );
   $db_con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   $db_con->exec( "set names utf8" );
} catch ( PDOException $e ) {
   echo $e->getMessage();
}
 
// โหลด Liblary mPDF
$mpdf = new \Mpdf\Mpdf( [
   'format'            => 'A4',
   'mode'              => 'utf-8',
   'default_font'      => 'thiasarabun',
   'default_font_size' => '15',
  
] );
 

 
// โหลดไฟล์ pdf ที่เป็นแม่แบบเข้ามา
$mpdf->SetDocTemplate( 'marraige.pdf', true );
 
//  ดึงค่าจากฐานข้อมูล
$stmt = $db_con->prepare( "SELECT * FROM tbl_marriage WHERE id = :id " );
$stmt->bindParam( ':id', $_GET["id"] );
$stmt->execute();
$row = $stmt->fetch( PDO::FETCH_ASSOC );
 
$mpdf->AddPage();
$html = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
$stylesheet = file_get_contents( 'pdf.css' ); // external css $mpdf->WriteHTML( $stylesheet, 1 ); 
$mpdf->WriteHTML( $html, 2 ); 
$mpdf->SetTitle( 'EXP#' . time() ); 
$mpdf->Output( 'EXP#' . time() . '.pdf', 'I' );