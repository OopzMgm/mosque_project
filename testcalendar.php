<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
#calendar_css {
    background-color:#F0F0F0;
    border-style:solid;
    border-width:0px;
    border-right-width:0px;
    border-bottom-width:0px;
    border-color:#cccccc;
}
#calendar_css td{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
}
#calendar_css thead{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
    background-color:#333333;
    color:#FFFFFF;
}
#calendar_css .current{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
    background-color:#FF0000;
    color:#FFFFFF;
}
col.holidayCol{
    background-color:#FDDFE4;
    color:#FF0000;
}
td.monthTitle{
    background-color:#666666;
    text-align:center;
    font:11px bold tahoma;  
}
 </style>
<body>
<?php   
$day_now=array("Sun"=>"1","Mon"=>"2","Tue"=>"3","Wed"=>"4","Thu"=>"5","Fri"=>"6","Sat"=>"7");   
$first_day=date("D",mktime(0,0,1,intval(date("m")),1,date("Y")));   
$start_td=$day_now[$first_day]-1;      
$num_day=date("t");   
$num_day2=($num_day+$start_td);   
$num_day3=(7*ceil($num_day2/7));   
?>   
<table id="calendar_css" width="175" border="0" cellspacing="0" cellpadding="0">   
<colgroup>   
<col class="holidayCol" />   
<col span="5" />   
<col class="holidayCol" />   
</colgroup>   
<thead>   
<tr>
<td colspan="7" class="monthTitle">
<?=date("M-Y")?>
</td>
</tr>
  <tr>   
    <td>อา </td>   
    <td>จ </td>   
    <td>อ </td>   
    <td>พ </td>   
    <td>พฤ </td>   
    <td>ศ </td>   
    <td>ส </td>   
  </tr>   
</thead>   
<?php for($i=1;$i <=$num_day3;$i++){ ?>   
<?php if($i%7==1){ ?>   
  <tr>   
  <?php } ?>   
    <td   <?=(date("j")==$i-$start_td)?"class=\"current\"":""?>> <?=($i-$start_td>=1 && $i-$start_td <=$num_day)?$i-$start_td:" "?> </td>   
<?php if($i%7==0){ ?>   
  </tr>   
  <?php } ?>   
<?php } ?>   
</table> 
</body>
</html>