jquery.validation 表单验证
http://www.helloweba.com/view-blog-53.html



实例讲解表单验证插件Validation的应用

helloweba.com 作者：月光光 时间：2010-09-17 11:41 标签： validation  jquery插件  表单验证 

这才是你要学的！0基础4个月成为Web前端工程师，保就业！（最新版）

jquery.Validation是一款优秀的jquery插件，它能对客户端表单进行验证，并且提供了许多可以定制的属性和方法，良好的扩展性。现在结合实际情况，我把项目中经常要用到的验证整理成一个实例DEMO，本文就是通过讲解这个实例来理解Validation的应用。
实例讲解表单验证插件Validation的应用
查看演示 下载源码

本实例涉及到的验证有：

用户名：长度、字符验证，重复性ajax验证（是否已存在）。

密码：长度验证，重复输入密码验证。

邮件：邮件地址验证。

固定电话：中国大陆固定电话号码验证。

手机号：中国大陆手机号码验证。

网址：网站URL地址验证。

日期：标准日期格式验证。

数字：整数、正整数验证，数字范围验证。

身份证：大陆身份证号码验证。

邮政编码：大陆邮政编码验证。

文件：文件类型（后缀）验证，如只允许上传图片。

IP：IP地址验证。

验证码：验证码ajax验证。
使用方法：

1、准备jquery和jquery.validate插件

<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/jquery.validate.js"></script> 

2、准备CSS样式

页面样式我不再详述，大家可以自己写个样式，也可以参看DEMO的页面源代码。这里要强调的关键样式是要显示验证信息的样式：

label.error{color:#ea5200; margin-left:4px; padding:0px 20px;  
background:url(images/unchecked.gif) no-repeat 2px 0 } 
label.right{margin-left:4px; padding-left:20px; background: 
url(images/checked.gif) no-repeat 2px 0} 

3、XHTML

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
</table> 
</form> 

限于篇幅，本文的只截取了实例中HTML代码的一小部分，详细XHTML代码可参看页面DEMO源代码。值得一提的是，我在给了标签一个“required”类样式，下文将会提到它的作用。

4、应用Validation插件

调用Validation插件的方法：

$(function(){        
    var validate = $("#myform").validate({ 
         rules:{ //定义验证规则 
            ...... 
         }, 
         messages:{ //定义提示信息 
            ...... 
         } 
    }) 
}); 

rules:定义验证规则，key:value的形式，key是要验证的元素,value可以是字符串或对象。比如验证用户名的长度和不允许为空：

rules:{ 
  user:{ 
      required:true, 
      maxlength:16, 
      minlength:3 
  }, 
  ...... 
} 

其实我们在XHTML代码中可以直接指定input的class属性为required，作用是不允许为空，这样在JS部分就不用重复写了。同样的验证email等，直接设置input的class属性为email。

messages:定义提示信息，key:value的形式key是要验证的元素,值是字符串或函数，当验证不通过时提示的信息。

messages:{ 
  user:{ 
      required:"用户名不能为空！", 
      remote:"该用户名已存在，请换个其他的用户名！" 
  }, 
  ...... 
} 

本例中涉及的验证JS就是按照上面的规则进行编写的，Validation插件封装了好多基本的验证方式，如下：

required:true 必须有值，不能为空

remote:url 可以用于判断用户名等是否已经存在,服务器端输出true,表示验证通过

minlength:6 最小长度为6

maxlength:16 最大长度为16

rangelength:长度范围

range:[10,20] 数值范围在10-20之间

email:true 验证邮件

url:true 验证URL网址

dateISO:true 验证日期格式'yyyy-mm-dd'

digits:true 只能为数字

accept:'gif|jpg' 只接受gif或jpg为后缀的图片。常用于验证文件的扩展名

equalTo:'#pass' 与哪个表单字段的值相等，常用于验证重复输入密码

此外，我还根据项目实际情况扩展了几个验证，验证的代码在validate-ex.js，使用前需要先加载这个JS。它能提供以下验证：

userName:true 用户名只能包括中文字、英文字母、数字和下划线

isMobile:true 手机号码验证

isPhone:true 大陆手机号码验证

isZipCode:true 邮政编码验证

isIdCardNo:true 大陆身份证号码验证

ip:true IP地址验证

以上提供的验证方式基本上满足我们在大多数项目中的需求。如果其他特殊验证需求，可以扩展，方法如：

jQuery.validator.addMethod("isZipCode", function(value, element) {     
  var zip = /^[0-9]{6}$/;     
  return this.optional(element) || (zip.test(value));     
}, "请正确填写您的邮政编码!");  

疑难问题解决

1、在项目中遇到在验证用户名是否存在时，发现不支持中文输入验证。我的解决办法是给用户名进行encodeURIComponent编码，后台PHP再对接受的值进行urldecode解码

user:{ 
    remote: {  
         url: "chk_user.php", //服务端验证程序 
         type: "post", //提交方式 
         data: { user: function() {  
             return encodeURIComponent($("#user").val()); //编码数据 
         }}  
    }  
}, 

服务端验证程序chk_user.php的代码：

<?php 
$request = urldecode(trim($_POST['user'])); 
usleep(150000); 
$users = array('月光光', 'jeymii', 'Peter', 'helloweba'); 
$valid = 'true'; 
foreach($users as $user) { 
    if( strtolower($user) == $request ) 
        $valid = 'false'; 
} 
echo $valid; 
?> 

我使用的服务端程序是PHP，您也可以使用ASP，ASP.NET，JAVA等。此外本例为了演示，用户名数据是直接写在服务端的，真正的应用是从数据库里取出的用户名数据，来和接收客户端的数据进行对比。

2、在验证checkbox和radio控件时，验证信息不会出现在最后的控件文本后面，而是直接跟在第一个控件的后面，不符合我们的要求。

解决办法是在validate({})追加以下代码：

errorPlacement: function(error, element) { 
    if ( element.is(":radio") ) 
        error.appendTo ( element.parent() ); 
    else if ( element.is(":checkbox") ) 
        error.appendTo ( element.parent() ); 
    else if ( element.is("input[name=captcha]") ) 
        error.appendTo ( element.parent() ); 
    else 
        error.insertAfter(element); 
} 

3、重置表单。Form表单原始的重置方法是reset自带

<input type="reset" value="重 置" /> 

点击“重置”按钮，表单元素将会重置，但是再运行Validation插件后，验证的提示信息并没重置，就是那些提示信息没有消失。感谢Validation提供了重置表单的方法：resetForm()

$("input:reset").click(function(){ 
    validate.resetForm(); 
}); 

其他

1、本例中还涉及到验证码的判断方法，也是通过异步生成验证码和判断是否输入正确的，可以查看源码,官方网单独提供了一个实例：http://jquery.bassistance.de/validate/demo/captcha/

2、更多验证方法的应用请查看http://jqueryvalidation.org/
