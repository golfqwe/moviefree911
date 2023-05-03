<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$detail=addslashes($_POST['input']);
$upd="UPDATE `ads` SET `detail` =  '$detail' WHERE `id` =1 LIMIT 1" or die("Error $upd");
mysqli_query($con_db, $upd);
print "<meta http-equiv=refresh content=0;URL=ads.php>";
?>
