<?php
include "../config/koneksi.php";
$id = $_GET['id'];



$sql = "DELETE FROM logs where id_logs = '$id'";

$a = $koneksi->query($sql);

header("location: ../views/list_logs_view.php");
