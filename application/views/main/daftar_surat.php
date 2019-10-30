<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?= base_url('berkas/tambah_daftar_surat') ?>" class="btn btn-primary float-right mb-2">Tambah Daftar Surat</a>
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
              <th>Nomor Surat</th>
              <th>Nama Surat</th>
              <th>Alamat</th>
              <th>Tanggal</th>
              <th>Perihal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($surat as $a) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $a['nomor'] ?></td> <!-- Nomor Surat -->
                  <td><?= $a['nama'] ?></td>
                  <td><?= $a['alamat'] ?></td>
                  <td><?= $a['tanggal'] ?></td>
                  <td><?= $a['perihal'] ?></td>
                  <td><?= $a['keterangan'] ?></td>
                  <td>
                    <a href="<?= base_url('berkas/ubah_daftar_surat/') . $a['id'] ?>" class="badge badge-primary">
                      <i class="fas fa-fw fa-edit"></i>
                    </a>
                    <a href="<?= base_url('berkas/hapus_daftar_surat/') . $a['id'] ?>" class="badge badge-danger">
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