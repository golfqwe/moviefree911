<?
session_start();	
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";


				$sads1="SELECT * FROM `site_logo_share` ORDER BY id ASC";
				$reads1=mysqli_query($con_db, $sads1) or die("Error $sads1");
				$rads1=mysqli_fetch_assoc($reads1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$titler[4];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$titler[5];?>">
<meta name="robots"  content="index,follow">

  <meta property="og:url"                content="https://<?=$titler[3];?>" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?=$rpost[4];?>" />
  <meta property="og:description"        content="<?=$titler[1];?> <?=$titler[5];?>" />
  <meta property="og:image"              content="https://<?=$titler[3];?>/logo-img/<?=$rads1['site_logo_share'];?>" />
  <meta property="og:image:alt" content="<?=$rpost[4];?><?=$titler[1];?>" />

<link rel="stylesheet" href="https://<?=$titler[3];?>/css/styles.css" type="text/css" />
<link type='text/css' rel='stylesheet' href='https://<?=$titler[3];?>/css/liquidcarousel.css' />
<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="https://<?=$titler[3];?>/js/jquery.liquidcarousel.pack.js"></script>
<script type="text/javascript">




	<!--
		$(document).ready(function() {
			$('#liquid1').liquidcarousel({height:230, duration:500, hidearrows:false});
		});
	-->
</script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="https://<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="https://<?=$titler[3];?>/js/coin-slider.js"></script>
<? } ?>
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(//<?=$titler[3];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;<? }if($bgr[4]==1){ ?>	
	background-attachment:fixed;
	<? } ?>
}
-->
</style>
<? 
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $high;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $url_next;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->items_per_page = $this->default_ipp;
		$this->url_next = $this->url_next;
	}
	function paginate()
	{

		if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
		$this->num_pages = ceil($this->items_total/$this->items_per_page);

		if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
		if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;


		if($this->num_pages > 10)
		{
			$this->return .= (($this->current_page != 1 And $this->items_total >= 10)) ? "<a class=\"paginate\" href=\"".$this->url_next.$prev_page."\">&laquo; ก่อนหน้า</a>\n":"<span class=\"inactive\" href=\"#\">&laquo; ก่อนหน้า</span>\n";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<a title=\"หน้า $i จาก $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"ไปที่หน้า $i จาก $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<a class=\"paginate\" href=\"".$this->url_next.$next_page."\">ถัดไป &raquo;</a>\n":"<span class=\"inactive\" href=\"#\">ถัดไป &raquo;</span>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"".$this->url_next.$i."\">$i</a> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
} 
?>
<style type="text/css"> 
<!--
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
		letter-spacing:-1px;
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
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#FFFFFF;
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

	
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "header-slide.php"; ?></td>
  </tr>
  <tr>
    <td id="bg-main">
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="10%" align="center" valign="top"><? include "menu_a.php"; ?></td>
        <td width="80%" align="center" valign="top">

			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#333333" align="center" height="30"><span style="font-size: 20px; color: #f28005;">รายการหนัง</span><span style="font-size: 20px; color: #FFFFFF;"> แนะนำ</span></td>
                        </tr>
                  <tr>
                    <td align="center"><div id="liquid1" class="liquid"> <span class="previous"></span>
                            <div class="wrapper">
                              <ul>
<?	
$spost="SELECT id, title, img FROM `post` WHERE sticky=1 ORDER BY id DESC ";
$repost=mysqli_query($con_db, $spost) or die("ERROR $spost บรรทัด 215");
while($rpost = mysqli_fetch_row($repost)){
$posturl=rewrite($rpost[1]);
?>
                                <li>
								<a href="//<?=$titler[3];?>/post-<?=$rpost[0];?>/<?=$posturl;?>.html" title="<?=$rpost[1];?>">
								<? if($rpost[2]!=""){ ?>
								<img src="//<?=$titler[3];?>/post-img/<?=$rpost[2];?>" width="150" height="225" alt="<?=$rpost[1];?>" border="0" />
								<? }else{ ?>
								<img src="//<?=$titler[3];?>/post-img/no-img.jpg" width="150" height="225" alt="<?=$rpost[1];?>" border="0" />
								<? } ?>
								</a>
								</li>
<? } ?>
                              </ul>
                            </div>
                      <span class="next"></span> </div></td>
                  </tr>
              </table></td>
            </tr>


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
                <? } ?></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><?
				//$sde="SELECT * FROM `news` WHERE id=1";
				//$rede=mysqli_query($con_db, $sde) or die("ERROR $sde");
				//$rde=mysqli_fetch_row($rede);
				//echo stripslashes($rde[1]);
				?></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#ed9005" align="center" height="30"><span style="font-size: 20px; color: #FFFFFF;">รายการหนัง</span><span style="font-size: 20px; color: #FFFFFF;"> อัพเดทล่าสุด</span></td>
                        </tr>
                  <tr>
                    <td align="center">
