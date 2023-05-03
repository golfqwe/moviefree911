        <?php
        $sads1="SELECT * FROM `site_top` ORDER BY id ASC";
        $reads1=mysqli_query($con_db, $sads1) or die("Error $sads1");
        $rads1=mysqli_fetch_assoc($reads1);
        ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-image: url(https://<?=$titler[3];?>/logo-img/<?=$rads1['site_top'];?>);">

      <tr width="100%">
        <td align="right" width="380" height="60" align="right">
          <a href="https://<?=$titler[3];?>" title="<?=$titler[1];?>">
            <img src="https://<?=$titler[3];?>/logo-img/<?=$bannerr[1];?>" alt="<?=$titler[4];?>" width="250" height="60" border="0" title="<?=$titler[4];?>">
          </a>
        </td>
       


        <td width="5" height="105">&nbsp;</td>

       <td align="center" width="600" height="60" align="center"><a href="https://<?=$titler[3];?>" title="<?=$titler[1];?>" alt="<?=$titler[1];?>"/></a> <span style="background: rgba(0,0,0,0.36);"> <h1 style="font-size: 30px; color: #a8a8a8;"><?=$titler[1];?></h1></span></td>


        <td width="5" height="60" align="left">&nbsp;</td>
        <td width="380" height="60">
        <table width="230" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td id="box-search">
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10"></td>
              </tr>
            </table>
                    <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><form id="form1" name="form1" method="get" action="https://<?=$titler[3];?>/search.php">
                            <table width="130" border="0" cellspacing="0" cellpadding="0">
                              <tr >
                                <td width="130"><input type="text" name="keys" onblur="if(this.value==''){this.value='ค้นหาหนังได้ที่นี่';}" onclick="if(this.value=='ค้นหาหนังได้ที่นี่'){this.value='';}" value="ค้นหาหนังได้ที่นี่" style="background-color:#969696;  width:150px; height:20px;border-radius: 18px;font-size: 15px;"/></td>
                                <td width="410">&nbsp;</td>
                                <td width="142" align="left"><input type="image" name="Submit" id="Submit" value="Submit" src="https://<?=$titler[3];?>/img/bt-search.png" /></td>
                              </tr>
                            </table>
                        </form></td>
                      </tr>
                    </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="10"></td>
                      </tr>
                  </table>
            </td>
          </tr>
        </table>
        </td>




      </tr>
    </table></td>
  </tr>


  <tr align="center">
    <td style="background-color: #<? echo $theme_bgcolor;?>; margin: auto;">
    <div id="menucase" >
      <div id="stylefour" style=" font-size: 16px;background-color: #<? echo $theme_bgcolor;?>;">
        <ul>
<li><a href="https://<?=$titler[3];?>" title="ดูหนังออนไลน์"style="font-size: 17px;" ><i class="fa fa-home"></i> ดูหนังออนไลน์</a></li>

<li><a href="https://<?=$titler[3];?>/all-movie.php" title="หนังทั้งหมด"style="font-size: 17px;">หนังทั้งหมด</a></li>

<!--<li><a href="https://<?=$titler[3];?>/all-tag.php?tag=20/หนังชนโรง" title="หนังชนโรง"style="font-size: 17px;">หนังชนโรง</a></li>  -->

<li><a href="https://<?=$titler[3];?>/all-tag.php?tag=41/Erotic-Film-(หนัง-18+)" title="หนัง 18+"style="font-size: 17px;">หนัง 18+</a></li>

<li><a href="https://<?=$titler[3];?>/all-tag.php?tag=25/Action-(แอคชั่น)" title="หนังแอคชั่น Action"style="font-size: 17px;">หนังแอคชั่น Action</a></li>

<li><a href="https://<?=$titler[3];?>/all-tag.php?tag=28/Adventure-(ผจญภัย)" title="ผจญภัย"style="font-size: 17px;">ผจญภัย</a></li>

<li><a href="https://<?=$titler[3];?>/all-tag.php?tag=31/Animation-(การ์ตูน)" title="หนังการ์ตูน"style="font-size: 17px;">หนังการ์ตูน</a></li>

<li><a href="https://<?=$titler[3];?>/cate-51/NETFLIX" title="NETFLIX"style="font-size: 17px;">NETFLIX</a></li>

<li><a href="https://<?=$titler[3];?>/popular-movie.php" title="หนังแนะนำ"style="font-size: 17px;">หนังแนะนำ

</a></li>
<li><a href="https://<?=$titler[3];?>/blog-detail.php" title="รีวิวหนัง"style="font-size: 17px;">รีวิวหนัง

</a></li>
<li><a href="https://<?=$titler[3];?>/contact.php" title="ติดต่อเรา"style="font-size: 17px;">ติดต่อเรา</a></li>

        </ul>
      </div>
    </div></td>
  </tr>


  <? if($rbl[1]==1){ ?>
<!--
  <tr>
    <td id="bg-main"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="7"></td>
      </tr>
    </table>

        <div id="games" style="max-width: 100%;height: auto!important;" >
                <?
$sads1="SELECT id, url, keyword, img FROM `ads_a1` ORDER BY id DESC";
$reads1=mysqli_query($con_db, $sads1) or die("Error $sads1");
while($rads1=mysqli_fetch_row($reads1)){
?>
                <a href="<?=$rads1[1];?>" title="<?=$rads1[2];?>" target="_blank"><img src="https://<?=$titler[3];?>/ads-img/<?=$rads1[3];?>" alt="<?=$rads1[2];?>" width="100%" height="" /></a>
                <? } ?>
              </div>
                <script>
			$('#games').coinslider();
		    </script>
         </td>
  </tr>
-->


  <? }else if($rbl[1]==0){ ?>
  <tr>
    <td height="7" id="bg-main"></td>
  </tr>
  <? } ?>
</table>

<style>
     /* scrollbar Color */
body::-webkit-scrollbar {
 width: 15px; /* กำหนดความกว้างของ scroll */
}
body::-webkit-scrollbar-track {
 background: #222222; /* สีพื้นหลัง scroll */
}
body::-webkit-scrollbar-thumb {
 background-color: #<?=$s_color['color'];?>; /* กำหนดสีของแถบเลื่อน scroll */
 border-radius: 25px; /* กำหนดความโค้งมนของแถบเลื่อน scroll */
 border: 2px solid #ffffff; /* กำหนดกรอบเพื่อเว้นระยะรอบแถบเลื่อน scroll */
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #<?=$s_color['color_2'];?>; 
}

  #footer {
  background-color:#<?=$s_color['color_1'];?>;
  
  font-size:15px;
  color:#FFFFFF;
}
</style>
