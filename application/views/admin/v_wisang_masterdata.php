<div class="container-fluid">
    <div class="row">
    </div>
    <div class="col-md-6">
        <!-- content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Access</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                            <?php $i = 1 ?>
                            <?php foreach ($user_access as $kp) : ?>
                                <tr>
                                    <th><?= $i ?></th>
                                    <td><?= $kp['nama'] ?></td>
                                    <td><?= $kp['level'] ?></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_u_modal<?php echo $kp['id'] ?>"> Edit</button>
                                        <a class="btn btn-danger" href="<?= base_url('c_wisang_admin/useracces_delete/') . $kp['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                    </td>
                                </tr>
                                <!-- modal edit user -->
                                <div class="modal fade" id="edit_u_modal<?php echo $kp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('c_wisang_admin/useraccess_update/') ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="edit_nama" class="form-control" value="<?= $kp['nama'] ?>">
                                                        <input type="hidden" name="edit_id" value="<?= $kp['id'] ?>">
                                                        <br>
                                                        <label>Role</label>
                                                        <select type="text" name="edit_level" class="form-control" value="<?= $kp['level'] ?>">
                                                            <option value="">Pilih Status</option>
                                                            <option value="1">ADMIN</option>
                                                            <option value="2">RESEPSONIS</option>
                                                            <option value="3">USER</option>
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
                                <!-- akhir modal edit user -->
                            <?php $i++;
                            endforeach ?>
                        </thead>
                    </table>
                    <a href="<?= base_url('c_wisang_auth/registration_admin') ?>"><button type="button" class="btn btn-primary">Tambah Admin</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?= $this->session->flashdata('message'); ?>
            <h6 class="m-0 font-weight-bold text-primary">Tipe Kamar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Tipe Kamar</th>
                        <th>Fasilitas</th>
                        <th>Tipe Harga</th>
                        <th>Gambar Kamar</th>
                        <th>Aksi</th>
                        <?php $i = 1 ?>
                        <?php foreach ($tipe_kamar as $kp) : ?>
                            <tr>
                                <th><?= $i ?></th>
                                <td><?= $kp['nama_kamar'] ?></td>
                                <td><?= $kp['fasilitas_kamar'] ?></td>
                                <td><?= $kp['tipe_harga'] ?></td>
                                <td><img src="<?php echo base_url() . '/upload/img/' . $kp['img']; ?>" width="100"></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal<?php echo $kp['id'] ?>"> Edit</button>
                                    <a class="btn btn-danger" href="<?= base_url('c_wisang_admin/deletetipekamar/') . $kp['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                </td>
                            </tr>
                            <!-- modal edit kamar -->
                            <div class="modal fade" id="edit_modal<?php echo $kp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tipe Kamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('c_wisang_admin/edittipekamar/') ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Tipe Kamar</label>
                                                    <input type="text" name="edit_nk" class="form-control" value="<?= $kp['nama_kamar'] ?>">
                                                    <input type="hidden" name="edit_id" value="<?= $kp['id'] ?>">
                                                    <br>
                                                    <label>Fasilitas</label>
                                                    <input type="text" name="edit_fk" class="form-control" value="<?= $kp['fasilitas_kamar'] ?>">
                                                    <input type="hidden" name="edit_id" value="<?= $kp['id'] ?>">
                                                    <br>
                                                    <label>Tipe Harga</label>
                                                    <input type="text" name="edit_th" class="form-control" value="<?= $kp['tipe_harga'] ?>">
                                                    <input type="hidden" name="edit_id" value="<?= $kp['id'] ?>">
                                                    <br>
                                                    <label>Image</label>
                                                    <input type="file" name="img" class="form-control" value="<?= $kp['img'] ?>">
                                                    <input type="hidden" name="edit_id" value="<?= $kp['id'] ?>">
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
                            <!-- akhir modal edit kamar -->
                        <?php $i++;
                        endforeach ?>
                    </thead>
                </table>
                <!-- Tombol Tambah Data -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah</button>
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe Kamar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?= base_url('c_wisang_admin/tambahtipekamar') ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Kamar</label>
                                        <input type="text" name="nama_kamar" class="form-control">
                                        <br>
                                        <label>Fasilitas Kamar</label>
                                        <input type="text" name="fasilitas_kamar" class="form-control">
                                        <br>
                                        <label>Tipe Harga</label>
                                        <input type="text" name="tipe_harga" class="form-control">
                                        <br>
                                        <label for="image">Gambar</label>
                                        <input type="file" name="img" class="form-control">
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Modal Tambah Data -->
            </div>
        </div>
    </div>
</div>
</div>