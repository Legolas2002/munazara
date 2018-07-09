<?php 
ob_start();
session_start();

include 'header.php';

$videolar=$db->prepare("SELECT * FROM video where id=:id");
$videolar->execute(array(
	'id' => $_GET['id']
));

?>
<div class="container">
	<?
	while ($video_list=$videolar->fetch(PDO::FETCH_ASSOC)) { 

		if ($_GET['videosil']=="ok") {

			$videoad=$video_list['video'];

			$videosil=unlink("video/$videoad");

			$sil=$db->prepare("DELETE from video where id=:id");
			$kontrol=$sil->execute(array(
				'id' => $_GET['id']
			));

			if ($kontrol) {

				Header("Location:index?durum=ok");

			} else {

				Header("Location:index?durum=no");
			}

		}

		if ($_GET['banla']=="ok") {

			$mail=$video_list['mail'];

			$sil=$db->prepare("DELETE from video where id=:id");
			$kontrole=$sil->execute(array(
				'id' => $_GET['id']
			));

			$sil=$db->prepare("DELETE from kullanici where mail=:mail");
			$kontrol=$sil->execute(array(
				'mail' => $mail
			));

			if ($kontrol) {

				Header("Location:index?durum=ok");

			} else {

				Header("Location:index?durum=no");
			}

		}


		?>

		<div><br><br>
			<div class="row">

				<div class="col-lg-4 float-right">
					<a href="gelen-videolar?videosil=ok&id=<?php echo $video_list['id']; ?>"><button type="button" class="btn btn-danger"><strong>Kaldır</strong></button></a>
				</div>
			</div>
			<br>
			<div class="card" style="width: 1100px;height: 700px;">
				<div class="card-body">

					<h2 style="padding-left: 12px;">Konu : <?php echo $video_list['konu']; ?><span style="font-size: 28px;" class="float-right">Gönderen : <?php echo $video_list['mail']; ?></span></h2>
					<h2 style="padding-left: 12px;">Tarafı : <?php echo $video_list['tarafi']; ?></h2><br>
					<p style="font-size: 28px;padding-left: 12px;">Video Adı : <?php echo $video_list['video']; ?></p><br><br>

					
					<center><video controls="" style="width: 900px;height: 450px;"><source src="video/<?php echo $video_list['video']; ?>" type="video/mp4"></video></center><br><br><br><br><br><br><br><br><br>

					</div>
				</div>
			</div>

		<?php } ?>

	</div>