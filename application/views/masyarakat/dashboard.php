<!-- Bagian tampil Barang Lelang -->
<selection class="site-section bpy-sm">
    <div class="container">

    <!-- tombol cari -->
    <div class="rop-bar bg-dark">

        <center>
            <div class="col-5 navbar-search">

        <form action="<?= base_url(); ?>welcome" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Untuk..." name="keyword">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i>Cari</button>
            </div>
        </form>
        </center>
    </div>
    
        <div class="row">
            <div class="col-md-6">
                <br>
                <h2 class="mb-4">Daftar Lelang</h2>
            </div>
        </div>


        <div class="row text-center mt-3">


            <?php foreach ($auctions as $auction) : ?>
            <?php if($auction->status == 'dibuka') : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?= base_url() . '/uploads/' . $auction->photo; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title"><?= $auction->nama_barang; ?></h4>
                    <span class="badge badge-success mb-3">Rp. <?= number_format($auction->harga_awal, 0, ',', '.'); ?></span>
                    <h5 class="text-primary">
                    <strong><hr></strong>
                    </h5>
                <a href="<?= base_url('masyarakat/datalelang/bid/') . $auction->id_lelang; ?>">
                    <h5 class="text-center text-primary"><strong>LIHAT DETAIL</strong></h5>
                </a>
                <h5 class="text-primary">
                <strong><hr></strong>
                </h5>

             </div>
        </div>
            <?php endif; ?>
            <?php endforeach; ?>


        </div>
        
        </div>
        </section>