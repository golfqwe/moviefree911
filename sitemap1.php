<?php
$con_db= mysqli_connect("localhost","postkhai_movie5","7fmi?04K;6","postkhai_movie5") or die("Error: config " . mysqli_error($con_db));

mysqli_query($con_db, "SET NAMES utf8");
mysqli_query($con_db, "SET character_set_results=utf8");
mysqli_query($con_db, "SET character_set_client=utf8");
mysqli_query($con_db, "SET character_set_connection=utf8");
date_default_timezone_set("Asia/Bangkok");  
//include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysqli_query($con_db, $title) or die("ERROR $title");
$titler=mysqli_fetch_row($titlere);
echo '<?xml version="1.0" encoding="utf-8"?>';  
function rewrite($url){
            $url=str_replace(" ", "-", $url);
            return $url;
      }  
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
      <?
            $scate="SELECT id,name FROM `category` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/cate-<? echo $rcate[0];?>/<? echo $urlcate;?></loc>
      <lastmod>2022-03-15T03:17:41+00:00</lastmod>
      <priority>1.00</priority>
</url>
      <?}
      $q="SELECT id,cate_id, title, img, view, movie, projection, imdb  FROM `post` ORDER BY id DESC ";
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
      <lastmod>2022-03-15T03:17:41+00:00</lastmod>
      <priority>1.00</priority>
</url>
      <?}?>
      <?
            $scate="SELECT id,tag_name FROM `tag_category` ORDER BY id ASC";
            $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
                  while($rcate=mysqli_fetch_row($recate)){
                  $urlcate=rewrite($rcate[1]);
      ?>
<url>
      <loc>https://<?=$titler[3];?>/tag-<? echo $rcate[0];?>/<? echo $urlcate;?></loc>
      <lastmod>2022-03-15T03:17:41+00:00</lastmod>
      <priority>1.00</priority>
</url>
      <?} ?>
</urlset>