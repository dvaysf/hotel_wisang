<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="<?= base_url('c_wisang_auth')?>">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-user"
                            id="email" name='email'
                            placeholder="Email Address" value="<?= set_value('email');?>"> 
                            <?= form_error('email','<small class="text-danger pl-3" >','</small>');?>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-user"
                            id="password" name="password" 
                            placeholder="Password" value="<?= set_value('password');?>"> 
                            <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="<?= base_url('c_wisang_auth/registration')?>">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>