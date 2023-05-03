
<?php
if(isset($_GET['remove_fire'])){
	@unlink("".$_GET['drive']."/".$_GET['remove_fire']."");
	echo "<script language='javascript'>javascript:history.go(-1)</script>";
}