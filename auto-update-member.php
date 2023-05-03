
<?php
include "inc/config.inc.php";
$date=date("Y-m-d");

$s="SELECT id FROM `member` WHERE exp_date='$date'";
$re=mysqli_query($con_db, $s) or die("ERROR $s บรรทัด 6");
$num=mysqli_num_rows($re);
if($num>=1){
while($r=mysqli_fetch_row($re)){
$upd="update member set type=3 where id='$r[0]'" or die ("ERROR upd");
mysqli_query($con_db, $upd);
}
}
//mysqli_close();
?>