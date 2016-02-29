<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV='refresh' CONTENT='3600;URL=baidu.php'>

<title>注册成功页面</title>
</head>

<body>

<?php
		if($_SESSION['user']){

echo "注册成功".$_SESSION['user'];
}else{
echo "注册失败";

}
?>
</body>
</html>

