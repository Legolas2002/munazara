<?php 
include 'connection/baglan.php'; 
$konular=$db->prepare("SELECT * FROM konu where id=:id");
$konular->execute(array(
	'id' => $_GET['id']
));
$konu_list=$konular->fetch(PDO::FETCH_ASSOC); 

if (isset($_POST['konuduzenle'])) {

	$kaydet=$db->prepare("UPDATE konu set

		ad=:ad,
		online=:online,
		tarafi=:tarafi,
		tarafi2=:tarafi2,
		hak=:hak,
		hak2=:hak2,
		alt_konu=:alt_konu
		where id={$_GET['id']}
		");

	$insert=$kaydet->execute(array(

		'ad' => $_POST['ad'],
		'online' => $_POST['online'],
		'tarafi' => $_POST['tarafi'],
		'tarafi2' => $_POST['tarafi2'],
		'hak' => $_POST['hak'],
		'hak2' => $_POST['hak2'],
		'alt_konu' => $_POST['alt_konu']

	));

	if ($insert) {

		header("Location:index?durum=ok");
		exit;
		//echo "kullanıcı eklendi...";
	}
	else {

		header("Location:index?durum=no");
		exit;
		//echo "kullanıcı eklenemedi...";
	}
}
?>

<form action="" method="POST">
	Konu adı : <input type="text" name="ad" value="<?php echo $konu_list['ad']; ?>"><br><br>
	Konu adı 2 : <input type="text" name="alt_konu" value="<?php echo $konu_list['alt_konu']; ?>"><br><br>
	Taraf 1 : <input type="text" value="<?php echo $konu_list['tarafi']; ?>" name="tarafi"><br><br>
	Taraf 2 : <input type="text" value="<?php echo $konu_list['tarafi2']; ?>" name="tarafi2"><br><br>
	Kalan Hak 1 : <input type="text" value="<?php echo $konu_list['hak']; ?>" name="hak"><br><br>
	Kalan Hak 2 : <input type="text" value="<?php echo $konu_list['hak2']; ?>" name="hak2"><br><br>
	<select id="heard" class="form-control" name="online">
		<option value="1" <?php echo $konu_list['online'] == '1' ? 'selected=""' : ''; ?>>Online</option>

		<option value="0" <?php if ($konu_list['online']==0) { echo 'selected=""'; } ?>>Offline</option>
	</select><br><br>
	<input type="submit" name="konuduzenle" value="Düzenle">
</form>

