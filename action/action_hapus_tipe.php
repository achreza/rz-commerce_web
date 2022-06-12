<?php
include "../config/koneksi.php";
$id = $_GET['id'];



$sql = "DELETE FROM tipe where id_tipe = '$id'";

$a = $koneksi->query($sql);

header("location: ../views/input_tipe_view.php");
