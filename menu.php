<table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
  <?// if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>
<? 
$sads3="SELECT * FROM `ads_a3` ORDER BY id ASC";
$reads3=mysqli_query($con_db, $sads3) or die("Error $sads3");
while($rads3=mysqli_fetch_row($reads3)){
?>
  <tr>
    <td align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
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
          <? } ?>
        </td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5"></td>
        </tr>
      </table></td>
  </tr>
  <? } ?>
  <? //}//เริ่มคำสั่ง ปิด เปิด โฆษณา ?>
  <tr>
    <td align="center"><? if(isset($_SESSION['member_login'])){ ?>
      <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td id="box-menu"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
            <tr>
              <td height="5"></td>
              </tr>
            </table>
                  <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr >
                     <td><table width="230" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
                        <tr  bgcolor="<? echo $theme_bgcolor;?>">
                          <td id="rcorners4"align="center" style="height:40px;"><span style="font-size: 18px; color: #FFFFFF;">ระบบจัดการ</span><span style="font-size: 18px; color: #FFFFFF;">ข้อมูลสมาชิก</span></td>
                        </tr>
                       <tr bgcolor="#02a1eb">
                          <td height="20" align="center" id="font-main" style="font-size: 18px;">
<?
$smem="SELECT type, reg_date, exp_date FROM `member` WHERE id='$_SESSION[m_id]'  AND actived=1 AND type>2";
$remem=mysqli_query($con_db, $smem) or die("ERROR $smem");
$rmem=mysqli_fetch_row($remem);
?>
						  ประเภท : <? if($rmem[0]==3){ echo "สมาชิกทั่วไป"; }else if($rmem[0]==4){ echo "สมาชิกวีไอพี"; } ?></td>
                        </tr>
                        <tr bgcolor="#02a1eb">
                          <td height="20" align="center" id="font-main" style="font-size: 17px;">วันที่สมัครสมาชิก <br><?=DateThai($rmem[1]);?></td>
                        </tr>
						<? if($rmem[0]==4){ ?>
                        <tr bgcolor="#02a1eb">
                    <td align="center" id="font-main" style="font-size: 17px;">วันที่หมดอายุ<br><?=DateThai($rmem[2]);?></td>
                        </tr>
						<? } ?>
                          <td id="rcorners5" bgcolor="#333333"></td>
                      </table>
                    </td>
                    </tr>
                    <tr>
                      <td>
					  <div class="menu_div">
                              <ul>
                                <li><a href="//<?=$titler[3];?>/member/" title="หน้าหลักสมาชิก">หน้าหลักสมาชิก</a></li>
                                <li><a href="//<?=$titler[3];?>/member/edit-personal.php" title="แก้ไขข้อมูลส่วนตัว">แก้ไขข้อมูลส่วนตัว</a></li>
                              <!--  <li><a href="<?=$titler[7];?>" title="เติมเงินผ่านระบบทรูมันนี่" target="_blank">เติมเงินผ่านระบบทรูมันนี่</a></li>  -->
                                <li><a href="//<?=$titler[3];?>/member/payment.php" title="แจ้งการโอนเงินผ่านธนาคาร">แจ้งการโอนเงินผ่านธนาคาร</a></li>

                                <li><a href="//<?=$titler[3];?>/member/list-member-refill.php" title="ประวัติการเติมเงิน">ประวัติการเติมเงิน</a></li>
                                <li><a href="//<?=$titler[3];?>/member/logout.php" title="ออกจากระบบ">ออกจากระบบ</a></li>
                              </ul>
                          </div>
					  </td>
                    </tr>
                  </table>
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="10"></td>
                  </tr>
            </table></td>
        </tr>
      </table>
      <? }else{ ?>


    <? } ?></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
 <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="230" border="0" align="center" cellpadding="1" cellspacing="0">
          <tr bgcolor="#000000">
            
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
                <tr >
                  <td height="5" ></td>
                </tr>
                <td id="box-menu"  >
              </table>
                <table width="230" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
                  <tr  bgcolor="<? echo $theme_bgcolor;?>">
                    <td align="center" id="rcorners4" >
                    	<table width="230" border="0" align="center" cellpadding="0" cellspacing="0" >
                        <tr>
                          <td align="center"  style="height:40px;"><h3 style="color: #FFFFFF; font-size: 20px; margin-top: 5px;height: 15px;font-weight: 300;">หมวดหมู่รายการหนัง</h3></td>
                        </tr>
                   		</table>
                	</td>
                  </tr>
                  <tr>
                    <td><div class="menu_div" >
                        <ul>
              <?
              $scate="SELECT id, name FROM `category`";
              $recate=mysqli_query($con_db, $scate) or die("ERROR $scate");
              while($rcate=mysqli_fetch_row($recate)){
              $cateurl=rewrite($rcate[1]);
                    $sql="select * from `post` where cate_id='".$rcate[0]."'";
                    $result=mysqli_query($con_db, $sql);
                    $num=mysqli_num_rows($result);              
              ?>
                          <li><font  color="#ffffff"><a href="//<?=$titler[3];?>/cate-<?=$rcate[0];?>/<?=$cateurl;?>" title="<?=$rcate[1];?>"><?=$rcate[1];?>  [<?=$num;?>]</a></font></li>
                          <?  } ?>
                        </ul>
                    </div></td>
                  </tr>
                   <td id="rcorners5" bgcolor="#333333"></td>
              </table>
        </td>
          </tr>
      </table>

                <tr>
                  <td height="5"></td>
                </tr>

  <table width="230" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#000000">
               <tr>
                  <td height="5"></td>
                </tr>
            <td >
                <table id="rcorners5" bgcolor="#333333"  id="box-menu"width="230" border="0" align="center" cellpadding="0" cellspacing="0"bgcolor="#000000">
                  <tr >
                    <td align="center" bgcolor="#000000">
                      <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr bgcolor="<? echo $theme_bgcolor;?>">
                         <td  id="rcorners4"align="center" style="height:40px;"><h3 style="color: #FFFFFF; font-size: 20px; margin-top: 5px;height: 15px;font-weight: 300;">ดูหนังตามปีที่ฉาย</h3>
                          </td>
                        </tr>
                    </table>
                  </td>
                  </tr>                
                 <tr >
                    <td > 
            <table  width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr align="center" >          
          <? $intRows = 1;
            $spre="SELECT  projection FROM `post` GROUP BY projection asc";
            $repre=mysqli_query($con_db, $spre) or die("ERROR $spre");
            while($rpre = mysqli_fetch_assoc($repre)){
            $projection=$rpre['projection'];
              echo "<td align='center'>";
              if(!$projection == '0'){
          ?>
                <a href="//<?=$titler[3];?>/all-year.php?year=<?=$projection;?>" title="<?=$projection;?>"align="center"><?=$projection;?></a>
          <?} 
           echo"</td>";
            if(($intRows)%3==0){echo"</tr>";}
            $intRows++;
            } ?>
          </td>
                  </tr>
              </table>
        </td>
          </tr>
        </table>
    
        </td>

         </tr>
      <tr>
        <td height="5"></td>
      </tr>
 <? if($fbr[2]==1){ ?>

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

  <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td id="box-menu">  <!--  <//?=stripslashes($fbr[1]);?>  -->
<iframe src="https://www.facebook.com/plugins/page.php?href=<?=stripslashes($fbr[1]);?>%2F&tabs=timeline&width=230&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2124626527839517" width="230" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 
            </td>
          </tr><td id="rcorners5" bgcolor="#333333"></td>
      </table>
    </td>
  </tr>
</table> 
<?}?>

    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
<? //if(!$r_config['sets']=='0'){//เริ่มคำสั่ง ปิด เปิด โฆษณา?>
<?
$sads4="SELECT * FROM `ads_a4` ORDER BY id ASC";
$reads4=mysqli_query($con_db, $sads4) or die("Error $sads4");
while($rads4=mysqli_fetch_row($reads4)){
?>
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

<? } ?>
<? // }//เริ่มคำสั่ง ปิด เปิด โฆษณา ?>
</table>

