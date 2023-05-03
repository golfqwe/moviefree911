<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
	$update="UPDATE `movie_series` SET `google_drive`='".$_POST['google_drive']."' ,`series_ep`='".$_POST['embed']."' WHERE id_series='".$_GET['ep']."'" or die(mysqli_error());
	mysqli_query($con_db, $update);
print "<meta http-equiv=refresh content=0;URL=edit-series.php?id=".$_GET['series']."&edit_ep>";
?>
