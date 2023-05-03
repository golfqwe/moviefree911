<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/* API Connection  TMTopup for Dadteam.Com*/
/*
* Modify by Nst Interactive [//www.nstinteractive.com/]
*/


# ------------------------------------- Config Begin ------------------------------------- #
// ------------------------------------------------------------------------------------------------
/* mysqli Config | Begin */
// Hostname ของ mysqli Server
$_CONFIG['mysqli']['dbhost'] = 'localhost';

// Username ที่ใช้เชื่อมต่อ mysqli Server
$_CONFIG['mysqli']['dbuser'] = 'ชื่อผู้ใช้เข้าฐานข้อมูล';

// Password ที่ใช้เชื่อมต่อ mysqli Server
$_CONFIG['mysqli']['dbpw'] = 'รหัสผ่านเข้าฐานข้อมูล';

// ชื่อฐานข้อมูลที่เราจะเติม Point ให้
$_CONFIG['mysqli']['dbname'] = 'ชื่อฐานข้อมูล';

// ชื่อตารางที่เราจะเติม Point ให้ ตัวอย่าง : member
$_CONFIG['mysqli']['tbname'] = 'member';

// ชื่อ field ที่ใช้อ้าง Username
$_CONFIG['mysqli']['field_username'] = 'email';

// ชื่อ field ที่ใช้ในการเก็บ Point จากการเติมเงิน
//$_CONFIG['TMN']['point_field_name'] = 'point';
/* mysqli Config | End */
// ------------------------------------------------------------------------------------------------


// กำหนด API Passkey
define('API_PASSKEY', 'ระบุ API Passkey ตัวเดียวกับที่ใส่ในเว็บ TMTopup');

# -------------------------------------- Config End -------------------------------------- #


require_once('AES.php');


// ------------------------------------------------------------------------------------------------
/* เชื่อมต่อฐานข้อมูล | Begin */
include "function/datethai.php";
mysqli_connect($_CONFIG['mysqli']['dbhost'],$_CONFIG['mysqli']['dbuser'],$_CONFIG['mysqli']['dbpw']) or die('ERROR|DB_CONN_ERROR|' . mysqli_error());
mysqli_select_db($_CONFIG['mysqli']['dbname']) or die('ERROR|DB_SEL_ERROR|' . mysqli_error());
/* เชื่อมต่อฐานข้อมูล | End */
// ------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------
//select setting_point ตารางการตั้งค่าการเติมเงิน 

/* จำนวน Point ที่จะได้รับเมื่อเติมเงินในราคาต่างๆ | Begin */
$spoint="SELECT * FROM `setting_point` ORDER BY id ASC";
$repoint=mysqli_query($con_db, $spoint) or die("ERROR $spoint");
while($rpoint=mysqli_fetch_row($repoint)){
$price=$rpoint[1];
$number=$rpoint[2];
$unit=$rpoint[3];
$_CONFIG['TMN'][$price]['point'] = $number;
}
/* จำนวน Point ที่จะได้รับเมื่อเติมเงินในราคาต่างๆ | End */
// ------------------------------------------------------------------------------------------------


if($_SERVER['REMOTE_ADDR'] == '203.146.127.115' && isset($_GET['request']))
{
	$aes = new Crypt_AES();
	$aes->setKey(API_PASSKEY);
	$_GET['request'] = base64_decode(strtr($_GET['request'], '-_,', '+/='));
	$_GET['request'] = $aes->decrypt($_GET['request']);
	if($_GET['request'] != false)
	{
		parse_str($_GET['request'],$request);
		$request['Ref1'] = base64_decode($request['Ref1']);

		/* Database connection | Begin */
		$result = mysqli_query('SELECT `id` FROM `'. $_CONFIG['mysqli']['tbname'] .'` WHERE `'. $_CONFIG['mysqli']['field_username'] .'`=\'' . mysqli_real_escape_string($request['Ref1']) . '\' LIMIT 1') or die(mysqli_error());
		if(mysqli_num_rows($result) == 1)
		{
			//selcet id setting_point
			$point_type=$_CONFIG['TMN'][$request['cardcard_amount']]['point'];
			$stp="SELECT * FROM `setting_point` WHERE number='$point_type'";
			$retp=mysqli_query($stp) or die("ERROR $stp");
			$rtp=mysqli_fetch_row($retp);
			//บันทึกข้อมูลรายการเติมเงิน
			$row=mysqli_fetch_row($result);
			$date=date("Y-m-d");
			$time=date("H:i");
			$datetime=date("Y-m-d H:i:s");
			$insert=mysqli_query("INSERT INTO `payment` (`type` ,`point_type` ,`member_id` ,`bank_id` ,`money` ,`date` ,`time` ,`detail` ,`status` ,`status_date`)VALUES ('2', '$rtp[0]', '$row[0]', '', '', '$date', '$time', '', '1', '$datetime')") or die("ERROR INSERT");
			//เติมวันให้สมาชิกวีไอพี
			if($rtp[3]==1){
			$unit="day";
			}else if($rtp[3]==2){
			$unit="month";
			}else if($rtp[3]==3){
			$unit="year";
			}
			$exp_date=date("Y-m-d",strtotime("+ $rtp[2] $unit"));
			if(mysqli_query("UPDATE `member` SET `type`='4' ,`exp_date`='$exp_date' WHERE `id`=$row[0]") == false)
			{
				echo 'ERROR|mysqli_UDT_ERROR|' . mysqli_error();
			}
			else
			{
				echo 'SUCCEED|UID=' . $row[1];
			}
		}
		else
		{
			echo 'ERROR|INCORRECT_USERNAME';
		}
		/* Database connection | End */

	}
	else
	{
		echo 'ERROR|INVALID_PASSKEY';
	}
}
else
{
	echo 'ERROR|ACCESS_DENIED';
}
?>