<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Form Tambah Daftar Akta
        </div>
        <div class="card-body">
          <form action="<?= base_url('Berkas/tambah_daftar_akta') ?>" method="post">
            <div class="form-group">
              <label for="nomor">Nomor Akta</label>
              <input type="text" name="nomor" id="nomor" class="form-control">
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal Akta</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="form-group">
              <label for="sifat">Sifat Akta</label>
              <input type="text" name="sifat" id="sifat" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama">Nama Kedudukan</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="tempat">Tempat Kedudukan</label>
              <textarea name="alamat" id="tempat" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="nama_satu">Nama Penghadap 1</label>
              <input type="text" name="nama_satu" id="nama_satu" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_dua">Nama Penghadap 2</label>
              <input type="text" name="nama_dua" id="nama_dua" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_tiga">Nama Penghadap 3</label>
              <input type="text" name="nama_tiga" id="nama_tiga" class="form-control">
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