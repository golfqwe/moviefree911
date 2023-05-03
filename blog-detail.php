<?php
session_start();	
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
$sbl="select * from banner_slide where id=1";
$rebl=mysqli_query($con_db, $sbl) or die("ERROR $sbl");
$rbl=mysqli_fetch_row($rebl);
$banner="select * from site_logo where id=1";
$bannerre=mysqli_query($con_db, $banner) or die("ERROR $banner");
$bannerr=mysqli_fetch_row($bannerre);
$bg="select * from bg where id=1";
$bgre=mysqli_query($con_db, $bg) or die("ERROR $bg");
$bgr=mysqli_fetch_row($bgre);
$fb="select * from fanpage where id=1";
$fbre=mysqli_query($con_db, $fb) or die("ERROR $fb");
$fbr=mysqli_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysqli_query($con_db, $st) or die("ERROR $st");
$str=mysqli_fetch_row($stre);

if(isset($_SESSION['member_login'])){
//$m_id=$_SESSION['m_id'];

$tag_member="select * from member where id='".$_SESSION['m_id']."' ORDER BY id DESC";
$re_member=mysqli_query($con_db, $tag_member) or die("ERROR tag_category $tag_cat");
$member_cats=mysqli_fetch_assoc($re_member);
  //$member_exp=$member_cats[0]

  if(!isset($member_cats['type'])=='1' || !isset($member_cats['type'])=='2'){
    $member_exp=$member_cats['exp_date'];
  }else{
    $member_exp=date('Y-m-d', strtotime("+1 day"));
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รีวิวหนัง วิจารณ์หนัง วิจารณ์ภาพยนตร์</title>
<META NAME="keywords" CONTENT="รีวิวหนังสนุกๆ รีวิวหนังใหม่ อัพเดตข่าวสารภาพยนตร์ทั้งไทยและต่างประเทศ รีวิวNetfilx รีวิวซีรีย์ดัง แนะนำหนังน่าดู | <?=$titler[3];?>
">
<META NAME="description" CONTENT="รีวิวหนังสนุกๆ รีวิวหนังใหม่ อัพเดตข่าวสารภาพยนตร์ทั้งไทยและต่างประเทศ รีวิวNetfilx รีวิวซีรีย์ดัง แนะนำหนังน่าดู | <?=$titler[3];?>">
<meta name="robots"  content="index,follow">
<meta property="og:site_name" content="https://<?=$titler[3];?>" />
  <meta property="og:url"                content="https://<?=$titler[3];?>/blog-detail.php" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$rpost[4];?>" />
  <meta property="og:description"        content="รีวิวหนังสนุกๆ รีวิวหนังใหม่ อัพเดตข่าวสารภาพยนตร์ทั้งไทยและต่างประเทศ รีวิวNetfilx รีวิวซีรีย์ดัง แนะนำหนังน่าดู | <?=$titler[3];?>" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/img/review-movie.jpg" />
<link rel="canonical" href="https://<?=$titler[3];?>/blog-detail.php" />
<meta property="og:image:alt" content="รีวิวหนังสนุกๆ รีวิวหนังใหม่ อัพเดตข่าวสารภาพยนตร์ทั้งไทยและต่างประเทศ รีวิวNetfilx รีวิวซีรีย์ดัง แนะนำหนังน่าดู | <?=$titler[3];?>" />

<?
//check ban ip
$ip=$_SERVER['REMOTE_ADDR'];
$sip="SELECT * FROM `ban_ip` WHERE ip='$ip'";
$reip=mysqli_query($con_db, $sip) or die("ERROR $sip");
$nip=mysqli_num_rows($reip);
	if($nip>=1){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ หมายเลข IP ของท่านไม่สามารถใช้งานได้ครับ'); 	
		window.location = 'https://<?=$titler[3];?>/index.php'; 
	</script> 
<? 
exit();
	}
?>
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="https://<?=$titler[3];?>/js/coin-slider.js"></script>
<? } ?>

<style>
.label {
  color: white;
  padding: 4px;
}
.success {background-color: #04AA6D;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td id="bg-main"style=" background-color: #<?=$bgr[1];?>;
  <? if($bgr[2]!=""){ ?>background-image: url(//<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
  background-repeat: <?=$bgr[3];?>;<? }if($bgr[4]==1){ ?> 
  background-attachment:fixed;
  <? } ?>">
     <table width="1200" border="0" align="center" cellpadding="2" cellspacing="0"bgcolor="#000000"> 
      <tr>
        <td width="10%" align="center" valign="top"><? include "menu_a.php"; ?></td>
        <td width="80%" align="center" valign="top">
		
	     	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">
<?
$sads2="SELECT * FROM `ads_a1` ORDER BY id ASC";
$reads2=mysqli_query($con_db, $sads2) or die("Error $sads2");
while($rads2=mysqli_fetch_row($reads2)){
?>
<table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" valign="middle"><? 
						  if($rads2[1]==1){ 
						  $ads2=stripslashes($rads2[3]); 
						  echo $ads2;
						  }else if($rads2[1]==2){ 
						  ?>
                        <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>" target="_blank">
                        <? if($rads2[2]==1){  ?>
                        <img src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="728" border="0" title="<?=$rads2[8];?>" />
                        <? }else if($rads2[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="https://<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high" pluginspage="https://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                        </object>
                        <? }} ?>
                      </a></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
                <? } ?></td>
            </tr>
            <tr>
              <td align="center">
                
<p style="background-color: #<? echo $theme_bgcolor;?>;color: #FFFFFF;font-size: 26px; width: 100%;"align="center">รีวิวหนัง
</p>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"style="margin-top: -26px;">
                  <tr>

<?  
  $intRows=0;
  $strSQL="SELECT id, title, img, view, detail, link_youtube, post_date, view, tag_1, tag_2, tag_3, tag_4, tag_5, tag_6, meta_tiele, meta_description, meta_keyword  FROM `blog`  ";
    $objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQ1 บรรทัด 248");
    
    $Per_Page = 12;   // Per Page
    $strSQL .=" ORDER BY id DESC LIMIT $Per_Page";
    $objQuery  = mysqli_query($con_db, $strSQL);
    while($objResult = mysqli_fetch_row($objQuery)){
    $posturl=rewrite($objResult[1]);
      echo "<td width='180' align='center' valign='top'>"; 
      $intRows++;
?>


<div onmouseover="this.style.backgroundColor='#7e7e7e';" onmouseout="this.style.backgroundColor='#666666';" style="background-color: #666666;">



                                      <table width="95%" border="0" cellpadding="5" cellspacing="0">
                                        <tr>
                                          <td align="center" width="20%"><a href="//<?=$titler[3];?>/view-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">

                                            <? if($objResult[2]!=""){ ?>
                                            <img src="data:image/<?php echo end(explode('-', $objResult[2])); ?>;base64,<?php echo curl($objResult[2]);?>" alt="<?=$objResult[1];?>" width="350" border="0" title="<?=$objResult[1];?>"style="border-radius: 4px;" />
                                            <? }else{ ?>
                                            <img src="//<?=$titler[3];?>/post-img/no-img.jpg" alt="<?=$objResult[1];?>"height="250" border="0" title="<?=$objResult[1];?>" />
                                            <? } ?>
                                          </a>
                                          </td>
                                          <td width="80%"><a href="//<?=$titler[3];?>/view-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>" style="font-size: 19px;"><?=$objResult[1];?></a>
                                            <br> <p>
<? if($objResult[8]!=''){?><a href="tag_blog.php?tag=<?=$objResult[8];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[8];?></span></a><?}?>
<? if($objResult[9]!=''){?><a href="tag_blog.php?tag=<?=$objResult[9];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[9];?></span></a><?}?>
<? if($objResult[10]!=''){?><a href="tag_blog.php?tag=<?=$objResult[10];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[10];?></span></a><?}?>
<? if($objResult[11]!=''){?><a href="tag_blog.php?tag=<?=$objResult[11];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[11];?></span></a><?}?>
<? if($objResult[12]!=''){?><a href="tag_blog.php?tag=<?=$objResult[12];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[12];?></span></a><?}?>
<? if($objResult[13]!=''){?><a href="tag_blog.php?tag=<?=$objResult[13];?>"><span class="label warning" style="border-radius: 4px;margin:2px; background-color: #<? echo $theme_bgcolor;?>"><?=$objResult[13];?></span></a><?}?>

<div class="row"><span style="color: #FFFFFF;">อ่าน <?=$objResult[3];?> ครั้ง</span> </div>
                                          </td>
                                          </tr>
                                      </table>
                                      <hr>
</div>


<?
      echo"</td>";
      if(($intRows)%1==0)
      {
        echo"</tr>";
      }
    }
    echo"</table>";
?>  




              </td>
            </tr>            
        </table></td>
        <td width="10%" align="center" valign="top"><? include "menu.php"; ?></td>
      </tr>
        <tr width="10%">
    <td height="60" align="center" id="footer"><? include "footer.php"; ?></td>
  </tr>

    </table></td>
  </tr>

</table>
</body>
</html>
