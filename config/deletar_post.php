<?php 
	require_once('conexao.php');
	
	$id_fotos=$_GET['fotos_id'];
	$id_mensagem = $_GET['id'];

	$res = mysql_query("SELECT *FROM fotos")or die(mysql_error());
	$exibe = mysql_fetch_assoc($res);
	if($exibe>0){
		$thumb = $exibe['fotosThumb'];
		$original = $exibe['fotosOrig'];
		$main = $exibe['fotosDelete'];
		unlink('../photobooth2/uploads/main/'.$main);
		unlink('../photobooth2/uploads/original/'.$original);
		unlink('../photobooth2/uploads/thumbs/'.$thumb);
	}
	$result = mysql_query("DELETE FROM fotos WHERE fotos_id = '".$id_fotos."'") or die(mysql_error());
	
	echo "<script>window.location.href='../index.php';</script>";
?>