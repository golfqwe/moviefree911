<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION['admin_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
//del
	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			//select img, vdo
			$sp="SELECT img, file_vdo FROM post WHERE id='".$_POST["chkDel"][$i]."' ";
			$rep=mysqli_query($con_db, $sp) or die("ERROR $sp บรททัด389");
			$rp=mysqli_fetch_row($rep);
			//ลบรูป
			$partimg="../post-img/$rp[0]";
			@unlink ($partimg);
			//ลบวีดีโอ
			$partvdo="../vdo/$rp[1]";
			@unlink ($partvdo);
			
			//del post
			$del_post="delete from post where id='".$_POST["chkDel"][$i]."' " or die ("ERROR $del post");
mysqli_query($con_db, $del_post);
    $del_post="delete from category_movie where id_movie='".$_POST["chkDel"][$i]."' " or die ("ERROR $del post");
    mysqli_query($con_db, $del_post);
		}
	}
//mysqli_close();
echo "<meta http-equiv='refresh' content='0;url=list-admin-movie.php'>"; 
?>
</body>
</html>
