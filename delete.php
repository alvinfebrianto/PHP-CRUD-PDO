<?php
require_once('koneksi.php');
	// script untuk hapus data barang berdasarkan id barang
	$id = $_GET['id'];
	$sql = "DELETE FROM tabel_barang WHERE id_barang= ?";
	$row = $koneksi->prepare($sql);
	$row->execute(array($id));
	
	header("Location: index.php");
	exit;
?>