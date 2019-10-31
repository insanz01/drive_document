<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 py-2">
      <a href="<?= base_url('berkas/daftar_akta') ?>">
        <i class="fas fa-fw fa-arrow-left"></i> Kembali ke halaman sebelumnya
      </a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Form Edit Daftar Akta
        </div>
        <div class="card-body">
          <form action="<?= base_url('Berkas/ubah_daftar_akta/') . $id ?>" method="post">
            <div class="form-group">
              <label for="nomor">Nomor Akta</label>
              <input type="text" name="nomor" id="nomor" class="form-control" value="<?= $isi['nomor'] ?>">
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Akta</label>
              <select name="jenis" id="jenis" class="form-control">
                <option value="APHT" <?= ($isi['jenis'] == 'APHT' ? 'selected' : '') ?>>APHT</option>
                <option value="SKMHT" <?= ($isi['jenis'] == 'SKMHT' ? 'selected' : '') ?>>SKMHT</option>
                <option value="JUAL BELI" <?= ($isi['jenis'] == 'JUAL BELI' ? 'selected' : '') ?>>JUAL BELI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal Akta</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $isi['tanggal'] ?>">
            </div>
            <div class="form-group">
              <label for="sifat">Sifat Akta</label>
              <input type="text" name="sifat" id="sifat" class="form-control" value="<?= $isi['sifat'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Nama Kedudukan</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $isi['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="tempat">Alamat Kedudukan</label>
              <textarea name="alamat" id="tempat" cols="30" rows="10" class="form-control"><?= $isi['alamat'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="nama_satu">Nama Penghadap 1</label>
              <input type="text" name="nama_satu" id="nama_satu" class="form-control" value="<?= $isi['nama_satu'] ?>">
            </div>
            <div class="form-group">
              <label for="nama_dua">Nama Penghadap 2</label>
              <input type="text" name="nama_dua" id="nama_dua" class="form-control" value="<?= $isi['nama_dua'] ?>">
            </div>
            <div class="form-group">
              <label for="nama_tiga">Nama Penghadap 3</label>
              <input type="text" name="nama_tiga" id="nama_tiga" class="form-control" value="<?= $isi['nama_tiga'] ?>">
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