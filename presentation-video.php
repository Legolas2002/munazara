<?php include 'header.php'; ?>
<br><br>
<div class="container">
	<div style="padding-left: 160px;">
		<div class="alert alert-success col-lg-6">
			<p><b>Videonuz tarafımıza iletilmiştir.Teşekkür ederiz.</b></p>
		</div>
		<h4>Konu <span> :<?php echo $_GET['konu']; ?></span></h4>
		<h4>Tarafı <span> :<?php echo $_GET['tarafi']; ?></span></h4>
	</div>
	<br>

	<center><video controls="" width="800">

		<source src=video<?php echo $_GET['video']; ?> type=video/mp4>
		</video></center>
	</center><br>
	

</div>

<?php include 'footer.php'; ?>
