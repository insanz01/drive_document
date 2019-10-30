<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 py-2">
      <a href="<?= base_url('berkas/appt') ?>">
        <i class="fas fa-fw fa-arrow-left"></i> Kembali ke halaman sebelumnya
      </a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Form Edit APPT
        </div>
        <div class="card-body">
          <form action="<?= base_url('Berkas/ubah_appt/') . $id ?>" method="post">
            <div class="form-group">
              <label for="nomor_akta">Nomor Akta</label>
              <input type="text" name="nomor_akta" id="nomor_akta" class="form-control" value="<?= $isi['nomor_akta'] ?>">
            </div>
            <div class="form-group">
              <label for="tanggal_akta">Tanggal Akta</label>
              <input type="date" name="tanggal_akta" id="tanggal_akta" class="form-control" value="<?= $isi['tanggal_akta'] ?>">
            </div>
            <div class="form-group">
              <label for="perbuatan_hukum">Perbuatan Hukum</label>
              <input type="text" name="perbuatan_hukum" id="perbuatan_hukum" class="form-control" value="<?= $isi['perbuatan_hukum'] ?>">
            </div>
            <div class="form-group">
              <label for="pihak_memberikan">Pihak Memberikan</label>
              <input type="text" name="pihak_memberikan" id="pihak_memberikan" class="form-control" value="<?= $isi['pihak_memberikan'] ?>">
            </div>
            <div class="form-group">
              <label for="pihak_menerima">Pihak Menerima</label>
              <input type="text" name="pihak_menerima" id="pihak_menerima" class="form-control" value="<?= $isi['pihak_menerima'] ?>">
            </div>
            <div class="form-group">
              <label for="jenis_nomor_hak">Jenis Nomor dan HAK</label>
              <input type="text" name="jenis_nomor_hak" id="jenis_nomor_hak" class="form-control" value="<?= $isi['jenis_nomor_hak'] ?>">
            </div>
            <div class="form-group">
              <label for="letak_tanah">Letak Tanah</label>
              <textarea name="letak_tanah" id="letak_tanah" cols="30" rows="7" class="form-control"><?= $isi['letak_tanah'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="luas_tanah">Luas Tanah</label>
              <input type="text" id="luas_tanah" name="luas_tanah" class="form-control" value="<?= $isi['luas_tanah'] ?>">
            </div>
            <div class="form-group">
              <label for="luas_bangunan">Luas Bangunan</label>
              <input type="text" id="luas_bangunan" name="luas_bangunan" class="form-control" value="<?= $isi['luas_bangunan'] ?>">
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