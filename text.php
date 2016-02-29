<?php
$url = 'http://www.baidu.com/s?wd=儿科';
$file = file_get_contents($url);
echo $file;
exit;
//$pattern = '(<div id="[0-9]{4}")([\s\S]*)(<div class="result)';
//preg_match('/<div id="content_left">[\s\S]*<div style="clear:both;height:0;">/', $file,$matches );
//print_r($matches[0]);
//exit;
//preg_match('/([\s\S]*)/',$file,$matches);

$str = 'hypertext language programming';
$chars = preg_split('/<div id="content_left">/', $file);
print_r($chars);
exit;

$pattern = '/<body link="#0000cc">[\s\S]*<\/body>/';
preg_match('/<body link="#0000cc">/',$file,$matches);
echo $matches;
exit;

$msg = preg_replace('/<div id="content_left">/is', 'sssss', $file); 
//echo $msg;
//exit;

$msg2 = preg_replace('/sssss/is', '', $msg);


echo $msg2;
exit;


$msg2 = preg_replace('/<div id="content_left">[\s\S]*<div style="clear:both;height:0;">/is', '<div id="content_left">', $file); 

echo $msg;
echo $msg2;
exit;

print_r($matches);
//echo $file;



?>
<?php

//$str = 'foobar: 2008';

//preg_match('/(?P<name>\w+): (?P<digit>\d+)/', $str, $matches);

/* 下面例子在php 5.2.2(pcre 7.0)或更新版本下工作, 然而, 为了后向兼容, 上面的方式是推荐写法. */
// preg_match('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);

//print_r($matches);

?> 