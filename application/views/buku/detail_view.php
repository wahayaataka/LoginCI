<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <h4 class="card-header"><?= $buku['judul']; ?></h4>
        <div class="card-body">
          <label class="card-text">Genre : <?= $buku['genre']; ?></label>
          <br>
          <label class="card-text">Penulis : <?= $buku['penulis']; ?></label>
          <br>
          <label class="card-text">Tahun Terbit : <?= $buku['tahun_terbit']; ?></label>
          <br>
          <label class="card-text">Harga : Rp<?= $buku['harga']; ?></label>
          <br>
          <br>
          <a href="<?= base_url('Buku/index') ?>" class="btn btn-primary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
