<div class="container-fluid">
    <h2>User Dashboard</h2>
    <div class="row">
        <?php foreach ($tipe_kamar as $kp) : ?>
            <div class="col-md-6">
                <!-- content -->
                <?php $i = 1 ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Booking</h6>
                    </div>
                    <img class="card-img-top" src="<?php echo base_url() . '/upload/img/' . $kp['img'];?>" alt="Card image cap" width="100">
                    <div class="card-body">
                        <strong><h3 class="card-title"><?= $kp['nama_kamar'] ?></strong></h3>
                        <strong><p class="card-text"><?= $kp['fasilitas_kamar'] ?></strong></p>
                        <strong><p class="card-text">Rp.<?= $kp['tipe_harga'] ?>/Malam</strong></p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            BOOK NOW
                        </button>
                    </div>
                </div>
            </div>
        <?php $i++;
        endforeach ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">BOOK NOW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url('c_wisang_user/booking') ?>" method="post">
                                <div class="form-group">
                                    <label for="username">Nama</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $user['nama']?>"aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                                </div>
                                
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?= $user['email']?>" id="email" aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Guest</label>
                                    <select type="text" name='jumlah_orang' class="form-control" id="jumlah_orang">
                                        <option value="">Pilih Guest</option>
                                        <option value="1">1 ADULT</option>
                                        <option value="2">2 ADULT</option>
                                        <option value="3">3 ADULT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Room</label>
                                    <select type="text" name='ruangan' class="form-control" name="ruangan" id="ruangan">
                                        <option value="">Pilih Kamar</option>
                                        <?php foreach ($tipe_kamar as $kp) : ?>
                                            <option value=" <?= $kp['nama_kamar'] ?>"><?= $kp['nama_kamar'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mm -->
</div>
</div>  
</div>  
