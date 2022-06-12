<?php
include '../config/koneksi.php';
$namabarang = $_POST['namabarang'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$id = $_GET['id'];



$targetDir = "../img/barang/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$sql = "UPDATE `barang` SET `nama_barang`='$namabarang', `id_tipe`='$tipe', `harga`='$harga', `deskripsi`='$deskripsi', `stok`='$stok' WHERE  `id`='$id';";

$a = $koneksi->query($sql);

$getid = "SELECT id FROM barang ORDER BY id DESC LIMIT 1;";
$getres = $koneksi->query($getid);

$idArr = $getres->fetch_array();
$id = $idArr['id'];

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("INSERT INTO `gambar` (`id_barang`, `foto`) VALUES ('$id', '$fileName');");
        }
    }
}



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Input Berhasil!");
    </script>
<?php
}

header('location:../views/product_list_view.php');
