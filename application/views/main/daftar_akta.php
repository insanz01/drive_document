<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?= base_url('berkas/tambah_daftar_akta') ?>" class="btn btn-primary float-right mb-2">Tambah Daftar Akta</a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Data Akta
        </div>
        <div class="card-body table-responsive-lg">
          <div class="row">
            <div class="col-lg-12">
              <form action="<?= base_url('berkas/daftar_akta') ?>" method="post" id="cari" name="cari">
                <div class="row py-2">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="bulan" id="bulan" class="form-control" onchange="filterSekarang()">
                        <option value="" <?= ($bulan == '') ? 'selected' : '' ?>>Semua Bulan</option>
                        <option value="1" <?= ($bulan == '1') ? 'selected' : '' ?>>Januari</option>
                        <option value="2" <?= ($bulan == '2') ? 'selected' : '' ?>>Februari</option>
                        <option value="3" <?= ($bulan == '3') ? 'selected' : '' ?>>Maret</option>
                        <option value="4" <?= ($bulan == '4') ? 'selected' : '' ?>>April</option>
                        <option value="5" <?= ($bulan == '5') ? 'selected' : '' ?>>Mei</option>
                        <option value="6" <?= ($bulan == '6') ? 'selected' : '' ?>>Juni</option>
                        <option value="7" <?= ($bulan == '7') ? 'selected' : '' ?>>Juli</option>
                        <option value="8" <?= ($bulan == '8') ? 'selected' : '' ?>>Agustus</option>
                        <option value="9" <?= ($bulan == '9') ? 'selected' : '' ?>>September</option>
                        <option value="10" <?= ($bulan == '10') ? 'selected' : '' ?>>Oktober</option>
                        <option value="11" <?= ($bulan == '11') ? 'selected' : '' ?>>Nopember</option>
                        <option value="12" <?= ($bulan == '12') ? 'selected' : '' ?>>Desember</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="jenis" id="jenis" class="form-control" onchange="filterSekarang()">
                        <option value="" <?= ($jenis == '') ? 'selected' : '' ?>>SEMUA JENIS</option>
                        <option value="APHT" <?= ($jenis == 'APHT') ? 'selected' : '' ?>>APHT</option>
                        <option value="SKMHT" <?= ($jenis == 'SKMHT') ? 'selected' : '' ?>>SKMHT</option>
                        <option value="JUAL BELI" <?= ($jenis == 'JUAL BELI') ? 'selected' : '' ?>>JUAL BELI</option>
                      </select>
                    </div>
                  </div>
                  <script>
                    let filterSekarang = function() {
                      let cari = document.getElementById('cari');
                      cari.submit();
                    }
                  </script>
                </div>
              </form>
            </div>
          </div>
          <table id="myTable" class="table table-hovered table-striped table-bordered table-responsive-lg">
            <thead>
              <th>No</th>
              <th>Nomor</th>
              <th>Jenis Data</th>
              <th>Tanggal</th>
              <th>Sifat</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th colspan="3">Nama Penghadap dan atau yang diwakili / kuasa</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($akta as $a) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $a['nomor'] ?></td>
                  <td><?= $a['jenis'] ?></td>
                  <td><?= $a['tanggal'] ?></td>
                  <td><?= $a['sifat'] ?></td>
                  <td><?= $a['nama'] ?></td>
                  <td><?= $a['alamat'] ?></td>
                  <td><?= $a['nama_satu'] ?></td>
                  <td><?= $a['nama_dua'] ?></td>
                  <td><?= $a['nama_tiga'] ?></td>
                  <td>
                    <a href="<?= base_url('berkas/ubah_daftar_akta/') . $a['id'] ?>" class="badge badge-primary">
                      <i class="fas fa-fw fa-edit"></i>
                    </a>
                    <a href="<?= base_url('berkas/hapus_akta/') . $a['id'] ?>" class="badge badge-danger">
                      <i class="fas fa-fw fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>