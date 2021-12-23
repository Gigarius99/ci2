<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('laporan/lapor') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Tambah Laporan Kegiatan</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Laporan</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal : </label>
                                <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Masukan Tanggal Kegiatan" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="waktu">Waktu : </label>
                                <input type="text" name="waktu" id="waktu" class="form-control" placeholder="Masukana Waktu Kegiatan" required="reuqired" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tempat">tempat : </label>
                                <input type="text" name="tempat" id="tempat" class="form-control" placeholder="Masukan Tempat Kegiatan" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan : </label>
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Masukan Nama Kegiatan" required="reuqired" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Deskripsi Kegiatan</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="deskripsi" class="deskripsi" id="deskripsi" placeholder="Your Content"></textarea>
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