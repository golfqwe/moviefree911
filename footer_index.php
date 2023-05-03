<table id="footer"width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
  $tv_c="SELECT id, name FROM tv_cate ORDER BY id ASC ";
  $tv_cqr=mysqli_query($con_db, $tv_c);
    while($tv_obj = mysqli_fetch_row($tv_cqr)){
    $cateurl=rewrite($tv_obj[1]);
			  $tv_postas="SELECT * FROM tv_post where tv_cate='".$tv_obj[0]."'";
			  $tv_cqs=mysqli_query($con_db, $tv_postas);
			    $total=mysqli_num_rows($tv_cqs);

			    if($total!=0){
?>
            <tr style="text-align: center;">
              <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" height="10"  style="height:40px;"><span style="font-size: 22px; color: #FFFFFF;margin: 10px;"><? echo $cateurl;?></span></td>
            </tr>
            <tr style="text-align: center;">
              <td>

			<?php
			  $tv_post="SELECT id, tv_name, tv_url, tv_img FROM tv_post where tv_cate='".$tv_obj[0]."' ORDER BY id ASC ";
			  $tv_cq=mysqli_query($con_db, $tv_post);
			    while($tv_objpost = mysqli_fetch_row($tv_cq)){
			    $tv_name=rewrite($tv_objpost[1]);
			?>              	
            <a href="//<?=$titler[3];?>/tv-<?=$tv_objpost[0];?>/<?=$tv_name;?>.html" title="<?=$tv_name;?>" target='_blank'><img src="//<?=$titler[3];?>/post-img/<?=$tv_objpost[3];?>" alt="<?=$tv_name;?>"  height="60" border="0" title="<?=$tv_name;?>" /></a>
      <? } ?><br>
              </td>
            </tr>
<? } } ?>
</table>


		<center> <br>
            <a href="//<?=$titler[3];?>" title="<?=$titler[1];?>"><img src="//<?=$titler[3];?>/logo-img/<?=$bannerr[1];?>" alt="<?=$titler[1];?>" width="250" height="60" border="0" title="<?=$titler[1];?>" /></a>
		</center>  


<table width="100%">
 		<tr>
 		 <td>
 		 		 <?
			        $sde="SELECT * FROM `news` WHERE id=1";
			        $rede=mysqli_query($con_db, $sde) or die("ERROR $sde");
			        $rde=mysqli_fetch_row($rede);
			        echo stripslashes($rde[1]);
			      ?>

   				 <br>
			</td>
		</tr>
</table>

<table width="780" style="color: #c9c9c9;">
<tr>
<td> <a href="https://<?=$titler[3];?>">ดูหนังออนไลน์</a></td>
<td> <a href="https://<?=$titler[3];?>/all-movie.php">หนังทั้งหมด</a></td>
<td> <a href="https://<?=$titler[3];?>/cate-51/NETFLIX">NETFLIX</a></td>
<td> <a href="https://<?=$titler[3];?>/cate-28/หนังใหม่ปี-2022">หนังใหม่ 2022</a></td>
<td> <a href="https://<?=$titler[3];?>/cate-52/หนังชนโรง">หนังชนโรง</a></td>
<td> <a href="https://<?=$titler[3];?>/cate-50/ดูซีรีย์ออนไลน์">ดูซีรีย์ออนไลน์</a></td>
<td> <a href="https://<?=$titler[3];?>/cate-41/หนังไทย">หนังไทย</a></td>
<td> <a href="https://<?=$titler[3];?>/all-tag.php?tag=31/Animation-(การ์ตูน)">การ์ตูน</a></td>
<td> <a href="https://<?=$titler[3];?>/all-tag.php?tag=25/Action-(แอคชั่น)">แอคชั่น</a></td>
<td> <a href="https://<?=$titler[3];?>/contact.php">ติดต่อเรา</a></td>
</tr>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
<tr>
  <td height="40" align="center" style="color: #FFFFFF;background-color: <? echo $theme_bgcolor;?>;">Copyright &copy; 2022
      <?=$titler[1];?>
      All Right Reserved | Design By <a href="//<?=$titler[3];?>" target="_blank" style="color:#FFFFFF" title="<?=$titler[3];?>"><?=$titler[3];?></a></td>
  </tr>
  <? if($str[2]==1){ ?>
  <tr>
    <td align="center"><?=stripslashes($str[1]);?></td>
  </tr>
  <? } ?>
