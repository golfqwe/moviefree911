<?php session_start();
include("inc/facebook.php"); //  เรียกใช้งานไฟล์ php-sdk สำหรับ facebook
include "../inc/config.inc.php";

$facebook = new Facebook(array(
  'appId'  => '1589470227946595', // appid ที่ได้จาก facebook
  'secret' => 'c594f73e5dacef558a9d3f99e684db3e',  // app secret ที่ได้จาก facebook
  'fileUpload' => true, // เปิดใช้ในส่วนของการอัพโหลดรูปได้
  'cookie' => true, // อนุญาตใช้งาน cookie  
));

// Get User ID
$fb_user = $facebook->getUser();
if($fb_user){
  try{
    // Proceed knowing you have a logged in user who's authenticated.
    $fb_userdata = $facebook->api('/me');
}catch(FacebookApiException $e) {
    error_log($e);
    $user=null;
  }
	
	// query for user
	$s="SELECT id, type, name, email FROM `member` WHERE fbid='".$fb_userdata['id']."'";
	$re=mysqli_query($con_db, $s) or die("ERROR $s 24");
	$num=mysqli_num_rows($re);
	if($num > 0)
	{
		// user found begin login
		$r = mysqli_fetch_row($re);		
		$_SESSION['member_login']="member_login";
		$_SESSION[m_id]="$r[0]";
		if($r[1]==3){
		$_SESSION[m_other]="other";
		}else if($r[1]==4){
		$_SESSION[m_vip]="vip";
		}
		$_SESSION[m_name]="$r[2]";
		$_SESSION[m_email]="$r[3]";
		echo "<meta http-equiv=refresh content=0;URL=../member/index.php>"; 
		
	}else {
		// user not found begin insert
		$email = isset($fb_userdata['email']) ? $fb_userdata['email'] : NULL;
		$insert_sql = "INSERT INTO `member` SET fbid='" . $fb_userdata['id'] . "', type='" . 3 . "', name='" . นามแฝง . "', email='" . $email . "', reg_date='" . date("Y-m-d") . "', actived='1' ";
		mysqli_query($con_db, $insert_sql);
		
		// insert complete begin login
		$s="SELECT id, type, name, email FROM `member` WHERE fbid='".$fb_userdata['id']."'";
		$re=mysqli_query($con_db, $s) or die("ERROR $s 48");
		$num=mysqli_num_rows($re);
		if($num > 0)
		{
			// user found begin login
			$r = mysqli_fetch_row($re);		
			$_SESSION['member_login']="member_login";
			$_SESSION[m_id]="$r[0]";
			if($r[1]==3){
			$_SESSION[m_other]="other";
			}else if($r[1]==4){
			$_SESSION[m_vip]="vip";
			}
			$_SESSION[m_name]="$r[2]";
			$_SESSION[m_email]="$r[3]";
			echo "<meta http-equiv=refresh content=0;URL=../member/index.php>"; 
			
		}
	
	}
	
	//echo '<pre>';
	//print_r($fb_userdata);
	//echo '</pre>';
	
  
  
   $logoutUrl = $facebook->getLogoutUrl(array(
  	"next"=>"http://www.domain.com/fblogin/index.php?logout"
  ));
  
}
else {
	// preparing to login
	$loginUrl = $facebook->getLoginUrl(array(
		"redirect_uri"=>"http://www.domain.com/fblogin/",
		"display"=>"page",
		"scope"=>"offline_access,publish_stream,email" // คั่นแต่ละค่าด้วย ,(comma)
	));
	echo '<script type="text/javascript"> window.location= \''.$loginUrl.'\';</script>Loging to Facebook...';
	/*echo '<a href="'.$loginUrl.'">'.$loginUrl.'</a>';*/
}

if(isset($_GET['logout'])){ // ทำการ logout อย่างสมบูรณ์
	$facebook->destroySession(null); 	// ล่างค่า session ของ facebook
	header("Location:".$_SERVER['PHP_SELF']); //ลิ้งค์ไปหน้าที่ต้องการเมื่อ logout เรียบร้อยแล้ว
}
?>