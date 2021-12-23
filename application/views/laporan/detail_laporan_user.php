<div class="row">
    <div class="col-12">
        <div class="card">
        <div style="display: flex !important; align-items:center;">
                <h4 style="display: inline !important; margin: 0 !important"><span>Nama</span></h4>
                <span><?= $laporan->nama ?></span>
            </div>
            <div style="display: flex !important; align-items:center;">
                <h4 style="display: inline !important; margin: 0 !important"><span>Tanggal</span></h4>
                <span><?= $laporan->tanggal ?></span>
            </div>
            <div style="display: flex !important; align-items:center;">
                <h4 style="display: inline !important; margin: 0 !important"><span>Waktu</span></h4>
                <span><?= $laporan->waktu ?></span>
            </div>
            <div style="display: flex !important; align-items:center;">
                <h4 style="display: inline !important; margin: 0 !important"><span>Tempat</span></h4>
                <span><?= $laporan->tempat ?></span>
            </div>
            <div style="display: flex !important; align-items:center;">
                <h4 style="display: inline !important; margin: 0 !important"><span>Kegiatan</span></h4>
                <span><?= $laporan->kegiatan ?></span>
            </div>
            <br>
            <div style="display: flex !important; align-items:center;">
                <?= $laporan->deskripsi ?>
            </div>
        </div>
    </div>
</div>