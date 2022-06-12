<?php
include '../config/koneksi.php';
$namabarang = $_POST['namabarang'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];



$targetDir = "../img/barang/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$sql = "INSERT INTO `barang` (`nama_barang`, `id_tipe`, `harga`, `deskripsi`, `stok`) VALUES ('$namabarang', '$tipe', '$harga', '$deskripsi', '$stok');";

$a = $koneksi->query($sql);

$getid = "SELECT id FROM barang ORDER BY id DESC LIMIT 1;";
$getres = $koneksi->query($getid);

$idArr = $getres->fetch_array();
$id = $idArr['id'];

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("INSERT INTO `db_ehijab`.`gambar` (`id_barang`, `foto`) VALUES ('$id', '$fileName');");
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
