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

$sc_series="SELECT * FROM `movie_series` WHERE id_series='".$_GET['series']."' ";
$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
$r_series=mysqli_fetch_row($re_series);

$movie_id=$r_series[1];

$spost="SELECT * FROM `post` WHERE id='$movie_id'";
$repost=mysqli_query($con_db, $spost) or die("ERROR $spost");
$rpost=mysqli_fetch_row($repost);
$topic=$rpost['topic'];
$topic_id=$rpost['topic_id'];
$stars=$rpost[17];
$years=$rpost[16];
$mov=$rpost[14];

$scate="SELECT id, name, member_access, user_access FROM `category` WHERE id='$rpost[1]'";
$recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
$rcate=mysqli_fetch_row($recate);
$urlcate=rewrite($rcate[1]);

$new_view=$rpost[11]+1;
$upd_view="UPDATE post SET view='$new_view' WHERE id='$rpost[0]'" or die("ERROR upd_view");
mysqli_query($con_db, $upd_view);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rpost[3];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$rpost[4];?>">
<meta name="robots"  content="index,follow">


<meta property="og:site_name" content="https://<?=$titler[3];?>" />
  <meta property="og:url"                content="https://<?=$titler[3];?>/post_series.php?series=<?=$r_series[0];?>" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$rpost[3];?> | <?=$titler[1];?><?=$rpost[4];?>" />
  <meta property="og:description"        content="<?=$rpost[3];?> | <?=$titler[1];?><?=$titler[1];?><?=$rpost[4];?>" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>" />
<link rel="canonical" href="https://<?=$titler[3];?>/post_series.php?series=<?=$r_series[0];?>"/>
<meta property="og:image:alt" content="<?=$rpost[4];?><?=$titler[1];?>" />

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
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>



                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                                <td   id="rcorners4" align="center" id="title-movie" style="background-color: #<? echo $theme_bgcolor;?>;"><h1 style="color: #FFFFFF; font-size: 26px; margin-top: 2px;height: 23px;font-weight: 400;"><?=$rpost[3];?></h1></td>
                       </tr>




                        <tr>
                          <td height="30" align="center" id="font-main">หมวดหมู่ :: <span style="background-color: #<? echo $theme_bgcolor;?>;border-radius: 5px;"><a href="https://<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style=" color:#333333; padding:5px;"><?=$rcate[1];?></a></span> วันที่โพสต์ : <?=DateThai($rpost[9]);?> เข้าดู <?=$rpost[11];?> ครั้ง 

                          </td>        
                        </tr>


                    </table></td>
                  </tr> 


                  <? if($rpost[6]!=""){ ?> 
                  <tr>
                    <td align="center"><table width="730" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">


                        <tr> 
                          <td align="center"><img src="https://<?=$titler[3];?>/post-img/<?=$rpost[6];?>"width="220" height="350" align="" title="" /></td>
                          <td align="center">

                            <iframe width="498" height="350" src="https://www.youtube.com/embed/<?=$rpost[7];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </td>                          
                        </tr>


                      </table>
<table width="100%" height="40" style="background-color: #333333;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
  font-size: 16px;
  color: #FFFFFF; vertical-align: middle;">
<tbody>
<tr style="vertical-align: middle;">
<td >ปีที่ฉาย : <? echo $years;?></td>
<td>เสียง : <? if($mov=='SUB'){ echo "Sound Track ";}else{ echo "พากย์ไทย ";}?> : <button type="button" class="btn btn-danger"style="font-weight: bolder; color: #<? echo $theme_bgcolor;?>;" > <? echo $mov;?> </button></td>
<td><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0&appId=2124626527839517&autoLogAppEvents=1" nonce="pZSuiYCQ"></script>
<div class="fb-like" data-href="https://<?=$titler[3];?>/post_series.php?series=<?=$r_series[0];?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div></td>
<td><img src="https://<?=$titler[3];?>/img/imdb.png" width='50' style="vertical-align: middle;
"> <? echo $stars;?><img src="//<?=$titler[3];?>/img/star.png" width="15"></td>
</tr>
</tbody>
</table>


</td>
                  </tr>
                  <? } ?>

                  <tr style="font-size: 17px;">
                    <td>

	            <?//if($rpost[13]=='series'){ ?> 

							<?           // หัวข้อเรื่อง Ep 
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE id_series='".$_GET['series']."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<br><span id="rcorners4" style="background-color: '.$s_color['color'].'; height:35; width:100%; float:left; text-align:center;  color:#FFFFFF; font-size:20px;">ตอนที่ '.$_GET['ep'].'  '.$rpost[3].'</span><br>';
						

							echo '<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">';
							if(!$r_series[2] == ''){  
							?>
								<tr>
									<td align="center">

 <div id="player">Loading..</div>
<script src="https://<?=$titler[3];?>/js/lqsWlr4Z.js"></script>
<script>
jwplayer("player").setup({
    "file": "<?=$r_series[2];?>",
    "width": "100%",
    "height": "550",
    "backgroundColor": "525252",
    "aspectratio": "16:9",
    "type": "hls",
    "primary": "html5",
    "autostart": true,
  "hlshtml": true
});
</script>                   
									
									</td>
								</tr>
								<? }  if(!$r_series[1] == ''){?>
								<tr>
									<td align="center">
<iframe allowfullscreen="" frameborder="0" width="100%" height="500" scrolling="no" src="<?=$r_series[1];?>"></iframe>

										<?// echo $r_series[1];?>
									</td>
								</tr>
							<?		}
							echo '</table>';
								 $ep++;
								} 
							//} 
								// รายการ Ep ทั้งหมด
								$ep=1;
								$sc_series="SELECT id_series, google_drive, series_ep FROM `movie_series` WHERE movie_id='".$rpost[0]."' ORDER BY id_series ASC";
								$re_series=mysqli_query($con_db, $sc_series) or die("ERROR $sc_series");
								while($r_series=mysqli_fetch_row($re_series)){

							echo '<span style="background-color: #'.$theme_bgcolor.'; color:#333333; border-radius:4px;  padding:1px;float:left;width:100%;text-align:left;"><a href="//'.$titler[3].'/post_series.php?series='.$r_series[0].'&ep='.$ep.'"style="font-size: 17px; color: #FFFFFF;">ตอนที่ '.$ep.' ::  '.$rpost[3].'</a><br>';
							echo '</span> <hr style="border: 1px solid black;">';

								 $ep++;
								} 
							 ?>					
				

					</td>
                  </tr>
                  <tr>
                    <td align="center">


                        <? if($rpost[10]==1){ ?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div id="fb-root"></div>
                                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                          </tr>
                        </table>
                      <? 
}else if($rpost[10]==2){ 
	if(isset($_SESSION['member_login'])){
?>
                        <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div id="fb-root"></div>
                                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-comments" data-href="https://<?=$titler[3];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-width="730" data-numposts="20" data-colorscheme="dark"></div></td>
                          </tr>
                        </table>
                      <? }else{ ?>
                        <table width="730" border="0" align="center" cellpadding="0" style="background-color:#CCCCCC; border:1px solid #333333;">
                          <tr>
                            <td height="30" align="center" id="font-main" style=" color:#FF0000;">กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</td>
                          </tr>
                        </table>
                      <? }} ?>
                    </td>
                  </tr>
                </table>

				
				
				</td>
            </tr>

            <tr>
              <td align="center">
