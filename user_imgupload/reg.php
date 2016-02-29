<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户注册</title>
<link href="style/css.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript" type="text/javascript">
	function check(){
		if(document.checkform.name.value==""){
			alert("请输入用户名");
			return false ;
		}
		if(document.checkform.password.value==""){
			alert("请输入您的密码");
			return false ;
		}
		if(document.checkform.psd.value==""){
			alert("请输入确认密码");
			return false ;
		
		}
		if(document.checkform.psd.value!="" && document.checkform.password.value!=document.checkform.psd.value){
			alert("两次密码不一样，请确定");
			return false ;
		}
		if(document.checkform.mail.value.charAt(0)=="." ||document.checkform.mail.value.charAt(0)=="@"||document.checkform.mail.value.indexOf('@' , 0)==-1||document.checkform.mail.value.indexOf('.' ,0)==-1 ||document.checkform.mail.value.lastIndexOf("@")==document.checkform.mail.value.length-1||document.checkform.mail.value.lastIndexOf(".")==document.checkform.mail.value.length-1){
			alert("E-mail格式不正确");
			return false ;
		}else if
		(document.checkform.xie.value=="请选择"){
			alert("请选择您的省份");
			return false ;
		}
		if(document.checkform.diz.value==""){
			alert("请详细填写您的地址");
			return false ;
		}
		if(document.checkform.number.value==""){
			alert("邮编一定要填阿");
			return false ;
		}
		function getLocation(select)  {
		   var count=select.options.length; 
		     return count; 
		}
	}

</script>
<script language="javascript" type="text/javascript">
		function checkname(){
		//var checkname=document.checkform.name.value;
		var name=document.checkform.name.value;
		window.open("check.php?checkname="+ name);
		parent.window.close() ;
		}


</script>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="380" border="0" align="center" cellpadding="0" cellspacing="0" widtd="300"  >
  <tr>
    <td height="16" background="images/midl.jpg">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="pbt20">
	<form name="checkform" method="post" action="regok.php?action=add" onSubmit="return check()">
		 <table border="0" align="center" cellpadding="0" cellspacing="0" widtd="230">
			 <tr>
				<td width="55" height="23" scope="col">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td>
				<td width="220" scope="col">
<?php
			if($_GET['cation']){
				$name=$_GET['cation'];
				?>
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td ><?=$name?>： &nbsp; 您可以用</td>
				  <input type="hidden" name="name" value="<?=$name?>">
				</tr>
			 </table>
				<?php
			}else{
?>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="130"><input type="text" name="name" class="ipt120"></td>
				  <td><img src="images/chek.gif" width="64" height="16" style="cursor:hand" onClick="return checkname()"></td>
				</tr>
			 </table>			 

<?php

			}

?>	  
		  </td>
        </tr>
        <tr>
          <td height="23" scope="col">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
          <td scope="col"><input type="password" name="password" class="ipt120"></td>
        </tr>
        <tr>
          <td height="23" scope="col">确认密码：</td>
          <td scope="col"><input type="password" name="psd" class="ipt120"></td>
        </tr>
        <tr>
          <td height="23" scope="col">E-mail：</td>
          <td scope="col"><input type="text" name="mail" class="ipt120"></td>
        </tr>
        <tr>
          <td height="23" scope="col">来&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;自：</td>
          <td scope="col">
		  <select name="xie"class="ipt120"  onchange="select.options.length=10">
            <option value="请选择">请选择</option>
            <option value="北京">北京</option>
            <option value="上海">上海</option>
            <option value="天津">天津</option>
            <option value="河北">河北</option>
            <option value="广州">广州</option>
          </select>
          </td>
        </tr>
        <tr>
          <td height="23" scope="col">详细地址：</td>
          <td scope="col"><input type="text" name="diz" class="ipt180"></td>
        </tr>
        <tr>
          <td height="23" scope="col">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编：</td>
          <td scope="col"><input type="text" name="number" class="ipt80"></td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="center" scope="col">
		    <input type="submit" name="Submit" value="提交" class="submit">
            &nbsp;&nbsp;
            <input type="reset" name="Submit2" value="重置"  class="submit"></td>
          </tr>
      </table>
	</form>
	</td>
  </tr>
  <tr>
    <td height="16" background="images/midl.jpg">&nbsp;</td>
  </tr>
</table>



<?php
echo $_SESSION['user'];
?>
</body>
</html>
