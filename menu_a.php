
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
      <?
      $sp_football="select * from setup_football where id='1' ";
      $rep_football=mysqli_query($con_db, $sp_football);
      $rp_football=mysqli_fetch_row($rep_football);


       if($rp_football[2]=='1'){
          $scate_football="select * from  `football_league` ORDER BY id DESC";
          $recate_football=mysqli_query($con_db, $scate_football) or die("ERROR $scate");
          while($rcate_football=mysqli_fetch_row($recate_football)){
        ?>

      <tr bgcolor="#3d3d3d" height="110">
     
       <td width="40%" align="center">
        <a href="https://<?=$titler[3];?>/football-detail.php?id=<? echo $rcate_football[0];?>">
          <img src="//<?=$titler[3];?>/post-img/<? echo $rcate_football[4];?>" width="60" height="60" border="0" alt="<?=$rcate_football[3];?>" title="<?=$rcate_football[3];?>" />  
          <img src="//<?=$titler[3];?>/img/vs.png"alt="ดูหนังออนไลน์" title="ดูหนังออนไลน์" width="60" border="0" style="margin: 30px auto;" />  
          <img src="//<?=$titler[3];?>/post-img/<? echo $rcate_football[6];?>" width="60" height="60" border="0"alt="<?=$rcate_football[5];?>" title="<?=$rcate_football[5];?>"/></a></td>
    
      </tr>
      <tr bgcolor="#3d3d3d"  align="center">
        <td><p id="rcorners1"><? echo date("d-m-Y", strtotime($rcate_football[1]))." ".date("H:i", strtotime($rcate_football[2]));?></p></td>
      </tr>
      <tr bgcolor="#00000" align="center">
        <td></td>
      </tr>
        <?}
      }?>

</table> 

<table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
$sads3="SELECT * FROM `ads_a8` ORDER BY id ASC";

$reads3=mysqli_query($con_db, $sads3) or die("Error $sads3");

while($rads3=mysqli_fetch_row($reads3)){

?>

  <tr>

    <td align="center">
    	<table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center"><?

if($rads3[1]==1){ 

echo stripslashes($rads3[3]);

}else if($rads3[1]==2){ 

?>

          <a href="<?=$rads3[7];?>" title="<?=$rads3[8];?>" target="_blank">

          <? if($rads3[2]==1){  ?>

          <img src="//<?=$titler[3];?>/ads-img/<?=$rads3[9];?>" width="230" border="0" title="<?=$rads3[8];?>" alt="<?=$rads3[8];?>" />

          <? }else if($rads3[2]==2){ ?>

          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="230" border="0">

            <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads3[9];?>" />

            <param name="quality" value="high" />

            <embed src="//<?=$titler[3];?>/ads-img/<?=$rads3[9];?>" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="230"></embed>

          </object>

          <? } ?>

          </a>

          <? } ?></td>

      </tr>

    </table>



      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td height="5"></td>

        </tr>

      </table>





    </td>

  </tr>

  <? } ?>









  <tr>

    <td align="center">
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td height="5"></td>

      </tr>

    </table>





              <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td id="box-menu">

              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"bgcolor="#000000">

                <tr>

                  <td height="5"></td>

                </tr>

              </table>

                <table width="230" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">

                  <tr>



                    

                    <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

                        <tr >

                          <td align="center" style="height:40px;"><h3 style="color: #FFFFFF; font-size: 20px; margin-top: 5px;height: 15px;font-weight: 300;">ประเภทรายการหนัง</h3></td>

                        </tr>

                    </table></td>

                  </tr>

                  <tr>

                    <td><div class="menu_div">

                        <ul>

                          <?

              $tag_cat="SELECT id, tag_name FROM `tag_category`";

              $re_tag=mysqli_query($con_db, $tag_cat) or die("ERROR $scate");

              while($tag_cats=mysqli_fetch_row($re_tag)){
                $cateurl=rewrite($tag_cats[1]);


              $sql="select * from `category_movie` where category_movie='".$tag_cats[0]."'";
              $result=mysqli_query($con_db, $sql);
              $num=mysqli_num_rows($result)                

              ?>

                          <li><a href="//<?=$titler[3];?>/all-tag.php?tag=<?=$tag_cats[0];?>/<?=$cateurl;?>" title="<?=$tag_cats[1];?>" align="left"><?=$tag_cats[1];?>  [<?=$num;?>]</a></li>

                          <?  } ?>

                        </ul>

                    </div></td>

                  </tr>

             

                    <td id="rcorners5" bgcolor="#333333"></td>

                





              </table>

        </td>

          </tr >

      </table>

  </tr>


