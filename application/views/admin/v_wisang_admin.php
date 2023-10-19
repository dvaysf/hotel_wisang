<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- content -->
            <div class="container-fluid px-4">
              <center><h1 class="mt-4">SELAMAT DATANG DI GEMIRLAP HOTEL ADMIN PAGE</h1>
              <div class="card col-md-121212121 mt-4">
                  <h5 class="card-header">Gemirlap Hotel</h5>
                  <div class="card-body">
                      <table class="table ">
                            <Center>
                            <div class="card" style="width: 18rem;">
                              <img src="<?= base_url('assets_admin/')?>img/logo.png" class="card-img-top">
                                </div>
                              </div>
                             </Center>
                           <tr>
                              <td>
                                  <h6>Nama</h6>
                              </td>
                              <td>
                                  <h6><?= $user['username'] ?></h6>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <h6>Email</h6>
                              </td>
                              <td>
                                  <h6><?= $user['email'] ?></h6>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <h6>Role</h6>
                              </td>
                              <header>
                              <td>
                                  <h6> <?php
                                        if ($user['level'] == 1) {
                                            echo "Admin";
                                        } elseif ($user['level'] == 2) {
                                            echo "Resepsionis";
                                        } else {
                                            echo "Customer";
                                        }
                                        ?>
                                  </h6>
                              </td>
                          </tr>
                      </table>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
<!-- mm -->
</div>
