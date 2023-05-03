<?
session_start();	
if(!isset($_SESSION['member_login'])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ; 
exit() ;
}
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ประวัติการเติมเงิน | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[6];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ประวัติการเติมเงิน <?=$titler[5];?>">
<meta name="robots"  content="index,nofollow">
<link rel="stylesheet" href="//<?=$titler[3];?>/css/styles.css" type="text/css" />
<script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
<? if($rbl[1]==1){ ?>
<!--Slide-->
<link rel="stylesheet" href="//<?=$titler[3];?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript" src="//<?=$titler[3];?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="//<?=$titler[3];?>/js/coin-slider.js"></script>
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
	color: #000000;
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include "../header.php"; ?></td>
  </tr>
  <tr>
        <td id="bg-main">
     <table width="1200" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="10%" align="center" valign="top"><? include "../menu_a.php"; ?></td>
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
                    <td id="rcorners4" align="center" id="title-movie" style="color: #FFFFFF; font-size: 24px; background-color: <? echo $theme_bgcolor;?>;">ประวัติการเติมเงิน</td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<?
$s="SELECT pass FROM `member` WHERE id='$_SESSION[m_id]'  AND actived=1";
$re=mysqli_query($con_db, $s) or die("ERROR $s");
$r=mysqli_fetch_row($re);
if($r[0]==""){
echo "<meta http-equiv='refresh' content='0;url=setting-password.php'>" ; 
}else{
?>
<table width="728" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td width="200" height="25" align="center" id="font-main" style="background:#800000; ">วัน เวลา ที่เติม </td>
    <td width="200" height="25" align="center" id="font-main" style="background:#800000; ">ประเภทการเติม</td>
    <td width="200" height="25" align="center" id="font-main" style="background:#800000; ">ชนิดการเติม</td>
    <td width="128" height="25" align="center" id="font-main" style="background:#800000; ">สถานะ</td>
  </tr>
<?
$strSQL = "SELECT * FROM `payment` WHERE member_id='$_SESSION[m_id]'";
$objQuery = mysqli_query($con_db, $strSQL) or die("ERROR $strSQL");
$Num_Rows = mysqli_num_rows($objQuery);		
$Per_Page = 50;   // Per Page

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

$strSQL.=" ORDER BY id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($con_db, $strSQL) or die("ERROR");
while($objResult = mysqli_fetch_row($objQuery)){
?>
  <tr>
    <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style="font-family:'Times New Roman', Times, serif; font-size:12px;">
	<? if($objResult[1]==2){ echo DateThai($objResult[6]); }else{ echo $objResult[6]; } ?> 
	เวลา <?=$objResult[7];?> น.</td>
    <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style="font-family:'Times New Roman', Times, serif; font-size:12px;"><?
							if($objResult[1]==1){
							$sbank="SELECT bankname FROM `bank` WHERE id='$objResult[4]'";
							$rebank=mysqli_query($con_db, $sbank) or die("ERROR $sbank");
							$rbank=mysqli_fetch_row($rebank);
							?>
        <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">ผ่านธนาคาร
              <?=$rbank[0];?></td>
          </tr>
          <tr>
            <td align="left">จำนวนเงิน
              <?=$objResult[5];?>
              บาท </td>
          </tr>
        </table>
      <? }else if($objResult[1]==2){ ?>
        <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">ผ่านบัตรทรูมันนี่</td>
          </tr>
        </table>
      <? }else if($objResult[1]==3){ ?>
        <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">แอดมิน
              <?=$titler[1];?></td>
          </tr>
        </table>
      <? } ?></td>
    <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style="font-family:'Times New Roman', Times, serif; font-size:12px;">
	<?
	$spoint="SELECT * FROM `setting_point` WHERE id='$objResult[2]'";
	$repoint=mysqli_query($con_db, $spoint) or die("ERROR $spoint");
	$rpoint=mysqli_fetch_row($repoint);
	?>
	เติมเงิน <?=$rpoint[1];?> บาท ได้ <?=$rpoint[2];?> <? if($rpoint[3]==1){ echo "วัน"; }else if($rpoint[3]==2){ echo "เดือน"; }else if($rpoint[3]==3){ echo "ปี"; } ?>
    </td>
    <td width="128" align="center" valign="top" bgcolor="#E8E8E8" style="font-family:'Times New Roman', Times, serif; font-size:12px;"><? if($objResult[9]==1){ ?>
        <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" style=" color:#339900;">สำเร็จ</td>
          </tr>
          <tr>
            <td align="center" style="color:#FF0000;"><?=Datetime($objResult[10]);?></td>
          </tr>
        </table>
      <? }else{ ?>
        <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" style=" color:#FF0000;">ตรวจสอบ</td>
          </tr>
        </table>
      <? } ?>
    </td>
  </tr>
  <? } ?>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" valign="middle"><? 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?></td>
  </tr>
</table>
<? } ?>
					</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>

        <td width="10%" align="center" valign="top"><? include "../menu.php"; ?></td>
      </tr>
        <tr width="10%">
    <td height="60" align="center" id="footer"><? include "../footer.php"; ?></td>
  </tr>

    </table></td>
  </tr>

</table>
</body>
</html>

