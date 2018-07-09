<?php
session_start();
ob_start();

include 'header.php'; 
$tarafi=$_GET['tarafi'];
$konu=$_GET['konu'];

if (isset($_POST['videogonder'])) {

	$uploads_dir = 'video';
	@$tmp_name = $_FILES['video']["tmp_name"];
	@$name = $_FILES['video']["name"];
	//video isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
	$kaydet=$db->prepare("INSERT INTO video SET
		tarafi=:tarafi,
		mail=:mail,
		video=:video,
		konu=:konu
		");
	$insert=$kaydet->execute(array(
		'tarafi' => $tarafi,
		'mail' => $_POST['mail'],
		'video' => $refimgyol,
		'konu' => $_GET['konu']
	));

	if ($insert) {

		Header("Location:presentation-video?durum=sendvideo&konu=$konu&tarafi=$tarafi&video=$refimgyol");

	} else {

		Header("Location:index?durum=no");
	}

}

?>

<section>
	<div class="container"><br><br><br>
		<center>
			<p style="font-size: 30px;"><b>Videonu Gönder Sen de Münazaraya Katıl</b></p><br>
			<div class="form-group col-lg-4">
				<form action="" method="POST" enctype="multipart/form-data">
					
						<label for="email">Mail Adresiniz </label>
						<input type="email" name="mail" class="form-control" id="email">
					<br>
					<input type="file" name="video" style="margin-left: 60px;" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"><br>
					<input class="btn btn-success col-lg-6"  type="submit" name="videogonder" value="Gönder">	
				</form>
			</div>
		</center><br><br>
		
	</div>
</section>

<?php include 'footer.php'; ?>