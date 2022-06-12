<?php
include "../config/koneksi.php";
$namatipe = $_POST['namatipe'];


$sql = "INSERT INTO `tipe` (`nama_tipe`) VALUES ('$namatipe');";

$a = $koneksi->query($sql);

header("location: ../views/input_tipe_view.php");
