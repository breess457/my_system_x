<?php 
echo '<h4> + วันที่ PHP </h4>';
$strStartDate ="2022-09-09";

echo 'วันที่ '.$strStartDate;
echo '<br>';
echo ' + 10 วัน = '.$strNewDate;
echo "<br>";
echo $strNewDate;
//-------------//
echo '<hr>';
echo '<b> Workshop คำนวณวันหมดอายุสินค้า </b><br>';
$prdImptDate =date('Y-m-d'); //วันที่รับสินค้าเข้าคลัง
//คำนวณวันหมดอายุ
$calExpireDate = date ("Y-m-d", strtotime("+30 day", strtotime($prdImptDate)));
//echo ออกมาดู
echo 'สินค้ารับเข้าวันที่ '.$prdImptDate;
echo '<br>';
echo 'สินค้าจะหมดอายุอีก 30 วัน <br>';
echo 'สินค้าหมดอายุวันที่ '.$calExpireDate;
//devbanban.com
echo "<br/>";
echo round(abs(strtotime("2022-09-07") - strtotime($strNewDate))/60/60/24);
echo "xxxx";
echo "<br/>";
$x = date('Y-m-d');
$dateend=date('Y-m-d');
$strNewDates = date ("Y-m-d", strtotime("+10 day", strtotime($x)));
 
echo "test <br/>";
$calculate =strtotime("$strNewDates")-strtotime("$dateend");
$summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
echo "$summary วัน";

?>

