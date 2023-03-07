<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="username" placeholder="Nama Pengguna">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                    </div>
                                </div>
                                <button href="<?= base_url('user'); ?>" class="btn btn-primary btn-user btn-block" type="submit" >
                                    Masuk
                                </button>
                          
                                <button href="<?= base_url('user'); ?>" class="btn btn-warning  btn-block" type="text" >
                                Lupa sandi? hubungi 082139468709
                                </button>
                                
                                <!-- <h1 class="btn btn-primary btn-user btn-block" >
                                    <hr>
                                    <h5>
                                    Lupa sandi? hubungi 098766645343
                                </h5> -->
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>