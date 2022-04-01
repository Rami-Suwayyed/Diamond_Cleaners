<?php 
 $DB_host = "localhost";
 $DB_user = "root";
 $DB_pass = "";
 $DB_name = "shop";
		try
		{
		     $connect = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset=utf8",$DB_user,$DB_pass);
		     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
		     echo $e->getMessage();
		}

?>