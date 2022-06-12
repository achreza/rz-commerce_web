<?php
session_start();

include "../config/koneksi.php";
$nama = $_SESSION['username'];
$id = $_GET['user'];
$total = $_GET['total'];

$sql = "INSERT INTO `pembayaran` (`user`, `total`, `tanggal`) VALUES ('$id', '$total', NOW());";

$a = $koneksi->query($sql);

$sql2 = "DELETE from keranjang where id_user = $id;";

$b = $koneksi->query($sql2);

$isilog = $nama . " Membeli Barang Dengan Total Bayar Rp." . $total . " ";

$sql3 = "INSERT INTO `logs` (`isi`, `tanggal`) VALUES ('$isilog', NOW());";

$c = $koneksi->query($sql3);

header("location:../views/keranjang_view.php");
