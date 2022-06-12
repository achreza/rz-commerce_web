<?php
include "../config/koneksi.php";
$namasize = $_POST['namasize'];


$sql = "INSERT INTO `size` (`ukuran`) VALUES ('$namasize');";

$a = $koneksi->query($sql);

header("location: ../views/input_size_view.php");
