<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if(!isset($_SESSION['member_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ; 
exit() ;
}
include "../inc/config.inc.php";
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$pass=htmlspecialchars($_POST['pass']);
$update_member="UPDATE `member` SET `name`='$name' ,`email`='$email' ,`pass`='$pass' WHERE id='$_SESSION[m_id]'" or die ("ERROR update_member");
mysqli_query($con_db, $update_member);
$_SESSION['m_name']="$name";
$_SESSION['m_email']="$email";
//mysqli_close();
echo "<meta http-equiv='refresh' content='0;url=index.php'>"; 
?>