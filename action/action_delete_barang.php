<?php
include "../config/koneksi.php";
$id = $_GET['id'];

$sql = "delete from barang where id = '$id'";

$a = $koneksi->query($sql);

header("location: ../views/product_list_view.php");
