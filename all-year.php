<?php
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
        $sads1="SELECT * FROM `site_logo_share` ORDER BY id ASC";
        $reads1=mysqli_query($con_db, $sads1) or die("Error $sads1");
        $rads1=mysqli_fetch_assoc($reads1);
$year=$_GET['year'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ปีที่ฉาย <?=$year;?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> แจ้งปัญหาหนังดูไม่ได้ แจ้งลิงค์เสีย <?=$titler[5];?>">
<meta name="robots"  content="index,follow">
<meta rel="canonical" content="https://<?=$titler[3];?><?=$_SERVER['REQUEST_URI'];?>">
<meta property="og:url"                content="https://<?=$titler[3];?><?=$_SERVER['REQUEST_URI'];?>" />
<link href="../logo-img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<meta property="og:image"              content="https://<?=$titler[3];?>/logo-img/<?=$rads1['site_logo_share'];?>" />
<link rel="stylesheet" href="//<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="//<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="//<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="//<?=$titler[3];?>/js/coin-slider.js"></script>
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
$sads2="SELECT * FROM `ads_a2` ORDER BY id ASC";
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
                        <img src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="728" border="0" title="<?=$rads2[8];?>" />
                        <? }else if($rads2[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="//<?=$titler[3];?>/ads-img/<?=$rads2[9];?>" width="728" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
              <td align="center"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

                  <tr>
                    <td  id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px; background-color: #<? echo $theme_bgcolor;?>;"><h1 style="color: #FFFFFF; font-size: 26px; margin-top: 2px;height: 23px;font-weight: 300;">รายการหนังในปี <?=$year;?></h1></td>
                  </tr>

                  <tr>
                    <td align="center">
					 <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
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
        echo "<a  href='?s_page=$pPrev&year=".$_GET['year']."' class='naviPN'>Prev</a>";
    }
    if($total_p>=11){
        if($chk_page>=4){
            echo "<a $nClass href='?s_page=0&year=".$_GET['year']."'>1</a><a class='SpaceC'>. . .</a>";   
        }
        if($chk_page<4){
            for($i=0;$i<$total_p;$i++){  
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                if($i<=4){
                echo "<a $nClass href='?s_page=$i&year=".$_GET['year']."'>".intval($i+1)."</a> ";   
                }
                if($i==$total_p-1 ){ 
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&year=".$_GET['year']."'>".intval($i+1)."</a> ";   
                }       
            }
        }
        if($chk_page>=4 && $chk_page<$lt_page){
            $st_page=$chk_page-3;
            for($i=1;$i<=5;$i++){
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($st_page+$i)."&year=".$_GET['year']."'>".intval($st_page+$i+1)."</a> ";    
            }
            for($i=0;$i<$total_p;$i++){  
                if($i==$total_p-1 ){ 
                $nClass=($chk_page==$i)?"class='selectPage'":"";
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&year=".$_GET['year']."'>".intval($i+1)."</a> ";   
                }       
            }                                   
        }   
        if($chk_page>=$lt_page){
            for($i=0;$i<=4;$i++){
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
                echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."&year=".$_GET['year']."'>".intval($lt_page+$i)."</a> ";   
            }
        }        
    }else{
        for($i=0;$i<$total_p;$i++){  
            $nClass=($chk_page==$i)?"class='selectPage'":"";
            echo "<a href='?s_page=$i&year=".$_GET['year']."' $nClass  >".intval($i+1)."</a> ";   
        }       
    }   
    if($chk_page<$total_p-1){
        echo "<a href='?s_page=$pNext&year=".$_GET['year']."'  class='naviPN'>Next</a>";
    }
} 

$q="SELECT id, title, img, view, movie, projection, imdb  FROM `post` ";
$q.="  WHERE projection='$year' ORDER BY id DESC  ";
$qr=mysqli_query($con_db, $q);
$total=mysqli_num_rows($qr);
$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
    $_GET['s_page']=0;   
}else{   
    $chk_page=$_GET['s_page'];     
    $_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysqli_query($con_db, $q);
if(mysqli_num_rows($qr)>=1){   
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);   
}else{   
    $plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;

    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
    $intRows= 0;

    while($objResult = mysqli_fetch_row($qr)){
    $posturl=rewrite($objResult[1]);
      echo "<td width='180' align='center' valign='top'>"; 
      $intRows++;
?>



<div class="box" onmouseover="this.style.backgroundColor='#<? echo $theme_bgcolor;?>';" onmouseout="this.style.backgroundColor='#333333';">
 <div class="ribbon"><span class="movie-<?=$objResult[4];?>"><?=$objResult[4];?></span></div>
 <? if(!$objResult[6] == ''){?>
  <div class="ribbon2"><span  style="font-size: 12px;margin-left: 3px;margin-top: 1px"><img src="//<?=$titler[3];?>/img/star.png" width="30%"> <?=$objResult[6];?></span></div>
<?}?>

                          <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
                                  <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><table width="163" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center"><a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
                  <?
                    $spre_imgs="SELECT * FROM `post_img` where post_id='".$objResult[0]."'";
                    $repre_img=mysqli_query($con_db, $spre_imgs) or die("ERROR $spre");
                    $rpre_img = mysqli_fetch_assoc($repre_img);
                      if($rpre_img['post_id']!=$objResult[0]){
                  ?>
                    <img src="<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="163" height="250" border="0" title="<?=$objResult[1];?>" />
                  <? }else{ ?>
                    <img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="163" height="250" border="0" title="<?=$objResult[1];?>" />
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

<?
      echo"</td>";
      if(($intRows)%4==0)
      {
        echo"</tr>";
      }
    }
    echo"</tr></table>";
?>            </td>
                      </tr>
                      <tr>
                        <td height="30" align="center" valign="middle">
<?php if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?>

            </td>
                      </tr>
                     </table>




          </td>
                  </tr>
              </table></td>
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
