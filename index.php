<?ob_start();?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<?php	
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
				$sads1="SELECT * FROM `site_logo_share` ORDER BY id ASC";
				$reads1=mysqli_query($con_db, $sads1) or die("Error $sads1");
				$rads1=mysqli_fetch_assoc($reads1);

        $s="select * from statsa where id=1";
        $re=mysqli_query($con_db, $s) or die("ERROR $s บรททัด8");
        $r=mysqli_fetch_row($re);

                  $s="select * from ads_config where id=1";
                  $re=mysqli_query($con_db, $s) or die("Error $s");
                  $r_config=mysqli_fetch_array($re);

                  error_reporting(E_ALL);

?>
<html lang="en">

<head>
  <!--  Google Analytics   -->
  <? if($r[2]==1){ ?> <?=stripslashes($r[1]);?>
  <? } ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="UTF-8">
  <title><?=$titler[4];?> </title>
  <META NAME="keywords" CONTENT="<?=$titler[6];?>">
  <META NAME="description" CONTENT="<?=$titler[5];?>">
  <meta name="robots" content="index,follow">
  <link rel="canonical" href="https://<?=$titler[3];?>" />
  <meta property="og:url" content="https://<?=$titler[3];?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?=$titler[4];?>" />
  <meta property="og:description" content="<?=$titler[1];?> <?=$titler[5];?>" />
  <meta property="og:image" content="https://<?=$titler[3];?>/logo-img/<?=$rads1['site_logo_share'];?>" />
  <meta property="og:image:alt" content="<?=$rpost[4];?><?=$titler[1];?>" />
  <meta name="language" content="en">
  <link rel="apple-touch-icon" href="https://<?=$titler[3];?>/img/apple-touch-icon.png">
  <link href="logo-img/<?=$favicon_r[1];?>" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="https://<?=$titler[3];?>/css/styles.css" type="text/css" />
  <link type='text/css' rel='stylesheet' href='https://<?=$titler[3];?>/css/liquidcarousel.css' />
  <meta name="viewport" content="width=device-width">
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Movie",
    "name": "<?=$titler[1];?>",
    "image": "https://<?=$titler[3];?>/logo-img/<?=$bannerr[1];?>"
  }
  </script>
  <script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery.liquidcarousel.pack.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#liquid1').liquidcarousel({
      height: 230,
      duration: 500,
      hidearrows: false
    });
  });
  </script>
  <? if($rbl[1]==1){ ?>
  <!--Slide-->
  <link rel="stylesheet" href="https://<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
  <script type="text/javascript" src="https://<?=$titler[3];?>/js/coin-slider.js"></script>
  <? } ?>
  <style type="text/css">
  <!--
  body {
    <? if($bgr[2] !="") {
      ?>background-image: url(https://<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
      background-repeat: #<?=$bgr[3];
      ?>;
      <?
    }

    else {
      ?>background-color: #<?=$bgr[1];
      ?>;
      <?
    }

    if($bgr[4]==1) {
      ?>background-attachment: fixed;
      <?
    }

    ?>
  }

  .paginate {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
  }

  a.paginate {
    border: 1px solid #FFFFFF;
    background-color: #333333;
    padding: 2px 6px 2px 6px;
    text-decoration: none;
    color: #FFFFFF;
  }

  h2 {
    font-size: 12pt;
    color: #003366;
  }

  h2 {
    line-height: 1.2em;
    letter-spacing: -1px;
    margin: 0;
    padding: 0;
    text-align: left;
  }

  a.paginate:hover {
    border: 1px solid #FFFFFF;
    background-color: #FFFFFF;
    color: #ffffff;
    text-decoration: underline;
  }

  a.current {
    border: 1px solid #FFFFFF;
    font: bold .7em Arial, Helvetica, sans-serif;
    padding: 2px 6px 2px 6px;
    cursor: default;
    background: #FFFFFF;
    color: #000000;
    text-decoration: none;
  }

  span.inactive {
    border: 1px solid #999;
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    padding: 2px 6px 2px 6px;
    color: #999;
    cursor: default;
  }
  -->
  </style>

</head>

<body>
  <? if($r[2]==1){ ?> <?=stripslashes($r[3]);?>
  <? } ?>

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <? include "header.php"; ?>
      </td>
    </tr>
    <tr>
      <td>
        <table width="1200" border="0" align="center" cellpadding="2" cellspacing="0" id="bg-main">
          <tr>
            <td width="10%" align="center" valign="top">
              <? include "menu_a_index.php"; ?>
            </td>
            <td width="80%" align="center" valign="top">

              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                <? if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>

                <tr>
                  <td align="center">
                    <?
			$sads2="SELECT * FROM `ads_a1` ORDER BY id ASC";
			$reads2=mysqli_query($con_db, $sads2) or die("Error $sads2");
			while($rads2=mysqli_fetch_row($reads2)){
			?>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle">
                          <? 
						  if($rads2[1]==1){ 
						  $ads2=stripslashes($rads2[3]); 
						  echo $ads2;
						  }else if($rads2[1]==2){ 
						  ?>
                          <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>" target="_blank">
                            <? if($rads2[2]==1){  ?>
                            <img src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>"
                              width="728" border="0" title="<?=$rads2[8];?>" />
                            <? }else if($rads2[2]==2){ ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                              codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
                              width="728" border="0">
                              <param name="movie" value="https://<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                              <param name="quality" value="high" />
                              <embed src="https://<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high"
                                pluginspage="//www.macromedia.com/go/getflashplayer"
                                type="application/x-shockwave-flash"></embed>
                            </object>
                            <? }} ?>
                          </a>
                        </td>
                      </tr>
                    </table>
                    <? } ?>
                  </td>
                </tr>

                <?}//จบคำสั่ง ปิด เปิด โฆษณา?>

                <tr>
                  <td align="center">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" align="center">
                          <h3 style="color: #FFFFFF; font-size: 26px; margin-top: 4px;height: 18px;font-weight: 500;">
                            รายการหนังแนะนำ</h3>
                        </td>
                      </tr>
                      <tr>
                        <td align="center">
                          <?	
