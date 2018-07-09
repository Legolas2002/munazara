<?php include 'header.php'; 
$haklar=$db->prepare("SELECT * FROM kalan_hak where konu_id=:konu_id");
$haklar->execute(array(
	'konu_id' => $_GET['id']
));
$kalan_hak=$haklar->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['duzenle'])) {

	$kaydet=$db->prepare("UPDATE kalan_hak set

		tarafi=:tarafi,
		tarafi2=:tarafi2,
		where konu_id={$_GET['id']}
		");

	$insert=$kaydet->execute(array(

		'tarafi' => $_POST['tarafi'],
		'tarafi2' => $_POST['tarafi2'],


	));

	if ($insert) {

		header("Location:chooseyourside?durum=ok");
		exit;

	}
	else {

		header("Location:chooseyourside?durum=no");
		exit;

	}
}
?>

<form action="" method="POST">
	<p>Son <input type="number" value="<?php echo $kalan_hak['tarafi'] ?>" name="tarafi"> Video!</p>
	<p>Son <input type="number" value="<?php echo $kalan_hak['tarafi2'] ?>" name="tarafi2"> Video!</p>
	<input type="submit" name="duzenle" value="Kaydet">
</form>