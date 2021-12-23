<div class="row mb-2">
    <h4 class="col-xs-12 col-sm-6 mt-0">Detail Laporan</h4>
    <div class="col-xs-12 col-sm-6 ml-auto text-right">
        <form action="" method="get">
            <div class="row">
                <div class="col">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach($all_bulan as $bn => $bt): ?>
                            <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col ">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="" disabled selected>-- Pilih Tahun</option>
                        <?php for($i = date('Y'); $i >= (date('Y') - 5); $i--): ?>
                            <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <table class="table border-0">
                            <tr>
                                <th class="border-0 py-0">Nama</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?= $karyawan->nama ?></th>
                            </tr>
                            <!-- <tr>
                                <th class="border-0 py-0">Divisi</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?= $karyawan->nama_divisi ?></th>
                            </tr> -->
                        </table>
                    </div>
                    <?php if(is_level('Manager')): ?>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                Export Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprop-action">
                                <a href="<?= base_url('laporan/export_pdf/' . $this->uri->segment(3) . "?bulan=$bulan&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>            
            <div class="card-body">
                <h4 class="card-title mb-4">lapor Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h4>
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Kegiatan</th>
                        <th>Deskripsi</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <?php if($lapor): ?>
                            <?php foreach($lapor as $i => $h): ?>
                                <?php
                                    $lapor_harian = array_search($h['tanggal'], array_column($lapor, 'tanggal')) !== false ? $lapor[array_search($h['tanggal'], array_column($lapor, 'tanggal'))] : '';
                                ?>
                                <tr <?= ($lapor_harian == '') ? 'class="bg-danger text-white"' : '' ?>>
                                    <td><?= ($i+1) ?></td>
                                    <td><?= $h['tanggal'] ?></td>
                                    <td><?= $h['waktu'] ?></td>
                                    <td><?= $h['tempat'] ?></td>
                                    <td><?= $h['kegiatan'] ?></td>
                                    <td><?= substr(($h['deskripsi']), 0,10) ?></td>
                                    <td>
                                        <a href="<?= base_url('laporan/edit/' . $h["id_laporan"]) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('laporan/destroy/' . $h["id_laporan"]) ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return false"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="<?= base_url('laporan/detail_laporan_user/' . $h["id_laporan"]) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="bg-light" colspan="7">Tidak ada data Laporan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
