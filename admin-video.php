<?php 
ob_start();
session_start();

include 'connection/baglan.php';

$videolar=$db->prepare("SELECT * FROM video");
$videolar->execute();

?>
<ul class="list-group">
	<?
	while ($video_list=$videolar->fetch(PDO::FETCH_ASSOC)) { ?>

		<li class="list-group-item d-flex justify-content-between align-items-center">
			<a href="gelen-videolar?id=<?echo $video_list['id']?>"><?php echo $video_list['konu']; ?></a>	
		</li>


	<? } ?> 

	