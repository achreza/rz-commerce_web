<?php
include "../config/koneksi.php";
$id = $_GET['id'];



$sql = "DELETE FROM size where id_size = '$id'";

$a = $koneksi->query($sql);

header("location: ../views/input_size_view.php");
