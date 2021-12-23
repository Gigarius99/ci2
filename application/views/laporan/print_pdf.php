<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan <?= $karyawan->nama ?> bulan <?= bulan($bulan) . ', ' . $tahun ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        @media print {
            .firstrow {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <div class="row mt-2">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <?php if ($lapor) : ?>
                        <?php foreach ($lapor as $i => $h) : ?>
                            <?php
                            $lapor_harian = array_search($h['tanggal'], array_column($lapor, 'tanggal')) !== false ? $lapor[array_search($h['tanggal'], array_column($lapor, 'tanggal'))] : '';
                            ?>
                            <div><?= ($lapor_harian == '') ? 'class="bg-danger text-white"' : '' ?></div>
                            <div class="card">
                                <div>
                                    <div class="firstrow">
                                        <h4><span>Tanggal</span></h4>
                                        <span><?= $h['tanggal'] ?></span>
                                    </div>
                                    <div class="firstrow">
                                        <h4><span>Waktu</span></h4>
                                        <span><?= $h['waktu'] ?></span>
                                    </div>
                                    <div class="firstrow">
                                        <h4><span>Tempat</span></h4>
                                        <span><?= $h['tempat'] ?></span>
                                    </div>
                                    <div class="firstrow">
                                        <h4><span>Kegiatan</span></h4>
                                        <span><?= $h['kegiatan'] ?></span>
                                    </div>
                                    <br>
                                    <div class="firstrow">
                                        <h4><span>Deskripsi</span></h4>
                                        <span><?= $h['deskripsi'] ?></span>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="row mt-2">
                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Kegiatan</th>
                                                            <th>Jaumlah Kegiatan</th>
                                                            <th>Total Kegiatan</th>
                                                            <th>Persentase</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                                                        $uri_segments = explode('/', $uri_path);
                                                        $conn = mysqli_connect("localhost", "root", "", "absensi");
                                                        $jenis_kegiatan = "";
                                                        $jumlah = null;
                                                        $sql = "select kegiatan,COUNT(*) as 'total' from laporan WHERE id_user='$uri_segments[4]' AND MONTH(tanggal)='$bulan' GROUP by kegiatan";
                                                        $hasil = mysqli_query($conn, $sql);
                                                        $sqls = "select * from laporan WHERE id_user='$uri_segments[4]' AND MONTH(tanggal)='$bulan'";
                                                        $total = mysqli_query($conn, $sqls);
                                                        $jumlah_data = mysqli_num_rows($total);

                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                            $kegiatan = $data['kegiatan'];
                                                            $jenis_kegiatan .= "$kegiatan" . ", ";

                                                            $jum = $data['total'];
                                                            $jumlah .= "$jum" . ", ";
                                                            $lap[] = $jum;
                                                            $count = array_sum($lap);
                                                            $persentase = ($jum / $jumlah_data);

                                                        ?>

                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td><?php echo $kegiatan; ?></td>
                                                                <td><?php echo $jum; ?></td>
                                                                <td><?php echo $jumlah_data; ?></td>
                                                                <td><?php echo $persentase; ?>%</td>
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <h4><span>Tidak ada data laporan</span></h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                if (count($lapor) > 0) {
                    foreach ($lapor as $data) {
                        echo "'" . $data['kegiatan'] . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Kegiatan',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($lapor) > 0) {
                        foreach ($lapor as $data) {
                            echo $data['tanggal'] . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script> -->

</html>