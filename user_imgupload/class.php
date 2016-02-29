<?php
	class db{
			function connect_db($dbhost,$dbuser,$dbpassword,$dbname){
				if(!@mysql_connect($dbhost, $dbuser, $dbpassword)){
					die("不能链接数据库");
				}
				return $this->selectdb($dbname);	
			}
			function selectdb($dbname){
				return mysql_select_db($dbname);
				 
			}

			function query($sql){
				mysql_query("set names utf8");
				$sql=mysql_query($sql);
				return $sql ;
			}
			function mysql_row($row){
				$result=mysql_fetch_row($row);
				return $result ;
			}
			function mysql_nums($nums){
				$nums=mysql_num_rows($nums);
				return $nums ;

			}

			function picup($filename){
					//echo "baidu";
					//return substr(strrchr($filename, '.'), 1);
					return strrchr($filename , ".");
				}
			function picture($pic){
			}
}
	
$db=new db;
$db->connect_db($dbhost,$dbuser,$dbpassword,$dbname);

?>