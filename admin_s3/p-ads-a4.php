<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$type=$_POST['type_id'];
if($type==1){
$id=$_POST['id'];
$adsense=addslashes($_POST['adsense']);
$op=$_POST['op'];
$part1="../ads-img/$op";
@unlink ($part1);
$upd="UPDATE `ads_a4` SET `type` =  '$type', `type_ads` =  '', `adsense` =  '$adsense', `name` =  '', `tel` =  '', `email` =  '', `url` =  '', `keyword` =  '', `img` =  '', `start_date` =  '', `finish_date` =  '' WHERE `id` ='$id' LIMIT 1" or die("Error $upd");
mysqli_query($con_db, $upd);
}else if($type==2){
$id=$_POST['id'];
$op=$_POST['op'];
$type_ads=$_POST['type_ads'];
$keyword=$_POST['keyword'];
$url=$_POST['url'];
$start_date=$_POST['start_date'];
$finish_date=$_POST['finish_date'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$file1=$_FILES['file1']['name'];
$tmp1=$_FILES['file1']['tmp_name'];

if($file1!=""){ 
$date=date("dmYHis");
$img="$date$file1";
$part1="../ads-img/$op";
@unlink ($part1);
@copy($tmp1,"../ads-img/$img"); 
}else{ 
$img=$op; 
}
$upd="UPDATE `ads_a4` SET `type` =  '$type', `type_ads` =  '$type_ads', `adsense` =  '', `name` =  '$name', `tel` =  '$tel', `email` =  '$email', `url` =  '$url', `keyword` =  '$keyword', `img` =  '$img', `start_date` =  '$start_date', `finish_date` =  '$finish_date' WHERE `id` ='$id' LIMIT 1" or die("Error $upd");
mysqli_query($con_db, $upd);
}
print "<meta http-equiv=refresh content=0;URL=ads-a4.php>";
?>
