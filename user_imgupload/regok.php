<?php/*
	用来处理用户登录,用户注册,用户注销;
*/
?>
<?php
	session_start();	
	header("content-type:text/html;charset=utf-8 ");
		require ("config.php");
		require ("class.php");
		//处理提交的标单
		switch($_GET['action']){
		case "login";
		$name = $_POST['name'];
		$password=$_POST['password'];
		$sql="select name , password from user where name='$name'&& password='$password' ";
		$row=$db->query($sql);
		if($db->mysql_nums($row)){
		$rult=$db->mysql_row($row);
			$_SESSION['name']=$rult[0];
			echo $_SESSION['name'];	
			header("Location:pic.php");
		}else{
			echo "登录失败";
			header("Location:./");
		}
		//echo $name ;

		break ;
				
		case "add";
		//echo "book";
		$name     = $_POST['name'];
		$password = $_POST['password'];
		$mail     = $_POST['mail'];
		$xie      = $_POST['xie'];
		$diz      = $_POST['diz'];
		$number   = $_POST['number'];
		$db= new db ;
		$db->connect_db($dbhost,$dbuser,$dbpassword,$dbname) ;
		//insert 不是inster
		$sql="insert into user set name='$name' , password='$password' , mail='$mail' , xie='$xie' , diz='$diz' , number=$number";
		//$sql="INSERT INTO `user` SET `name`='$name', `password`='$password', `mail`='$mail', `xie`='$xie', `diz`='$diz', `number`=$number";
		//echo "ok";
		if($db->query($sql)){
		//session_register("user");
		$_SESSION['user']=$name ;
		//$user=$_SESSION['user'];
		//header("location: ".$_SERVER["HTTP_REFERER"]);
		header("Location:indexlogin.php");
		}else{
			echo "注册失败";

		}
		break;
		case "out";
		session_unset();
		header("Location:index.htm");
		default:
			header("Location:./");
	}
?>