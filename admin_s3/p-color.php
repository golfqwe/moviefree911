<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$color=$_POST['color'];
$color_1=$_POST['color_1'];
$color_2=$_POST['color_2'];
$color_3=$_POST['color_3'];

		$sql="UPDATE  `color` SET `color`='$color',`color_1`='$color_1',`color_2`='$color_2',`color_3`='$color_3' WHERE  `id` ='".$_GET['id']."'" or die("อัพเดทข้อมูลสำเร็จ");
		mysqli_query($con_db, $sql);
		echo "<meta http-equiv=refresh content=0;URL=color.php>";
	
