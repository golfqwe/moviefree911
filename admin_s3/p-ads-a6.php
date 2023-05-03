<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$id=$_POST['id'];
$op=$_POST['op'];
$show=$_POST['show'];
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
$upd="UPDATE `ads_a6` SET `name` =  '$name', `tel` =  '$tel', `email` =  '$email', `url` =  '$url', `keyword` =  '$keyword', `img` =  '$img', `start_date` =  '$start_date', `finish_date` =  '$finish_date', `show` =  '$show' WHERE `id` ='$id' LIMIT 1" or die("Error $upd");
mysqli_query($con_db, $upd);
print "<meta http-equiv=refresh content=0;URL=ads-a6.php>";
?>
