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
          <table id="myTable" class="table table-hovered table-striped table-bordered table-responsive-lg">
            <thead>
              <th>No</th>
              <th>Nomor</th>
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