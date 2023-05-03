<?php
$con_db= mysqli_connect("localhost","zeedplay_thaimovie3g","MqzK4}#aUqFt","zeedplay_thaimovie3g") or die("Error: config " . mysqli_error($con_db));

mysqli_query($con_db, "SET NAMES utf8");
mysqli_query($con_db, "SET character_set_results=utf8");
mysqli_query($con_db, "SET character_set_client=utf8");
mysqli_query($con_db, "SET character_set_connection=utf8");
date_default_timezone_set("Asia/Bangkok");
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
$sbl="select * from banner_slide where id=1";
$rebl=mysqli_query($con_db, $sbl) or die("ERROR $sbl");
$rbl=mysqli_fetch_row($rebl);
$banner="select * from site_logo where id=1";
$bannerre=mysqli_query($con_db, $banner) or die("ERROR $banner");
$bannerr=mysqli_fetch_row($bannerre);

$favicon="select * from site_favicon where id=1";
$favicon_e=mysqli_query($con_db, $favicon) or die("ERROR $favicon");
$favicon_r=mysqli_fetch_row($favicon_e);

$bg="select * from bg where id=1";
$bgre=mysqli_query($con_db, $bg) or die("ERROR $bg");
$bgr=mysqli_fetch_row($bgre);

$fb="select * from fanpage where id=1";
$fbre=mysqli_query($con_db, $fb) or die("ERROR $fb");
$fbr=mysqli_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysqli_query($con_db, $st) or die("ERROR $st");
$str=mysqli_fetch_row($stre);
        $sads_color="select * from `color` where id=1";
        $reads_color=mysqli_query($con_db, $sads_color) or die("Error $sads1");
        $s_color=mysqli_fetch_assoc($reads_color);
        $theme_bgcolor=$s_color['color'];
  $query = "select * from ads_video ORDER BY id " or die("Error:" . mysqli_error());
  $result = mysqli_query($con_db, $query);
$sd=1;
  while($arr = mysqli_fetch_array($result)){
    if ($arr['posit']=='link1'){ $link1=$arr['name'];}
    if ($arr['posit']=='link2'){ $link2=$arr['name'];}
    if ($arr['posit']=='link3'){ $link3=$arr['name'];}
    if ($arr['posit']=='link4'){ $link4=$arr['name'];}

    if ($arr['posit']=='text_link1'){ $text_link1=$arr['name'];}
    if ($arr['posit']=='text_link2'){ $text_link2=$arr['name'];}
    if ($arr['posit']=='text_link3'){ $text_link3=$arr['name'];}
    if ($arr['posit']=='text_link4'){ $text_link4=$arr['name'];}
$sd++;
}?>
<style type="text/css">
<!--
.background {
  background-color: #<?=$bgr[1];?>;
  <? if($bgr[2]!=""){ ?>background-image: url(//<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
  background-repeat: <?=$bgr[3];?>;<? }if($bgr[4]==1){ ?> 
  background-attachment:fixed;
  <? } ?>

}
-->
</style>