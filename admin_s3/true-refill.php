<?
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : ระบบจัดการข้อมูลเว็บไซต์</title>
<link rel='stylesheet' type='text/css' href='styles.css' />
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
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
	border: 1px solid #cccccc;
	background-color: #FFFFFF;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000000;
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
	border: 1px solid #cccccc;
	background-color: #cccccc;
	color: #000000;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #cccccc;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#cccccc;
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
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="220" align="center" valign="top" bgcolor="#222222"><? include "menu.php"; ?></td>
    <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" style="border-bottom:2px solid #FF0000;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="500"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" id="font-main" style="font-weight:bold; color:#333333;">Admin Panel : ระบบจัดการข้อมูลเว็บไซต์ </td>
              </tr>
            </table></td>
            <td width="250"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="175" align="right"><img src="img/Power-Shutdown.png" width="16" height="16" /></td>
                <td width="75" align="right" id="font-main"><a href="logout.php" style="font-weight:bold; color:#333333;">ออกจากระบบ</a></td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="left" id="font-main" style="font-weight:bold; color:#333333;">จัดการข้อมูลรายการเติมเงินผ่านทรูมันนี่</td>
            </tr>
            <tr>
              <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                  <td width="100" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">วัน เวลา ที่เติม </td>
                  <td width="200" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">ข้อมูลสมาชิก</td>
                  <td width="200" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">ชนิดการเติม</td>
                  <td width="130" height="25" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">สถานะ</td>
                  <td width="120" align="center" bgcolor="#999999" style=" font-size:16px; font-weight:bold;">การจัดการ</td>
                </tr>
<?
$strSQL = "SELECT * FROM `payment` WHERE type=2 ";
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
                  <td width="100" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><?=DateThai($objResult[6]);?></td>
                      </tr>
                      <tr>
                        <td align="center">เวลา <?=$objResult[7];?> น.</td>
                      </tr>
                  </table></td>
                  <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>Email :
                            <?
						$smem="SELECT email FROM `member` WHERE id='$objResult[3]'";
						$remem=mysqli_query($con_db, $smem) or die("ERROR $smem");
						$rmem=mysqli_fetch_row($remem);
						echo $rmem[0];
						?>
                        </td>
                      </tr>
                    </table>
                      </td>
                  <td width="200" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><?
				  $spoint="SELECT * FROM `setting_point` WHERE id='$objResult[2]'";
				  $repoint=mysqli_query($con_db, $spoint) or die("ERROR $spoint");
				  $rpoint=mysqli_fetch_row($repoint);
				  ?>
                    เติมเงิน
                    <?=$rpoint[1];?>
                    บาท ได้
                    <?=$rpoint[2];?>
                    <? if($rpoint[3]==1){ echo "วัน"; }else if($rpoint[3]==2){ echo "เดือน"; }else if($rpoint[3]==3){ echo "ปี"; } ?>
                  </td>
                  <td width="130" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><? if($objResult[9]==1){ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#339900;">สำเร็จ</td>
                        </tr>
                        <tr>
                          <td align="center" style="color:#FF0000;"><?=Datetime($objResult[10]);?></td>
                        </tr>
                      </table>
                    <? }else{ ?>
                      <table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-weight:bold; color:#FF0000;">ตรวจสอบ</td>
                        </tr>
                      </table>
                    <? } ?>
                  </td>
                  <td width="120" align="center" valign="top" bgcolor="#E8E8E8" style=" font-size:16px;"><select name="status" id="status" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                      <option value="" selected="selected">- เลือก -</option>
                      <option value="del-true-payment.php?id=<?=$objResult[0];?>">ลบข้อมูล</option>
                  </select></td>
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
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
