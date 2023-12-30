<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
<b>CETAK LAPORAN DETAIL BARANG TRAVEL
</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<button class="btn btn-warning" onclick="window.location=('/laporan/index')"> Kembali</button>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-lg-5">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">PILIH PERIODE</div>
            <div class="card-body bg-white">
                <p class="card-text">
                    <?= form_open('laporan/cetakdetailbarangmasukperiode', ['target' => '_blank']) ?>
                <div class="form-group">
                    <label for="">TANGGAL AWAL</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">TANGGAL AKHIR</label>
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fa fa-print"></i>CETAK LAPORAN
                    </button>
                </div>
                <?= form_close() ?>
                </p>
            </div>
        </div>

    </div>
    <div class="col-lg-7">
        <img src="<?= base_url() ?>/dist/img/barang.gif" style="width: 100%;" alt="GAMBAR BARANG KOSONG">
    </div>
</div>

<script>
$(document).ready(function() {

    $('#laporan').addClass('nav-link active');
});
</script>


<?= $this->endSection('isi') ?>