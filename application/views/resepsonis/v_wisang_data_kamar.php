<div class="container-fluid">
    <!-- content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kamar
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Status</th>
                        </thead>
                        <?php $i = 1?>
                        <?php foreach ($data_kamar as $al) : ?>
                            <tr>
                                <input type="hidden" name="nama_kamar" value="<? $al['nama_kamar']?>">
                                <input type="hidden" name="status" value="<? $al['status']?>">
                                <td><?= $i ?></td>
                                <td><?= $al['nama_kamar'] ?></td>
                                <td><?= $al['status'] ?></td> 
                            </tr>
                        <?php $i++; endforeach?>
                    </table>
                </div>
            </div>
        </div>