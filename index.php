<?php include 'header.php'; 

ob_start();
session_start();

$konular=$db->prepare("SELECT * FROM konu where online=:online");
$konular->execute(array(
	'online' => 1
));

$eski_konular=$db->prepare("SELECT * FROM konu where online=:online");
$eski_konular->execute(array(
	'online' => 0
));

?>

<body >
	<section class="container col-lg-9 col-xl-6 col-md-9 col-sm-12">
		<div align="center">
			<img class="img-fluid" src="img/ana-balon.png">
		</div>
	</section>
	<section class="container col-lg-9 col-xl-6 col-md-9 col-sm-12 ">
		<div class="bd-example bd-example-tabs">
			<div class="tab-content" id="pills-tabContent"><br>

				<!-- Button trigger modal -->
				<?php
				$kullanicilar=$db->prepare("SELECT * FROM kullanici where mail=:mail");
				$kullanicilar->execute(array(
					'mail' => $_SESSION['mail']
				));
				$kullanici_list=$kullanicilar->fetch(PDO::FETCH_ASSOC); 

				if ($kullanici_list['yetki']==2) {

					?>
					<a href="admin-video"><button class="btn btn-primary col-lg-2"><b>Gelen Videolar</b></button></a>
					<button type="button" class="btn btn-success col-lg-2 float-right" data-toggle="modal" data-target="#konuModal">
						<b>Ekle</b>
					</button><br><br><br>
					<!-- Modal -->
					<div class="modal fade" id="konuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Konu Ekle</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="POST">
										Konu Adı : <input type="text" name="ad"><br><br>
										Konu Adı 2 : <input type="text" name="ad2"><br><br>
										Taraf 1 : <input type="text" name="tarafi"><br><br>
										Taraf 2 : <input type="text" name="tarafi2"><br><br>
										Kalan Hak 1 : <input type="number" name="hak"><br><br>
										Kalan Hak 2 : <input type="number" name="hak2"><br><br>
										Konu Durumu : <br><select class="form-control" name="online" id="exampleSelect1">
											<option value="1">Online</option>
											<option value="0">Offline</option>
										</select>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
										<button type="submit" name="konuekle" class="btn btn-primary">Ekle</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php } else { } ?>
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center h-style">
				<h3><b>Güncel Konular</b></h3><br>
</li>
				
					<?php
					if (isset($_POST['konuekle'])) {

						$kaydet=$db->prepare("INSERT into konu set
							online=:online,	
							ad=:ad,
							tarafi=:tarafi,
							tarafi2=:tarafi2,
							hak=:hak,
							hak2=:hak2,
							alt_konu=:alt_konu
							");
						$insert=$kaydet->execute(array(
							'online' => $_POST['online'],
							'ad' => $_POST['ad'],
							'tarafi' => $_POST['tarafi'],
							'tarafi2' => $_POST['tarafi2'],
							'hak' => $_POST['hak'],
							'hak2' => $_POST['hak2'],
							'alt_konu' => $_POST['ad2']
						));

						if ($insert) {

							Header("Location:index?durum=ok");

						} else {

							Header("Location:index?durum=no");
						}

					}

					while ($konu_list=$konular->fetch(PDO::FETCH_ASSOC)) {

						if ($_GET['konusil']=="ok") {

							$sil=$db->prepare("DELETE from konu where id=:id");
							$kontrol=$sil->execute(array(
								'id' => $_GET['id']
							));

							if ($kontrol) {

								Header("Location:index?durum=ok");

							} else {

								Header("Location:index?durum=no");
							}

						}

						?>

						<li class="list-group-item d-flex justify-content-between align-items-center section-li">
							<a style="color: black;" href="chooseyourside.php?id=<?echo $konu_list['id']?>"><h5><?php echo $konu_list['ad']; ?></h5><span><?php echo $konu_list['alt_konu']; ?></span></a>
							
						</li>
						<? if ($kullanici_list['yetki']==2) {

							?>
							<a href="konu-duzenle?id=<?php echo $konu_list['id']; ?>"><li class="list-group-item d-flex justify-content-between align-items-center"><button type="button" class="btn btn-success">
								Düzenle
							</button><a>
								<a href="index?konusil=ok&id=<?php echo $konu_list['id']; ?>"><button type="button" class="btn btn-danger"><strong>Kaldır</strong></button></a>

							<?php } else {  } } ?>


						</ul><br><br>

					</div>	
				</div>
			</div>
		</section><br><br><br>
	</body>

	<?php include 'footer.php'; ?>

	<script type="text/javascript">
		ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>