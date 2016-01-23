<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery validation 验证</title>
<meta name="keywords" content="validation, jquery插件" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
<link rel="stylesheet" type="text/css" href="main.css" />
<style type="text/css">
.demo{width:850px; margin:10px auto; padding:20px; background:#fff; color:#333}
.input{width:220px; height:18px; padding:2px 2px 0 2px; border:1px solid #ccc}
.btn{width:68px; height:22px; border:none; background:url(images/btn.gif) no-repeat; cursor:pointer}
.mytable{width:760px; margin:20px auto; border:2px solid #ccc}
.mytable td{padding:4px 6px; border-bottom:1px dotted #d3d3d3; color:#333}
.mytable td p{line-height:16px; color:#999}
.table_title{height:30px; line-height:30px; background:#f7f7f7; font-weight:bold; font-size:14px}

label.error{color:#ea5200; margin-left:4px; padding:0px 20px; background:url(images/unchecked.gif) no-repeat 2px 0 }
label.right{margin-left:4px; padding-left:20px; background:url(images/checked.gif) no-repeat 2px 0}
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validate-ex.js"></script>
<script type="text/javascript">
$(function(){	   
	var validate = $("#myform").validate({
		rules:{
			user:{
				maxlength:16,
				minlength:3,
				userName:true,
				remote: { 
                   url: "chk_user.php", 
                   type: "post", 
                   data: { user: function() { return encodeURIComponent($("#user").val());}} 
               } 
			},
			pass:{
				maxlength:16,
				minlength:6
			},
			repass:{
				maxlength:16,
				minlength:6,
				equalTo:"#pass"
			},
			sex:"required",
			email:{email:true},
			tel:{isTel:true},
			phone:{isMobile:true},
			url:{url:true},
			birthday:"dateISO",
			years:{
				digits:true,
				range:[1,40]
			},
			idcard:"isIdCardNo",
			zipcode:"isZipCode",
			photo:{
				accept:"gif|jpg|png"
			},
			serverIP:"ip",
			captcha:{
				remote:"process.php"
			}
		},
		messages:{
			user:{
				remote:"该用户名已存在，请换个其他的用户名！"
			},
			repass:{
				equalTo:"两次密码输入不一致！"
			},
			sex:"请选择性别！",
			birthday:{
				dateISO:"日期格式不对!"
			},
			years:{
				number:"工作年限必须为数字！"
			},
			address:"请选择地区",
			photo:{
				accept:"头像图片格式不对！"
			},
			captcha:{
				remote:"验证码错误！"
			},
			low:" "
		},
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo ( element.parent() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.parent() );
			else if ( element.is("input[name=captcha]") )
				error.appendTo ( element.parent() );
			else
				error.insertAfter(element);
		},
	    success: function(label) {
		   label.html("&nbsp;").addClass("right");
	    }			  
	});	
	
	$("#getcode").click(function(){
		$imgstr="getcode.php?randcode="+Math.random();
		$(this).attr("src",$imgstr);
	});
	$("input:reset").click(function(){
		validate.resetForm();
	});
});
</script>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
</div>
<div id="main">
   <h2 class="top_title"><span>返回演示平台</span><a href="#">jquery validation 验证表单示例</a></h2>
   <div class="demo">
<p>注：以下表单仅供学习和交流，helloweba网站不会记录用户输入的信息，请放心使用。</p>
<form id="myform" action="#" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mytable">
  <tr class="table_title">
    <td colspan="2">jquery.validation 表单验证</td>
  </tr>
  <tr>
    <td width="22%" align="right">用户名：</td>
    <td><input type="text" name="user" id="user" class="input required" />
    <p>用户名为3-16个字符，可以为数字、字母、下划线以及中文</p></td>
  </tr>
  <tr>
    <td align="right">密码：</td>
    <td><input type="password" name="pass" id="pass" class="input required" />
    <p>最小长度:6 最大长度:16</p>
    </td>
  </tr>
  <tr>
    <td align="right">确认密码：</td>
    <td><input type="password" name="repass" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">性别：</td>
    <td><input type="radio" name="sex" value="1" /> 男 <input type="radio" name="sex" value="0" /> 女</td>
  </tr>
  <tr>
    <td align="right">E-mail：</td>
    <td><input type="text" name="email" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">固定电话：</td>
    <td><input type="text" name="tel" class="input required" />
    <p>格式如：0731-12345678</p></td>
  </tr>
  <tr>
    <td align="right">手机号码：</td>
    <td><input type="text" name="phone" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">网站：</td>
    <td><input type="text" name="url" class="input required" value="http://" /></td>
  </tr>
  <tr>
    <td align="right">出生日期：</td>
    <td><input type="text" name="birthday" class="input required" />
    <p>格式如：1990-10-01</p></td>
  </tr>
  <tr>
    <td align="right">工作年限：</td>
    <td><input type="text" name="years" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">身份证号码：</td>
    <td><input type="text" name="idcard" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">地区：</td>
    <td><select name="address" class="required">
      <option value="">请选择</option>
      <option value="1">长沙市</option>
      <option value="2">石河子市</option>
      <option value="3">北京市</option>
      <option value="4">东莞市</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">邮政编码：</td>
    <td><input type="text" name="zipcode" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">上传头像：</td>
    <td><input type="file" name="photo" class="required" />
    <p>头像为jpg,gif或者png格式的图片</p></td>
  </tr>
  <tr>
    <td align="right">服务器IP：</td>
    <td><input type="text" name="serverIP" class="input required" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="checkbox" name="low"  class="required" /> 我已阅读并接受用户协议
    </td>
  </tr>
  <tr>
    <td align="right">验证码：</td>
    <td><input type="text" name="captcha" class="input required" style="width:80px;" />
    <img src="getcode.php" id="getcode"  alt="看不清，点击换一张" align="absmiddle" style="cursor:pointer" />
    </td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td><input type="submit" class="btn" value="提 交" /> &nbsp; <input type="reset" class="btn" value="重 置" /></td>
  </tr>
</table>
</form>
</div>
</div>
<div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div>
</body>
</html>
