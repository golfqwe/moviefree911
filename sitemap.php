<?php
$con_db= mysqli_connect("localhost","zeedplay_thaimovie3g","MqzK4}#aUqFt","zeedplay_thaimovie3g") or die("Error: config " . mysqli_error($con_db));

mysqli_query($con_db, "SET NAMES utf8");
mysqli_query($con_db, "SET character_set_results=utf8");
mysqli_query($con_db, "SET character_set_client=utf8");
mysqli_query($con_db, "SET character_set_connection=utf8");
header("Content-type:text/xml; charset=UTF-8");              
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   
date_default_timezone_set("Asia/Bangkok");  
include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
echo '<?xml version="1.0" encoding="utf-8"?>';    
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
      <?
      $q="SELECT id,cate_id, title, img, view, movie, projection, imdb, post_date  FROM `post` ORDER BY id DESC ";
      $qr=mysqli_query($con_db, $q);
            while($objResult = mysqli_fetch_row($qr)){
            $posturl=rewrite($objResult[2]);

            $scate="SELECT * FROM `category` WHERE id='".$objResult[1]."'";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
            $rcate=mysqli_fetch_row($recate);
            $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html</loc>
      <lastmod><? echo $objResult[8];?></lastmod>
      <priority>1.0</priority>
</url>
      <?}?>
      <?
            $scate="SELECT id,name FROM `category` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/cate-<? echo $rcate[0];?>/<? echo $urlcate;?></loc>
      <lastmod>2022-03-15</lastmod>
      <priority>0.9</priority>
</url><?} ?>

      <?
            $scate="SELECT id,tag_name FROM `tag_category` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/tag-<? echo $rcate[0];?>/<? echo $urlcate;?></loc>
      <lastmod>2022-08-15</lastmod>
      <priority>0.9</priority>
</url>
      <?} ?>
      <?
            $scate="SELECT id, title, post_date FROM `blog` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/view-<? echo $rcate[0];?>/<? echo $urlcate;?>.html</loc>
      <lastmod><? echo $rcate[2];?></lastmod>
      <priority>0.9</priority>
</url>
      <?} ?>
      <?
            $scate="SELECT id,tv_name FROM `tv_post` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/view-<? echo $rcate[0];?>/<? echo $urlcate;?>.html</loc>
      <lastmod>2022-08-15</lastmod>
      <priority>0.9</priority>
</url>
      <?} ?>
</urlset>