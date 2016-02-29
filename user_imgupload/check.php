<?php
header("content-type:text/html; charset=utf-8");
$checkname=$_GET['checkname'];
require ("config.php");
require ("class.php");
$db=new db;
$db->connect_db($dbhost,$dbuser,$dbpassword,$dbname);
$sql="select * from user where name='$checkname'";
$rult=$db->query($sql);
if($num=$db->mysql_nums($rult)){
	
		//echo "该用户已经" . $checkname . "存在" ;
?>
		<script type="text/javascript" language="javascript">
		 <!--
		alert("该用户已经存在");
		parent.window.close();
<?php

		header("location:reg.php");
?>
		//window.location.href="http://localhost/test/reg.php";
		
		//-->
		</script>
<?php
}else{
		header("location:reg.php?cation=$checkname");


}
?>
