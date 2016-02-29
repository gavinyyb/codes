<?php
	session_start();
	header("content-type:text/html; charset=utf-8");
?>

<body >
<script type="text/javascript" language="javascript">
<!--
	function checkname(){
		if(document.leave_word.filename.value==""){
				alert("图片名不能为空");
				return false ;
		}
		if(document.leave_word.textname.value==""){
			alert("给图片加说明文字把");
			return false ;
		}
		if(document.leave_word.max_file_size.value<20000){
			alert("文件太大了");
			return false ;
			

		}

	}
//-->
</script>
<form method="post" action="mian.php" enctype="multipart/form-data" name="leave_word" onsubmit="return checkname()">
<?php
		if(isset($_SESSION['name'])){

?>

<table align="center" style="margin-top:50px;">
	<tr>
		<td style="font-size:12px;">用户<?=htmlspecialchars($_SESSION['name'])?></td>
		<td height="23">	<a href="regok.php?action=out">注销</a></td>
		</tr>

		<tr>
		<td style="font-size:12px;">上传文件：</td>
		<td height="23">
		 <input type="hidden" name="MAX_FILE_SIZE" value="20000">		
		<input type="file" name="filename" style="height:20px; line-height:16px; width:300px;">	</td>
		</tr>
		<tr>
		<td style="font-size:12px;">描述：</td>
		<td height="23"><textarea name="textname" style="height:100px; width:300px;"></textarea></td>
		</tr>
		<tr>
		<td></td><td height="23" align="center">
		<input type="image" src="images/input01.gif" />
		<img src="images/input02.gif" style="cursor:hand" onClick="document.all.leave_word.reset()" /></td>
	</tr>

</table>
<?php

}else{
	echo "登录失败";

}


?>

</form>
</body>

