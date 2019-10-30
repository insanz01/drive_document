<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?= base_url('berkas/tambah_appt') ?>" class="btn btn-primary float-right mb-2">Tambah APPT</a>
    </div>
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Buku Tamu
        </div>
        <div class="card-body">
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