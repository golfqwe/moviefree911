<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}

$Submit=$_POST['Submit'];
$tv_cate=htmlspecialchars($_POST['tv_cate']);
$tv_name=htmlspecialchars($_POST['tv_name']);
$tv_img=htmlspecialchars($_POST['tv_img']);
$tv_url=htmlspecialchars($_POST['tv_url']);
$title=htmlspecialchars($_POST['title']);
$description=htmlspecialchars($_POST['description']);
$keyword=htmlspecialchars($_POST['keyword']);
$view=htmlspecialchars($_POST['view']);
if($tv_cate!=""&&$tv_name!=""&&$tv_img!=""$tv_url!=""&&$title!=""&&$description!=""&&$keyword!=""){
$sql="UPDATE `tv_post` SET  `tv_cate` =  '$tv_cate',`tv_name` =  '$tv_name',`tv_img` =  '$tv_img',`tv_url` =  '$tv_url',`title` =  '$title',`description` =  '$description',`keyword` =  '$keyword',`true_url` =  '$trueurl',`view` =  '$view' WHERE `id` =1 LIMIT 1"or die("ERROR $sql");
mysqli_query($con_db, $sql);

function send_line_notify($message, $token){
			  $ch = curl_init();
			  curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
			  curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
			  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
			  curl_setopt( $ch, CURLOPT_POST, 1);
			  curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
			  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			  $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
			  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			  $result = curl_exec( $ch );
			  curl_close( $ch );
			  return $result;
			}															//domain
			$message = ''.$_SERVER['SERVER_NAME']."\n".'มีการ update confirm'."\n".' ชื่อเว็บ:'.$name."\n".' movie56k.com :'.$url."\n".' Tel:'.$tel.' Line:'.$fax."\n".' Email:'.$email."\n".'';	
			//$token = $line_token;
			$token = 'ClT2qK4wKfsbtdNgN16XSo6FM9KExyFjBkYrAUM8XrN';
			echo send_line_notify($message, $token);



echo "<meta http-equiv='refresh' content='0;url=tv_post.php'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?
}
?>