<?	
$strSQL="SELECT id, title, img, view, movie, projection FROM `post` ";
		$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQ1 บรรทัด 293");
		$Num_Rows = mysqli_num_rows($objQuery);	
		
		$Per_Page = 20;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}
		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows= 0;
		$strSQL .=" ORDER BY id DESC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysqli_query($con_db, $strSQL);
		while($objResult = mysqli_fetch_row($objQuery)){
		$posturl=rewrite($objResult[1]);
			echo "<td width='180' align='center' valign='top'>"; 
			$intRows++;
?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="10"></td>
                        </tr>
                      </table>
                      <table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" id="box-movie" onmouseover="this.style.backgroundColor='#7e7e7e';" onmouseout="this.style.backgroundColor='#333333';"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center"><table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
										<a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
										<? if($objResult[2]!=""){ ?>
										<img src="//<?=$titler[3];?>/post-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="160" height="240" border="0" title="<?=$objResult[1];?>" />
										<? }else{ ?>
										<img src="//<?=$titler[3];?>/post-img/no-img.jpg" alt="<?=$objResult[1];?>" width="160" height="240" border="0" title="<?=$objResult[1];?>" />
										<? } ?>
										</a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5" align="center"><div  id="movie-corner" class="movie-<?=$objResult[4];?>"style="color: #ffffff;"><?=$objResult[4];?></div></td>
                                      </tr>
                                    </table>
                                      <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="left" id="font-main" ><a href="//<?=$titler[3];?>/post-<?=$objResult[0];?>/<?=$posturl;?>.html" title="<?=$objResult[1];?>">
                                            <?=$objResult[1];?>
                                          </a></td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                        <td width="50%"  id="font-main" style="font-size: 12px; color: #ffc582;"> ปีที่ฉาย <?=$objResult[5];?> </td>
                                          <td align="right" id="font-main" style="font-size: 12px;color: #ffc582;"">ดู
                                            <?=$objResult[3];?>
                                            ครั้ง </td>
                                        </tr>
                                    </table></td>
                                </tr>
                              </table>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                            </table></td>
                        </tr>
                      </table>
                      <?
			echo"</td>";
			if(($intRows)%4==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="30" align="center"><? 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?></td>

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
                    <td align="center" valign="middle"><? 
						  if($rads7[1]==1){ 
						  $ads7=stripslashes($rads7[3]); 
						  echo $ads7;
						  }else if($rads7[1]==2){ 
						  ?>
                        <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>" target="_blank">
                        <? if($rads7[2]==1){  ?>
                        <img src="//<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" alt="<?=$rads7[8];?>" width="728" border="0" title="<?=$rads7[8];?>" />
                        <? }else if($rads7[2]==2){ ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                          <param name="movie" value="//<?=$titler[3];?>/ads-img/<?=$rads1[9];?>" />
                          <param name="quality" value="high" />
                          <embed src="//<?=$titler[3];?>/ads-img/<?=$rads7[9];?>" width="728" quality="high" pluginspage="//www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                        </object>
                        <? }} ?>
                      </a></td>
                  </tr>
                </table>
                <? } ?></td>
            </tr>


            
            </tr>
        </table></td>
        <td width="10%" align="center" valign="top"><? include "menu.php"; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" align="center" id="footer"><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