</table>


<style>
    .white_content1 {  /* ADS กลาง */
display: none;
position: fixed;
bottom : 0;
left: 10%;
width: 80%;
/* background-color: white; */
z-index: 1002;
overflow: auto;
padding: 16px;
/* background-color: white; 
-webkit-box-shadow: 0 0 20px 4px #000000;
box-shadow: 0 0 20px 4px #000000;  */
    }
 .white_content2 {  /* ADS ขวา */
position: fixed;
right: 0px;
z-index: 1030;
top: 110px;
padding: 0px;
/* background-color: white; 
-webkit-box-shadow: 0 0 20px 4px #000000;
box-shadow: 0 0 20px 4px #000000;  */
}
.white_content3 {  /* ADS ซ้าย */
position: fixed;
left: 0px;
z-index: 1030;
top: 110px;
padding: 0px;
/* background-color: white; 
-webkit-box-shadow: 0 0 20px 4px #000000;
box-shadow: 0 0 20px 4px #000000;  */
}
</style>
<? if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>
           <?
			$strSQL1="SELECT * FROM ads_a5 ORDER BY id DESC LIMIT 2";
			$objQuery1 = mysqli_query($con_db, $strSQL1) or die("ERROR $strSQL1");
			while($objResult1 = mysqli_fetch_row($objQuery1)){
                      		 if($objResult1[9]==0){
			?>



<div id="light" class="white_content2" style="display: block;">
<p style="text-align: left;">
<a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none'"><img src="//<?=$titler[3];?>/img/Actions-window-close-icon.png" width="25" height="25" /> ปิดโฆษณานี้ </a></p>
<!-- ภาพด้านขวา --><a href="<?=$objResult1[4];?>" target="_blank" >
				  <img src="//<?=$titler[3];?>/ads-img/<?=$objResult1[6];?>" width="155" class="img-responsive"></a>
</div>
	<? } if($objResult1[9]==1){?>

<div id="light2" class="white_content3" style="display: block;">
<p style="text-align: right;">
<a href="javascript:void(0)" onclick="document.getElementById('light2').style.display='none'">ปิดโฆษณานี้ <img src="//<?=$titler[3];?>/img/Actions-window-close-icon.png" width="25" height="25" /></a></p>
<!-- ภาพด้านซ้าย --><a href="<?=$objResult1[4];?>" target="_blank" >
				  <img src="//<?=$titler[3];?>/ads-img/<?=$objResult1[6];?>" width="155" class="img-responsive"></a>
</div>
<?}}?>
 <?}//จบคำสั่ง ปิด เปิด โฆษณา?>


		
<div id="light1" class="white_content1" style="display: block;margin-left: -20px">
<p style="text-align: center;">
ปิดโฆษณานี้ <a href="javascript:void(0)" onclick="document.getElementById('light1').style.display='none'"><img src="//<?=$titler[3];?>/img/Actions-window-close-icon.png"alt="ดูหนังออนไลน์"title="ดูหนังออนไลน์" width="25" height="25"></a></p> 
      <? 
      $strSQL="SELECT * FROM ads_a6 ORDER BY id   LIMIT 5";
      $objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQL1");
      while($objResult = mysqli_fetch_row($objQuery)){
                           if($objResult[9]==1){
      ?>

<!-- ภาพกลาง --><a href="<?=$objResult[4];?>" target="_blank" >
        <center><img src="//<?=$titler[3];?>/ads-img/<?=$objResult[6];?>"width="730"alt="โฆษณาดูหนังออนไลน์"title="โฆษณาดูหนังออนไลน์" class="img-responsive"></center>
<?}}?>
</div>
</div>

