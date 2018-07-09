<?php include 'header.php'; 

ob_start();
session_start();

$konular=$db->prepare("SELECT * FROM konu where id=:id");
$konular->execute(array(
	'id' => $_GET['id']
));
$konu_list=$konular->fetch(PDO::FETCH_ASSOC);
$konu_adi=$konu_list['ad'];
$bir=$konu_list['tarafi'];
$iki=$konu_list['tarafi2'];
?>

<body style="background-color: #f0f0f0;height: 100%;">
	<section class="container" style="height: 100%;"><br><br><br>		
		<div style="background-color: #57afe8;height: 100%;" class="bd-example bd-example-tabs rounded">
			<div class="tab-content" id="pills-tabContent"><br><br><br>
				<div style="padding-left: 40px;padding-right: 40px;" class="container">
					<center>
						<div class="row">
							<h4></h4>
							<div class="col-sm-4" style="padding-top: 30px;">
								<a href="rules?tarafi=<?echo $bir?>&konu=<?php echo $konu_adi ?>"><button  type="button" class="col-lg-12 btn btn-default btn-md" style="background-color: #262626;color: white;"><b><?php echo $bir ?></b></button></a>
							</div>
							<div class="col-sm-4">
								<img style="width: 40%;" src="vs.png">
							</div>
							<div class="col-sm-4" style="padding-top: 30px;">
								<a  href="rules?tarafi=<?echo $iki?>&konu=<?php echo $konu_adi ?>"><button  onclick="myFunction()"  class="col-lg-12 btn btn-default btn-md" style="background-color: yellow;"><b><?php echo $iki ?></b></button></a>
							</div>
						</div></center><br><br>
						<div class="col-sm-12">
							<center><h2 style="color: white;">Tarafını Seç Videonu Gönder</h2></center>		
						</div>
					</div><br><br><br>
				</div>
			</div>
		</section>
	</body>
	<?php include 'footer.php'; ?>