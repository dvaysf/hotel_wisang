<div class="container-fluid">
    <!-- content -->
    <h1 class="mt-4"><?= $tipe ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Tipe Kamar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <?php $i = 1 ?>
                    <?php foreach ($list_kamar as $al) : ?>
                        <tr>
                            <td><?= $al['nomor_ruangan'] ?></td>
                            <td><?= tipe_kamar($al['id_tipe_kamar']) ?></td>
                            <td><?= $al['status'] ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_u_modal<?php echo $al['id'] ?>"> Edit</button>
                                <a class="btn btn-danger" href="<?= base_url('c_wisang_admin/useracces_delete/') . $al['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach ?>
                    <!-- modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?= base_url('c_wisang_admin/statusruangan/') ?>">
                                        <div class="form-group">
                                            <label for="nama">No Kamar</label>
                                            <input type="text" class="form-control" name="nomor_ruangan" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Tipe Kamar</label>
                                            <select type="text" name='tipe_kamar' class="form-control" id="jenis_kelamin">
                                                <option value="">Pilih Kamar</option>
                                                <?php foreach ($tipe_kamar as $jk) : ?>
                                                    <option value="<?= $jk['id'] ?>"><?= $jk['nama_kamar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Status Kamar</label>
                                            <select name="status" class="form-control" id="" class="mb-3">
                                                <option value="">Status Kamar</option>
                                                <option value="booked">Booked</option>
                                                <option value="Checked-In">Checked In</option>
                                                <option value="available">available</option>
                                                <option value="maintenance">maintenance</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
</div>