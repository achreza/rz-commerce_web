<?php
session_start();
include "../config/koneksi.php";
$nama = $_SESSION['username'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - <?php echo $nama ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

                    <a href="#" class="navbar-brand">Inspinia</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>

                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav mr-auto">


                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="../action/login_controller.php?op=out">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="float-right">(<strong>5</strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>

                        <?php
                        include '../config/koneksi.php';
                        $query = "select * from keranjang join barang on keranjang.id_barang = barang.id join size on size.id_size = keranjang.id_size where keranjang.id_user = '$id'";
                        $output = $koneksi->query($query);


                        while ($data = $output->fetch_array()) {
                            $idbarang = $data['id'];
                        ?>
                            <div class="ibox-content">


                                <div class="table-responsive">
                                    <table class="table shoping-cart-table">

                                        <tbody>
                                            <tr>
                                                <td width="90">
                                                    <div class="cart-product-imitation">
                                                        <?php
                                                        $query1 = "select * from gambar where id_barang = '$idbarang'";
                                                        $output1 = $koneksi->query($query1);
                                                        $gambar = $output1->fetch_array(); ?>
                                                        <img class="img-fluid rounded mx-auto d-block" src="../img/barang/<?php echo $gambar['foto'] ?>" alt="gambar">
                                                    </div>
                                                </td>
                                                <td class="desc">
                                                    <h3>
                                                        <a href="#" class="text-navy">
                                                            <?php echo $data['nama_barang'] ?>
                                                        </a>
                                                    </h3>

                                                    <dl class="small m-b-none">
                                                        <dt>Ukuran : <?php echo $data['ukuran'] ?></dt>
                                                        <dd><?php echo $data['deskripsi'] ?></dd>
                                                    </dl>

                                                    <div class="m-t-sm">
                                                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <?php echo $data['harga'] ?>

                                                </td>
                                                <td width="65">
                                                    <input type="text" class="form-control" value="<?php echo $data['jumlah'] ?>" disabled>
                                                </td>
                                                <td>
                                                    <h4>
                                                        <?php $hasil = (int)$data['harga'] * (int)$data['jumlah'] ?>
                                                        <?php echo $hasil ?>
                                                    </h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
                        <div class="ibox-content">


                            <button class="btn btn-white" onclick="history.back();"><i class="fa fa-arrow-left"></i> Continue shopping</button>

                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                <?php
                                $query = "select sum(barang.harga * keranjang.jumlah) AS total from keranjang INNER JOIN barang ON keranjang.id_barang = barang.id where id_user = '" . $_SESSION['id'] . "'";
                                $output = $koneksi->query($query);


                                $data = $output->fetch_array();
                                echo $data['total'];
                                ?>
                            </h2>

                            <hr />
                            <span class="text-muted small">
                                *For United States, France and Germany applicable sales tax will be applied
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="../action/action_checkout.php?total=<?php echo $data['total'] ?>&user=<?php echo $id ?>" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                    <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">



                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>


                        </div>
                    </div>



                </div>
            </div>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="../js/demo/peity-demo.js"></script>


    <script>
        $(document).ready(function() {


            var d1 = [
                [1262304000000, 6],
                [1264982400000, 3057],
                [1267401600000, 20434],
                [1270080000000, 31982],
                [1272672000000, 26602],
                [1275350400000, 27826],
                [1277942400000, 24302],
                [1280620800000, 24237],
                [1283299200000, 21004],
                [1285891200000, 12144],
                [1288569600000, 10577],
                [1291161600000, 10295]
            ];
            var d2 = [
                [1262304000000, 5],
                [1264982400000, 200],
                [1267401600000, 1605],
                [1270080000000, 6129],
                [1272672000000, 11643],
                [1275350400000, 19055],
                [1277942400000, 30062],
                [1280620800000, 39197],
                [1283299200000, 37000],
                [1285891200000, 27000],
                [1288569600000, 21000],
                [1291161600000, 17000]
            ];

            var data1 = [{
                    label: "Data 1",
                    data: d1,
                    color: '#17a084'
                },
                {
                    label: "Data 2",
                    data: d2,
                    color: '#127e68'
                }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {
                type: 'line',
                data: lineData,
                options: lineOptions
            });

        });
    </script>

</body>

</html>