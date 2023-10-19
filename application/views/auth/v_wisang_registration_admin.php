<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Registration Admin</h3>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="<?= base_url('c_wisang_auth/registration_admin')?>">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="nama" value="<?= set_value('nama');?>">
                                       <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>                                        
                                       <label for="inputFirstName">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Full name" value="<?= set_value('username');?>">
                                       <?= form_error('username','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputLastName">Username</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email');?>">
                                       <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir');?>">
                                       <?= form_error('tempat_lahir','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">Tempat Lahir</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir');?>">
                                       <?= form_error('tanggal_lahir','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">Tanggal Lahir</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 ">
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat');?>">
                                       <?= form_error('alamat','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Status" value="<?= set_value('Status');?>">
                                       <?= form_error('status','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">Status</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="text" class="form-control form-control-user" id="no_telepon" name="no_telepon" placeholder="No_telepon" value="<?= set_value('no_telepon');?>">
                                       <?= form_error('no_telepon','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputEmail">No Telepon</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
                                            <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password2" id="password2" placeholder="Repeat Password">
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="<?= base_url('c_wisang_auth/login_admin')?>">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>