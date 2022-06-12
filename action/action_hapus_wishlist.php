<?php
include "../config/koneksi.php";
$id = $_GET['id'];

$sql = "DELETE FROM `wishlist` WHERE  `id_wishlist`='$id';";

$a = $koneksi->query($sql);
header("location: ../views/wishlist_view.php");
