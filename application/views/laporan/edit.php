<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('laporan/update') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Edit Laporan Kegiatan</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Profil</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal : </label>
                                <input type="hidden" name="id_laporan" value="<?= $this->uri->segment(3) ?>">
                                <input type="text" name="tanggal" id="tanggal" value="<?= $laporan->tanggal ?>" class="form-control" placeholder="Masukan Tanggal Kegiatan" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="waktu">Waktu : </label>
                                <input type="text" name="waktu" id="waktu" value="<?= $laporan->waktu ?>" class="form-control" placeholder="Masukana Waktu Kegiatan" required="reuqired" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tempat">tempat : </label>
                                <input type="text" name="tempat" id="tempat" value="<?= $laporan->tempat ?>" class="form-control" placeholder="Masukan Tempat Kegiatan" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan : </label>
                                <input type="text" name="kegiatan" id="kegiatan" value="<?= $laporan->kegiatan ?>" class="form-control" placeholder="Masukan Nama Kegiatan" required="reuqired" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Deskripsi Kegiatan</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="deskripsi" class="deskripsi" id="deskripsi" placeholder="Your Content"><?= $laporan->deskripsi ?></textarea>
                                <label style="display: none;" for="deskripsi" class="animated-label">Title</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>