$strSQL="SELECT id, title, img, view, movie, projection, imdb FROM `post` ";
		$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQ1 บรรทัด 293");
		$Num_Rows = mysqli_num_rows($objQuery);	
		
		$Per_Page = 8;   // Per Page

		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows= 0;
		$strSQL .=" WHERE sticky=1 ORDER BY ID DESC LIMIT  $Per_Page";  // rand() 
		$objQuery  = mysqli_query($con_db, $strSQL);
		while($objResult = mysqli_fetch_row($objQuery)){
		$posturl=rewrite($objResult[1]);
			echo "<td width='180' align='center' valign='top'>"; 
			$intRows++;
?>


                          <div class="box " onmouseover="this.style.backgroundColor='#<? echo $theme_bgcolor;?>';"
                            onmouseout="this.style.backgroundColor='#333333';">
                            <div class="ribbon"><span class="movie-<?=$objResult[4];?>"><?=$objResult[4];?></span></div>
                            <? if(!$objResult[6] == ''){?>
                            <div class="ribbon2"><span style="font-size: 12px;margin-left: 3px;margin-top: 1px"><img
                                  src="//<?=$titler[3];?>/img/star.png" alt="ดูหนังออนไลน์" title="ดูหนังออนไลน์"
                                  width="30%"> <?=$objResult[6];?></span></div>
                            <?}?>


                            <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center">
                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                  </table>
                                  <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center">
                                        <table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="center">
                                              <a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html"
                                                title="<?=$objResult[1];?>">

                                                <?
                    $spre_imgs="SELECT * FROM `post_img` where post_id='".$objResult[0]."' limit 1";
                    $repre_img=mysqli_query($con_db, $spre_imgs) or die("ERROR $spre");
                    $rpre_img = mysqli_fetch_assoc($repre_img);
                      if($rpre_img['post_id']!=$objResult[0]){
                  ?>
                                                <img src="data:image/<?php echo end(explode('-', $objResult[2])); ?>;base64,<?php echo curl($objResult[2]);?>" alt="<?=$objResult[1];?>" width="163"
                                                  height="250" border="0" title="<?=$objResult[1];?>" />
                                             
                                                <?  
                                                
                                                }else{ ?>
                                                <img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>"
                                                  alt="<?=$objResult[1];?>" width="163" height="250" border="0"
                                                  title="<?=$objResult[1];?>" />
                                                <? 
                                              } ?>


                                              </a>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>


                                    <tr>
                                    <tr width="100%" bgcolor="#2e2e2e">
                                      <td width="100%" height="25" id="font-main" align="center"
                                        style="font-size: 12px; color: #ffc582;">
                                        <? if($objResult[4]=='SUB'){ echo "Sound Track ".$objResult[4];}else{ echo "พากย์ไทย ".$objResult[4];} echo " ".$objResult[5];?>
                                      </td>
                                    </tr>
                                    <td align="center">
                                      <table bgcolor="#1c1c1c" width="163" height="55" border="0" align="center"
                                        cellpadding="0" cellspacing="3">
                                        <tr>
                                          <td height="55" align="center" id="font-main" class="container p-3"
                                            style="font-size: 15px; ">
                                            <a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html"
                                              title="<?=$objResult[1];?>">
                                              <!-- <?=$objResult[1];?>  -->
                                              <?echo iconv_substr($objResult[1], 0 , 35, 'UTF-8').'  ';?>
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
                            </table>
                        </td>
                      </tr>
                    </table>
                    </div>


                    <?
			echo"</td>";
			if(($intRows)%4==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?>

                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <? if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>


          <tr>
            <td align="center">


              <?
$sads2="SELECT * FROM `ads_a2` ORDER BY id ASC";
$reads2=mysqli_query($con_db, $sads2) or die("Error $sads2");
while($rads2=mysqli_fetch_row($reads2)){
?>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" valign="middle">
                    <? 
						  if($rads2[1]==1){ 
						  $ads2=stripslashes($rads2[3]); 
						  echo $ads2;
						  }else if($rads2[1]==2){ 
						  ?>
                    <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>" target="_blank">
                      <? if($rads2[2]==1){  ?>
                      <img src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="728" border="0"
                        title="<?=$rads2[8];?>" />
                      <? }else if($rads2[2]==2){ ?>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
                        width="728" border="0">
                        <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                        <param name="quality" value="high" />
                        <embed src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high"
                          pluginspage="//www.macromedia.com/go/getflashplayer"
                          type="application/x-shockwave-flash"></embed>
                      </object>
                      <? }} ?>
                    </a>
                  </td>
                </tr>
              </table>
              <? } ?>
            </td>
          </tr>
          <?}//จบคำสั่ง ปิด เปิด โฆษณา?>



          <tr>
            <td align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <?
				//$sde="SELECT * FROM `news` WHERE id=1";
				//$rede=mysqli_query($con_db, $sde) or die("ERROR $sde");
				//$rde=mysqli_fetch_row($rede);
				//echo stripslashes($rde[1]);
				?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <div style="background-color: #FFF;">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                  src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v16.0&appId=2124626527839517&autoLogAppEvents=1"
                  nonce="wSAskovq"></script>
                <div class="fb-comments" data-href="https://<?=$titler[3];?>" data-width="720" data-numposts="5"></div>
              </div>
              <!--
<div id="fb-root"></div>
                                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="https://<//?=$titler[3];?>" data-width="730" data-numposts="20" data-colorscheme="dark"></div>-->
              <!--https://<//?=$titler[3];?>/post-<//?=$topic_id;?>/<//?=$topic;?>.html-->
              <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" align="center" height="30"
                    style="height:40px;">
                    <h2>
                      <center><span
                          style="font-size: 26px; color: #FFFFFF; font-weight: 400;">รายการหนังอัพเดทล่าสุด</span>
                      </center>
                    </h2>

                  </td>
                </tr>
                <tr>
                  <td align="center">



                    <?php
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
    global $urlquery_str;
    $pPrev=$chk_page-1;
    $pPrev=($pPrev>=0)?$pPrev:0;
    $pNext=$chk_page+1;
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;     
    $lt_page=$total_p-4;
    if($chk_page>0){  
        echo "<a  href='?s_page=$pPrev' class='naviPN'>Prev</a>";
    }
    if($total_p>=11){
        if($chk_page>=4){
            echo "<a $nClass href='?s_page=0'>1</a><a class='SpaceC'>. . .</a>";   
        }
        if($chk_page<4){
            for($i=0;$i<$total_p;$i++){  
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                if($i<=4){
                echo "<a $nClass href='?s_page=$i'>".intval($i+1)."</a> ";   
                }
                if($i==$total_p-1 ){ 
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i'>".intval($i+1)."</a> ";   
                }       
            }
        }
        if($chk_page>=4 && $chk_page<$lt_page){
            $st_page=$chk_page-3;
            for($i=1;$i<=5;$i++){
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";    
            }
            for($i=0;$i<$total_p;$i++){  
                if($i==$total_p-1 ){ 
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i'>".intval($i+1)."</a> ";   
                }       
            }                                   
        }   
        if($chk_page>=$lt_page){
            for($i=0;$i<=4;$i++){
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
            }
        }        
    }else{
        for($i=0;$i<$total_p;$i++){  
            $nClass=($chk_page==$i)?"class='selectPage'":"";
            echo "<a href='?s_page=$i' $nClass  >".intval($i+1)."</a> ";   
        }       
    }   
    if($chk_page<$total_p-1){
        echo "<a href='?s_page=$pNext'  class='naviPN'>Next</a>";
    }
}	
$e_page=24; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
$q="SELECT id, title, img, view, movie, projection, imdb  FROM `post` ";
$q.=" ORDER BY id DESC limit $e_page";
$qr=mysqli_query($con_db, $q);

    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
    $intRows= 0;

    while($objResult = mysqli_fetch_row($qr)){
    $posturl=rewrite($objResult[1]);
      echo "<td width='180' align='center' valign='top'>"; 
      $intRows++;
?>


                    <div class="box" onmouseover="this.style.backgroundColor='#<? echo $theme_bgcolor;?>';"
                      onmouseout="this.style.backgroundColor='#333333';">
                      <div class="ribbon"><span class="movie-<?=$objResult[4];?>"><?=$objResult[4];?></span></div>
                      <? if(!$objResult[6] == ''){?>
                      <div class="ribbon2"><span style="font-size: 12px;margin-left: 3px;margin-top: 1px"><img
                            src="//<?=$titler[3];?>/img/star.png" alt="ดูหนังออนไลน์" title="ดูหนังออนไลน์" width="30%">
                          <?=$objResult[6];?></span></div>
                      <?}?>

                      <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                            <table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center">
                                  <table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center">
                                        <a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html"
                                          title="<?=$objResult[1];?>">
                                          <?
                    $spre_imgs="SELECT * FROM `post_img` where post_id='".$objResult[0]."'";
                    $repre_img=mysqli_query($con_db, $spre_imgs) or die("ERROR $spre");
                    $rpre_img = mysqli_fetch_assoc($repre_img);
                      if($rpre_img['post_id']!=$objResult[0]){
                  ?>
                                          <img src="data:image/<?php echo end(explode('-', $objResult[2])); ?>;base64,<?php echo curl($objResult[2]);?>" alt="<?=$objResult[1];?>" width="163"
                                            height="250" border="0" title="<?=$objResult[1];?>" />
                                          <? }else{ ?>
                                          <img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>"
                                            alt="<?=$objResult[1];?>" width="163" height="250" border="0"
                                            title="<?=$objResult[1];?>" />
                                          <? } ?>


                                        </a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>


                              <tr>
                              <tr width="100%" bgcolor="#2e2e2e">
                                <td width="100%" height="25" id="font-main" align="center"
                                  style="font-size: 12px; color: #ffc582;">
                                  <? if($objResult[4]=='SUB'){ echo "Sound Track ".$objResult[4];}else{ echo "พากย์ไทย ".$objResult[4];} echo " ".$objResult[5];?>
                                </td>
                              </tr>
                              <td align="center">
                                <table bgcolor="#1c1c1c" width="163" height="55" border="0" align="center"
                                  cellpadding="0" cellspacing="3">
                                  <tr>
                                    <td height="55" align="center" id="font-main" class="container p-3"
                                      style="font-size: 15px; ">
                                      <a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html"
                                        title="<?=$objResult[1];?>">

                                        <!-- <?=$objResult[1];?>  -->
                                        <?echo iconv_substr($objResult[1], 0 , 35, 'UTF-8').'  ';?>
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                        </tr>


                      </table>
                  </td>
                </tr>
              </table>

              </div>

              <?
			echo"</td>";
			if(($intRows)%4==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?>
            </td>
          </tr>
        </table>
      </td>
    </tr>



    <tr>
      <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" align="center" height="30" style="height:40px;"><span
          style="font-size: 26px; color: #FFFFFF;"><a href="all-movie.php"> คลิกดูรายการหนังทั้งหมด </a></span></td>
    </tr>

    <? if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>
    <tr>
      <td align="center">
        <?
$sads7="SELECT * FROM `ads_a7` ORDER BY id ASC";
$reads7=mysqli_query($con_db, $sads7) or die("Error $sads7");
while($rads7=mysqli_fetch_row($reads7)){
?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
        </table>
        <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <? 
						  if($rads7[1]==1){ 
						  $ads7=stripslashes($rads7[3]); 
						  echo $ads7;
						  }else if($rads7[1]==2){ 
						  ?>
              <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>" target="_blank">
                <? if($rads7[2]==1){  ?>
                <img src="//<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" alt="<?=$rads7[8];?>" width="728" border="0"
                  title="<?=$rads7[8];?>" />
                <? }else if($rads7[2]==2){ ?>
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                  codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728"
                  border="0">
                  <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                  <param name="quality" value="high" />
                  <embed src="//<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" width="728" quality="high"
                    pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                </object>
                <? }} ?>
              </a>
            </td>
          </tr>
        </table>
        <? } ?>
      </td>
    </tr>


    <? } ?>
    </tr>
  </table>
  </td>
  <td width="10%" align="center" valign="top">
    <? include "menu_index.php"; ?>
  </td>
  </tr>
  <tr width="10%">
    <td height="60" align="center" id="footer">
      <? include "footer_index.php"; ?>
    </td>
  </tr>

  </table>
  </td>
  </tr>

  </table>
</body>

</html>