<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
if(isset($_GET['edit_ep'])){

	//del post
	$del_post="delete from movie_series where id_series='".$_GET["del"]."' " or die ("ERROR $del post");
	mysqli_query($con_db, $del_post);
echo "<meta http-equiv='refresh' content='0;url=edit-series.php?id=".$_GET["series"]."&edit_ep'>"; 
}else 
if(isset($_GET['del'])){
	for($i=0;$i<count($_POST["chkDel"]);$i++){
		if($_POST["chkDel"][$i] != ""){

			$del_series="delete from movie_series where movie_id='".$_POST["chkDel"][$i]."' " or die ("ERROR $del post");
			mysqli_query($con_db, $del_series);

			$del_post="delete from post where id='".$_POST["chkDel"][$i]."' " or die ("ERROR $del post");
			mysqli_query($con_db, $del_post);
		}
	}
echo "<meta http-equiv='refresh' content='0;url=list-series.php'>"; 

}else{echo "<meta http-equiv='refresh' content='0;url=list-series.php'>"; 
}

?>
