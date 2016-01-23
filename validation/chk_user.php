<?php
//$request = trim($_POST['user']);
$request = urldecode(trim($_POST['user']));
//echo $request;
//$request = "月光光";
//sleep(2);
usleep(150000);
$users = array('月光光', 'Peter', 'Peter2', 'helloweba');
$valid = 'true';
foreach($users as $user) {
	if( strtolower($user) == $request )
		$valid = 'false';
}
echo $valid;

?>