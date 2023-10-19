<div class="container-fluid">
    <!-- content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pencarian
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" placeholder="Please Input Kode Booking" id="cari" name="cari">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tipe Kamar</th>
                        <th scope="col">Kode Booking</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                    </tr>
                </thead>
                <?php $no = 1 ?>
                <?php foreach ($booking as $b) : ?>
                    <tr>
                        <th scope="col"><?= $no ?></th>
                        <th scope="col"><?= $b['username'] ?></th>
                        <th scope="col"><?= $b['ruangan'] ?></th>
                        <th scope="col"><?= $b['kode_booking'] ?></th>
                        <th scope="col"><?= $b['tanggal_mulai'] ?></th>
                        <th scope="col"><?= $b['tanggal_selesai'] ?></th>
                    </tr>
                <?php $no++;
                endforeach ?>
            </table>
        </div>
    </div>


</div>
</div>