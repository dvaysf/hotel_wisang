<div class="container-fluid">
    <!-- content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kode Booking
        </div>
        <div class="card-body">
            <form action="<?= base_url('c_wisang_resepsonis/Check_kode_booking') ?>" method="post">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" placeholder="Please Input Kode Booking" name="search">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php if ($booking) { ?>
        <div class="card">
            <h5 class="card-header">Detail</h5>
            <div class="card-body">
                <p class="card-text">Nama : <?= $booking['username'] ?></p>
                <p class="card-text">Email : <?= $booking['email'] ?></p>
                <p class="card-text">Ruangan : <?= $booking['ruangan'] ?></p>
                <p class="card-text">Jumlah Orang : <?= $booking['jumlah_orang'] ?></p>
                <p class="card-text">Kode Booking : <?= $booking['kode_booking'] ?></p>
            </div>
        </div>
    <?php } ?>

</div>
</div>