<?
$sads7="SELECT * FROM `ads_a7` ORDER BY id ASC";
$reads7=mysqli_query($con_db, $sads7) or die("Error $sads7");
while($rads7=mysqli_fetch_row($reads7)){
?>
<table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" valign="middle"><? 
              if($rads7[1]==1){ 
              $ads7=stripslashes($rads7[3]); 
              echo $ads7;
              }else if($rads7[1]==2){ 
              ?>
                        <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>" target="_blank">
                        <? if($rads7[2]==1){  ?>
                        <img src="https://<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" alt="<?=$rads7[8];?>" width="728" border="0" title="<?=$rads7[8];?>" />
                        <? }else if($rads7[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="https://<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="https://<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" width="728" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
                <? } ?>		
				
				</td>
            </tr>
            <tr>
				<td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                                <td   id="rcorners4" align="center" id="title-movie" style="background-color: #<? echo $theme_bgcolor;?>;"><h1 style="color: #FFFFFF; font-size: 26px; margin-top: 2px;height: 23px;font-weight: 300;">รายการซีรี่ย์แนะนำ</h1></td>
                       </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>



<?	
$strSQL="SELECT id, title, img, view, movie, projection, imdb FROM `post` WHERE cate_id='$rcate[0]' ";
		$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQ1 บรรทัด 248");
		
		$Per_Page = 12;   // Per Page
		$strSQL .=" ORDER BY id DESC LIMIT $Per_Page";
		$objQuery  = mysqli_query($con_db, $strSQL);
		while($objResult = mysqli_fetch_row($objQuery)){
		$posturl=rewrite($objResult[1]);
			echo "<td width='180' align='center' valign='top'>"; 
			$intRows++;
?>



<div class="box" onmouseover="this.style.backgroundColor='#<? echo $theme_bgcolor;?>';" onmouseout="this.style.backgroundColor='#333333';"style="margin: 2px;">
 <div class="ribbon"><span class="movie-<?=$objResult[4];?>"><?=$objResult[4];?></span></div>
 <? if(!$objResult[6] == ''){?>
  <div class="ribbon2"><span  style="font-size: 12px;"><img src="//<?=$titler[3];?>/img/star.png" width="30%"> <?=$objResult[6];?></span></div>
<?}?>



                          <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
                                  <table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center"><a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
                                            <? if($objResult[2]!=""){ ?>
                                            <img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="163" height="250" border="0" title="<?=$objResult[1];?>" />
                                            <? }else{ ?>
                                            <img src="//<?=$titler[3];?>/post-img/no-img.jpg" alt="<?=$objResult[1];?>" width="163" height="250" border="0" title="<?=$objResult[1];?>" />
                                            <? } ?>
                                          </a></td>
                                        </tr>
                                      </table></td>
                                    </tr>



                                <tr>
                                      <tr width="100%"  bgcolor="#2e2e2e">
                                          <td width="100%" height="25" id="font-main" align="center" style="font-size: 12px; color: #ffc582;" > <? if($objResult[4]=='SUB'){ echo "Sound Track ".$objResult[4];}else{ echo "พากย์ไทย ".$objResult[4];} echo " ".$objResult[5];?>
                                          </td>
                                      </tr>
                                  <td align="center">
                                      <table bgcolor="#1c1c1c" width="163" height="55" border="0" align="center" cellpadding="0" cellspacing="3">
                                      <tr>
                                          <td height="55" align="center" id="font-main"class="container p-3" style="font-size: 15px; ">
                                            <a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
                                            <?echo iconv_substr($objResult[1], 0 , 35, 'UTF-8').'..';?>
                                            </a>
                                          </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>


                                  </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                          </table>
</div>
<p style="margin-top: -13px;">
<?
			echo"</td>";
			if(($intRows)%4==0)
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

