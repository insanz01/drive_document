<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?= base_url('berkas/tambah_appt') ?>" class="btn btn-primary float-right mb-2">Tambah Akta PPAT</a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Akta PPAT
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="<?= base_url('berkas/appt') ?>" method="post" id="cari" name="cari">
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
          <div class="table-responsive table-responsive-lg">
            <table width="100%" id="myTable" class="table table-hovered table-striped table-bordered">
              <thead>
                <th>No</th>
                <th>Nomor Akta</th>
                <th>Tanggal Akta</th>
                <th>Perbuatan Hukum</th>
                <th>Pihak Memberikan</th>
                <th>Pihak Menerima</th>
                <th>Jenis Nomor dan HAK</th>
                <th>Letak Tanah</th>
                <th>Luas Tanah</th>
                <th>Luas Bangunan</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($appt as $a) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a['nomor_akta'] ?></td>
                    <td><?= $a['tanggal_akta'] ?></td>
                    <td><?= $a['perbuatan_hukum'] ?></td>
                    <td><?= $a['pihak_memberikan'] ?></td> <!-- Nomor Telepon -->
                    <td><?= $a['pihak_menerima'] ?></td>
                    <td><?= $a['jenis_nomor_hak'] ?></td>
                    <td><?= $a['letak_tanah'] ?></td>
                    <td><?= $a['luas_tanah'] ?></td>
                    <td><?= $a['luas_bangunan'] ?></td>
                    <td>
                      <a href="<?= base_url('berkas/ubah_appt/') . $a['id'] ?>" class="badge badge-primary">
                        <i class="fas fa-fw fa-edit"></i>
                      </a>
                      <a href="<?= base_url('berkas/hapus_appt/') . $a['id'] ?>" class="badge badge-danger">
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
</div>