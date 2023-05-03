<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250" height="60" align="left"><a href="//<?=$titler[3];?>" title="<?=$titler[1];?>"><img src="//<?=$titler[3];?>/logo-img/<?=$bannerr[1];?>" alt="<?=$titler[1];?>" width="250" height="60" border="0" title="<?=$titler[1];?>" /></a></td>
        <td width="5" height="60" align="left">&nbsp;</td>
        <td width="535" height="60"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td id="box-search"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10"></td>
              </tr>
            </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><form id="form1" name="form1" method="post" action="//<?=$titler[3];?>/search.php">
                            <table width="480" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="428"><input type="text" name="keys" onblur="if(this.value==''){this.value='ค้นหาหนังที่ต้องการได้ที่นี่';}" onclick="if(this.value=='ค้นหาหนังที่ต้องการได้ที่นี่'){this.value='';}" value="ค้นหาหนังที่ต้องการได้ที่นี่" style="width:428px; height:20px; color:#999999;"/></td>
                                <td width="10">&nbsp;</td>
                                <td width="42" align="left"><input type="image" name="Submit" id="Submit" value="Submit" src="//<?=$titler[3];?>/img/bt-search.png" /></td>
                              </tr>
                            </table>
                        </form></td>
                      </tr>
                    </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="10"></td>
                      </tr>
                  </table></td>
          </tr>
        </table>
      </td>
        <td width="5" height="60">&nbsp;</td>
        <td width="200" height="60" align="right">
          <span class='st_twitter_large' displaytext='Tweet'></span> 
          <span class='st_facebook_large' displaytext='Facebook'></span> 
          <span class='st_googleplus_large' displaytext='Google +'></span> 
          <span class='st_email_large' displaytext='Email'></span>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td id="bg-main"><div id="menucase">
      <div id="stylefour" style="font-size: 16px;">
        <ul>
          <li><a href="//<?=$titler[3];?>" title="หน้าแรก">หน้าแรก</a></li>
          <li><a href="//<?=$titler[3];?>/all-movie.php" title="หนังทั้งหมด">หนังทั้งหมด</a></li>
          <li><a href="//<?=$titler[3];?>/tag-1/หนังแอคชั่น" title="หนังแอคชั่น">หนังแอคชั่น</a></li>
          <li><a href="//<?=$titler[3];?>/tag-2/ผจญภัย" title="ผจญภัย">ผจญภัย</a></li>
<li><a href="//<?=$titler[3];?>/tag-4/แอนนิเมชั่น" title="แอนนิเมชั่น">แอนนิเมชั่น</a></li>
<li><a href="//<?=$titler[3];?>/cate-2/หนังเอเชีย" title="หนังเอเชีย">หนังเอเชีย</a></li>
<li><a href="//<?=$titler[3];?>/tag-3/หนังตลก" title="หนังตลก">หนังตลก</a></li>
<li><a href="//<?=$titler[3];?>/tag-17/ระทึกขวัญ" title="ระทึกขวัญ">ระทึกขวัญ</a></li>
<li><a href="//<?=$titler[3];?>/cate-3/หนังต่างประเทศ" title="หนังต่างประเทศ">หนังต่างประเทศ</a></li>
<li><a href="//<?=$titler[3];?>/cate-22/ดูซีรี่ย์" title="ดูซีรี่ย์">ดูซีรี่ย์</a></li>
          <li><a href="//<?=$titler[3];?>/contact.php" title="ติดต่อลงโฆษณา">ติดต่อลงโฆษณา</a></li>
        </ul>
      </div>
    </div></td>
  </tr>
  <? if($rbl[1]==1){ ?>

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
                <a href="<?=$rads1[1];?>" title="<?=$rads1[2];?>" target="_blank"><img src="//<?=$titler[3];?>/ads-img/<?=$rads1[3];?>" alt="<?=$rads1[2];?>" width="100%" height="" /></a>
                <? } ?>
              </div>
                <script>
			$('#games').coinslider();
		    </script>
         </td>
  </tr>
  <? }else if($rbl[1]==0){ ?>
  <tr>
    <td height="7" id="bg-main"></td>
  </tr>
  <? } ?>
</table>
