<?php
	header("content-type:text/html; charset=utf-8");
	require ("config.php");
	require ("class.php");
	$db=new db;
	$db -> connect_db($dbhost,$dbuser,$dbpassword,$dbname);
	//$sql="select * from zhuce";
	//$row=$db -> query($sql);
	//while ($result=$db -> mysql_row($row)){
		//print_r ($result) ;
	//}
	$textname = $_POST['textname'];
	$picname=$_FILES['filename']['name'];
	//$db=new db;
	$name=$db->picup($picname);
	$end=substr($name , 1);
	if(strpos($type , $end)){
	//echo $textname ;
	//echo $name;
	//echo "<br>";
	$uppicname=(string)date("Y").(string)date("m").(string)date("d").(string)date("h").(string)date("i").(string)date("s").$name;
	//echo $uppicname ;
	$picname=$uppicname;
	$uploadfile=$filename.$picname ;
	if (move_uploaded_file($_FILES['filename']['tmp_name'],$uploadfile)){
		$sql_up="INSERT INTO `photo` SET `filename`='$uppicname', `textname`='$textname'";
		if($db->query($sql_up)){
			echo "上传成功";
			header("location:pic.php");

			}else{
				"上传失败";
			}


	}
	}else{
		echo "上传得格式不正确";


	}
?>
 












