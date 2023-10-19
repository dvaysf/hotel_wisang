<div class="container-fluid">
    <!-- content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Booking
        </div>
        <?php foreach ($detail as $al) : ?>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6"> 
                <form>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['username'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Ruangan</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['ruangan'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Kode Booking</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['kode_booking'] ?>" readonly>
                    </div> 

                    <div class="form-group">
                        <label for="nama">Jumlah Orang</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['jumlah_orang'] ?>" readonly>
                    </div>
                    <a class="btn btn-primary" href="<?php echo base_url('c_wisang_user/print')?>"><i class="fa fa-print"></i> Print</a>
                    <a class="btn btn-danger" href="<?php echo base_url('c_wisang_user/laporan_pdf')?>"><i class="fa fa-file-pdf"></i> Export PDF</a>

                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Tanggal Mulai</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['tanggal_mulai'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Tanggal Selesai</label>
                        <input type="nama" class="form-control" id=""  value="<?= $al['tanggal_selesai'] ?>" readonly>
                    </div>
                </form>
            </div>
        <?php endforeach ;?>
    </div>
    </div>
    </div>