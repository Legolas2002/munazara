<?php 

try {
	
	$db=new PDO("mysql:host=localhost;dbname=munazara;charset=utf8",'root','localhost');

	//echo "Veritabanı bağlantısı başarılı";
	
}
catch (PDOExpection $e) {

	echo $e->getMessage();


}


?>