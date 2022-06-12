<?php
include "../config/koneksi.php";
$namasize = $_POST['namasize'];
$id = $_GET['id'];


$sql = "UPDATE `size` SET `ukuran`='$namasize' WHERE  `id_size`='$id'";

$a = $koneksi->query($sql);

header("location: ../views/input_size_view.php");
