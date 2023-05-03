<?php 
 session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

if(isset($_GET['add'])){
	$home_league=time()."_".$_FILES["file_home"]["name"];
	$visit_league=time()."_".$_FILES["file_visit"]["name"];

	@copy($_FILES["file_home"]["tmp_name"],"../post-img/".$home_league);
	@copy($_FILES["file_visit"]["tmp_name"],"../post-img/".$visit_league);
	$list_up="insert into `football_league`(`date_league`, `time_league`, `home_league`, `icon_home`, `visit_league`, `icon_visit`, `link_league`) values ('".$_POST['date_league']."','".$_POST['time_league']."','".$_POST['home_league']."','".$home_league."','".$_POST['visit_league']."','".$visit_league."','".$_POST['link_league']."')";
	mysqli_query($con_db, $list_up);
		header("location:list_football.php");

}else if(isset($_GET['edit'])){

	if($_FILES["file_home"]["tmp_name"]!="" and $_FILES["file_visit"]["tmp_name"]!=""){
		$home_league=time()."_".$_FILES["file_home"]["name"];
		$visit_league=time()."_".$_FILES["file_visit"]["name"];

		@copy($_FILES["file_home"]["tmp_name"],"../post-img/".$home_league);
		@copy($_FILES["file_visit"]["tmp_name"],"../post-img/".$visit_league);

		$list_up="update `football_league` set `date_league`='".$_POST['date_league']."', `time_league`='".$_POST['time_league']."', `home_league`='".$_POST['home_league']."', `icon_home`='".$home_league."', `visit_league`='".$_POST['visit_league']."', `icon_visit`='".$visit_league."', `link_league`='".$_POST['link_league']."' where id='".$_GET['edit']."'";

	}else if($_FILES["file_home"]["tmp_name"]!=""){
		$home_league=time()."_".$_FILES["file_home"]["name"];
		@copy($_FILES["file_home"]["tmp_name"],"../post-img/".$home_league);
		$list_up="update `football_league` set `date_league`='".$_POST['date_league']."', `time_league`='".$_POST['time_league']."', `home_league`='".$_POST['home_league']."', `icon_home`='".$home_league."', `visit_league`='".$_POST['visit_league']."', `link_league`='".$_POST['link_league']."' where id='".$_GET['edit']."'";

	}else if($_FILES["file_visit"]["tmp_name"]!=""){
		$visit_league=time()."_".$_FILES["file_visit"]["name"];
		@copy($_FILES["file_visit"]["tmp_name"],"../post-img/".$visit_league);

		$list_up="update `football_league` set `date_league`='".$_POST['date_league']."', `time_league`='".$_POST['time_league']."', `home_league`='".$_POST['home_league']."', `visit_league`='".$_POST['visit_league']."', `icon_visit`='".$visit_league."', `link_league`='".$_POST['link_league']."' where id='".$_GET['edit']."'";

	}else{

		$list_up="update `football_league` set `date_league`='".$_POST['date_league']."', `time_league`='".$_POST['time_league']."', `home_league`='".$_POST['home_league']."', `visit_league`='".$_POST['visit_league']."', `link_league`='".$_POST['link_league']."' where id='".$_GET['edit']."'";
	}

	mysqli_query($con_db, $list_up);
		header("location:list_football.php");


}else if(isset($_GET['del'])){

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			//select img, vdo
			$sp="select * from football_league where id='".$_POST["chkDel"][$i]."' ";
			$rep=mysqli_query($con_db, $sp);
			$rp=mysqli_fetch_row($rep);
			//ลบรูป
			$home_league="../post-img/$rp[4]";
			$icon_visit="../post-img/$rp[6]";
			@unlink ($home_league);
			@unlink ($icon_visit);
			$del_post="delete from football_league where id='".$_POST["chkDel"][$i]."' ";
			mysqli_query($con_db, $del_post);
		}
	}
		header("location:list_football.php");


}else if(isset($_GET['update'])){

		$list_up="update `setup_football` set `status`='".$_GET['status']."' where id='".$_GET['update']."'";
	mysqli_query($con_db, $list_up);
		header("location:list_football.php");


}

?>
