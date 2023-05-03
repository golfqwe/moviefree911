<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$mod_id=$_GET['mod_id'];
$id=$_GET['id'];
$type=$_GET['type'];
$filedel=$_GET['filedel'];
if($type==1){
	//del img1
	$part="../post-img/$filedel";
	@unlink ($part);
	//update
	$sql="UPDATE `post` SET `img`='' WHERE `id`='$id'" or die(mysqli_error());
	mysqli_query($con_db, $sql);
	echo "<meta http-equiv=refresh content=0;URL=edit-mod-movie.php?id=$id>";
}else if($type==2){
	//del img1
	$part="../vdo/$filedel";
	@unlink ($part);
	//update
	$sql="UPDATE `post` SET `file_vdo`='' WHERE `id`='$id'" or die(mysqli_error());
	mysqli_query($con_db, $sql);
	echo "<meta http-equiv=refresh content=0;URL=edit-mod-movie.php?mod_id=$mod_id&id=$id>";
}
?>
</body>
</html>
