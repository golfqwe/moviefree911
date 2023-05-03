<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}

$id=$_GET['id'];
$sql2="delete from tag_category where id='$id'"or die("ERROR $sql2");
mysqli_query($con_db, $sql2);
echo "<meta http-equiv='refresh' content='0;url=tag_category.php'>"; 
?>
