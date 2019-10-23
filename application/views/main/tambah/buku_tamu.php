<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 py-2">
      <a href="<?= base_url('berkas/buku_tamu') ?>">
        <i class="fas fa-fw fa-arrow-left"></i> Kembali ke halaman sebelumnya
      </a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Form Tambah Buku Tamu
        </div>
        <div class="card-body">
          <form action="<?= base_url('Berkas/tambah_buku_tamu') ?>" method="post">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="form-group">
              <label for="nomor">Nomor HP</label>
              <input type="text" name="nomor" id="nomor" class="form-control">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="7" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>