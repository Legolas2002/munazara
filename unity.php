<?php include 'connection/baglan.php'; 

ob_start();
session_start();

if (isset($_POST['kullanicigiris'])) {
	
	$mail=htmlspecialchars($_POST['mail']); 
	$parola=md5($_POST['parola']); 


	$kullanicisor=$db->prepare("SELECT * from kullanici where mail=:mail and parola=:parola and durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $mail,
		'parola' => $parola,
		'durum' => 1
	));

	$say=$kullanicisor->rowCount();

	if ($say>=1) {

		$_SESSION['mail']=$mail;

		header("Location:index?durum=basarili-giris");
		exit;

	} else {

		header("Location:index?durum=basarisiz-giris");
		exit;
	}
}
?>

<form action="" method="POST">
	<input type="email" name="mail">
	<input type="password" name="parola">
	<input type="submit" value="Giriş Yap" name="kullanicigiris">
</form>

<?php 

?>