<!-- หนังล่าสุด -->
   <tr>
    <td align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>


              <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td id="box-menu">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"bgcolor="#000000">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="230" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
                  <tr>

                    
                    <td id="rcorners4" bgcolor="<? echo $theme_bgcolor;?>" align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr >
                          <td align="center" style="height:40px;"><span style="color: #FFFFFF; font-size: 20px; margin-top: 2px;height: 23px;font-weight: 300;">รายการหนังล่าสุด</span></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><div class="menu_div">
                        <ul>
                          <?
              $tag_cat_post="SELECT id, title FROM `post`ORDER BY id DESC limit 10";
              $re_tag_post=mysqli_query($con_db, $tag_cat_post) or die("ERROR $tag_cat_post");
              while($tag_cats_post=mysqli_fetch_row($re_tag_post)){
                $cateurl=rewrite($tag_cats_post[1]);
              ?>
                          <li><a href="//<?=$titler[3];?>/post-<?=$tag_cats_post[0];?>/<?=$cateurl;?>.html" title="<?=$rcate[1];?>"><?=$tag_cats_post[1];?></a></li>
                          <?  } ?>
                        </ul>
                    </div></td>
                  </tr>
             
                    <td id="rcorners5" bgcolor="#333333"></td>
                


              </table>
        </td>
          </tr >
      </table>
  </tr>






  <? if($fbr[2]==1){ ?>

      <tr>

        <td height="5"></td>

      </tr>

     <table id="rcorners5" bgcolor="#333333"  id="box-menu"width="230" border="0" align="center" cellpadding="0" cellspacing="0"bgcolor="#000000">

                  <tr >

                    <td align="center" bgcolor="#000000">

                      <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

                        <tr bgcolor="<? echo $theme_bgcolor;?>">

                          <td  id="rcorners4"align="center" style="height:40px;"><span style="font-size: 18px; color: #FFFFFF;">ติดตามเราได้ที่ Facebook</span>

                          </td>

                        </tr>

                    </table>

                  </td>

                  </tr>

  <tr width="100%">

    <td align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td height="5"></td>

      </tr>

    </table>

        <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td id="box-menu">

  <!--  <//?=stripslashes($fbr[1]);?>  -->

<iframe src="https://www.facebook.com/plugins/page.php?href=<?=stripslashes($fbr[1]);?>%2F&tabs=timeline&width=230&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2124626527839517" width="230" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 



            </td>

          </tr>

      </table>

    </td>

  </tr><td id="rcorners5" bgcolor="#333333"></td>











<? }

$sads4="SELECT * FROM `ads_a9` ORDER BY id ASC";

$reads4=mysqli_query($con_db, $sads4) or die("Error $sads4");

while($rads4=mysqli_fetch_row($reads4)){

?>

  <tr>

    <td align="center">

        <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td align="center"><?

if($rads4[1]==1){ 

echo stripslashes($rads4[3]);

}else if($rads4[1]==2){ 

?>

                <a href="<?=$rads4[7];?>" title="<?=$rads4[8];?>" target="_blank">

                <? if($rads4[2]==1){  ?>

                <img src="//<?=$titler[3];?>/ads-img/<?=$rads4[9];?>" width="230" border="0" title="<?=$rads4[8];?>" alt="<?=$rads4[8];?>" />

                <? }else if($rads4[2]==2){ ?>

                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="230" border="0">

                  <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads4[9];?>" />

                  <param name="quality" value="high" />

                  <embed src="//<?=$titler[3];?>/ads-img/<?=$rads4[9];?>" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="230"></embed>

                </object>

                <? } ?>

                </a>

                <? } ?></td>

          </tr>

        </table>

        </td>

  </tr>

<? } ?>

</table>

<style> 
#rcorners1 {
    border-radius: 25px;
    background: #<? echo $theme_bgcolor;?>;
    width: auto;   
    text-align: center;
    color: #fff;
    font-size:14px;
}
</style>