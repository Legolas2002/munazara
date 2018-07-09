<?php include 'header.php'; 

$konu=$_GET['konu'];
$tarafi=$_GET['tarafi'];
?>

<div class="container">
	<div class="card-columns">

		<div class="card bg-light" style="margin-left: 106%;margin-top: 50%;">
			<h4 style="padding-left: 18px;padding-top: 5px;">Kurallar</h4><hr>
			<div class="card-body">
				<li>Slenderman evime girdi!</li>
				<li>Bi like atarsanız...</li>
				<li>Ne için Buradayım ?</li>
			</div><br>
			<div align="center">
				<a href="sendvideo?konu=<?php echo $konu; ?>&tarafi=<?php echo $tarafi; ?>"><b>Okudum Kabul Ediyorum</b></a>	
			</div><br>
		</div>

	</div>
	
</div>

<?php include 'footer.php'; ?>