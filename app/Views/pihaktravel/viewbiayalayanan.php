<?= $this->extend('main/layout') ?>


<?= $this->section('judul') ?>
<b>DATA BIAYA LAYANAN SAYA</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>


<?= form_open('pihaktravel/viewbiayalayanan') ?>

<div class="input-group">
    <input type="text" class="form-control form-control-m" placeholder="CARI PESANAN SAYA" name="cari"
        value="<?= $cari; ?>" autofocus>
    <div class="input-group-append">
        <button type="submit" class="btn btn-m btn-primary" id="tombolcari" name="tombolcari">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
<br>
<?= form_close() ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= session()->getFlashdata('sukses'); ?>


<div class="card">
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table  table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width:5%;"><b>No</b></th>
                    <th>
                        <center><b>FAKTUR</b></center>
                    </th>
                    <th>
                        <center><b>RUTE (ASAL - TUJUAN)</b></center>
                    </th>

                    <th>
                        <center><b>TANGGAL | JAM</b></center>
                    </th>
                    <th>
                        <center><b>pelanggan</b></center>
                    </th>
                    <th>
                        <center><b>BIAYA LAYANAN</b></center>
                    </th>


                </tr>
            </thead>
            <tbody>


                <?php
                $nomor = 1;
                foreach ($tampildata as $row) :
                ?>


                <?php if (session()->iduser ==  $row['idtravel']) : ?>


                <tr>
                    <td><?= $nomor++ ?></td>
                    <td>
                        <center><?= $row['faktur'] ?></center>
                    </td>
                    <td>
                        <center><?= $row['asal_tujuan'] ?></center>
                    </td>
                    <td>
                        <center><?= $row['tgl'] ?> | JAM : <?= $row['jam'] ?></center>
                    </td>

                    <td>

                        <center><?= $row['namapelanggan'] ?></center>
                    </td>

                    <td>
                        <center> Rp. <?= number_format($row['biayalayanan'], 0) ?> </center>
                    </td>

                </tr>
                <?php endif ?>

                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>



<script>
function edit(id) {
    window.location = ('/rute/formedit/' + id);
}

function batalkan(id) {
    Swal.fire({
        title: 'Batalkan Pesanan ?',
        text: "Pesanan yang dibatalkan tidak dapat diterima kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/Pihaktravel/batalkan",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {

                    if (response.sukses) {

                        let timerInterval
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pesanan Berhasil Dibatalakan',
                            html: 'Otomatis Tertutup Dalam <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */

                            window.location.reload();
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')

                            }
                        })

                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });




        }
    });
}

function terima(id) {
    Swal.fire({
        title: 'Terima Pesanan ?',
        text: "Pesanan yang diterima tidak dapat dibatalkan ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya..!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/Pihaktravel/terima",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {

                    if (response.sukses) {

                        let timerInterval
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pesanan Berhasil Diterima',
                            html: 'Otomatis Tertutup Dalam <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */

                            window.location.reload();
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')

                            }
                        })

                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });




        }
    });
}


function jemput(id) {
    Swal.fire({
        title: 'Jemput Pesanan ?',
        text: " ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya..!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/Pihaktravel/jemput",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {

                    if (response.sukses) {

                        let timerInterval
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Penumpang Dijemput',
                            html: 'Otomatis Tertutup Dalam <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */

                            window.location.reload();
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')

                            }
                        })

                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });




        }
    });
}


function antar(id) {
    Swal.fire({
        title: 'Antar Pesanan ?',
        text: " ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya..!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/Pihaktravel/antar",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {

                    if (response.sukses) {

                        let timerInterval
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Penumpang Diantar',
                            html: 'Otomatis Tertutup Dalam <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */

                            window.location.reload();
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')

                            }
                        })

                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });




        }
    });
}

function selesai(id) {
    Swal.fire({
        title: 'Pesanan Selesai ?',
        text: " ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Selesai!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/Pihaktravel/selesai",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {

                    if (response.sukses) {

                        let timerInterval
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Selesai',
                            html: 'Otomatis Tertutup Dalam <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */

                            window.location.reload();
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')

                            }
                        })

                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });




        }
    });
}
</script>

<script>
$(document).ready(function() {
    $('#biayalayanan').addClass('nav-link active');

});
</script>





<?= $this->endSection('isi') ?>