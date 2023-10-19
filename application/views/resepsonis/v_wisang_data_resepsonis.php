<div class="container-fluid">
    <!-- content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Reservasi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Guest</th>
                            <th>Room</th>
                            <th>Kode Booking</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                        </thead>
                        <?php $i = 1?>
                        <?php foreach ($data_resepsonis as $al) : ?>
                            <tr>
                                <input type="hidden" name="nama" value="<? $al['nama']?>">
                                <input type="hidden" name="email" value="<? $al['email']?>">
                                <input type="hidden" name="jumlah_orang" value="<? $al['jumlah_orang']?>">
                                <input type="hidden" name="ruangan" value="<? $al['ruangan']?>">
                                <input type="hidden" name="kode_booking" value="<? $al['kode_booking']?>">
                                <input type="hidden" name="check In" value="<? $al['tanggal_mulai']?>">
                                <input type="hidden" name="check Out" value="<? $al['tanggal_selesai']?>">
                                <td><?= $i ?></td>
                                <td><?= $al['username'] ?></td>
                                <td><?= $al['email'] ?></td>
                                <td><?= $al['jumlah_orang'] ?></td>
                                <td><?= $al['ruangan'] ?></td>
                                <td><?= $al['kode_booking'] ?></td>
                                <td><?= $al['tanggal_mulai'] ?></td>
                                <td><?= $al['tanggal_selesai'] ?></td>    
                            </tr>
                        <?php $i++; endforeach?>
                    </table>
                </div>
            </div>
        </div>