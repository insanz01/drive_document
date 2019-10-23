<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?= base_url('berkas/tambah_buku_tamu') ?>" class="btn btn-primary float-right mb-2">Tambah Tamu</a>
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
              <th>Nama</th>
              <th>Alamat</th>
              <th>Tanggal</th>
              <th>Nomor</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($tamu as $a) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $a['nomor'] ?></td>
                  <td><?= $a['nama'] ?></td>
                  <td><?= $a['alamat'] ?></td>
                  <td><?= $a['tanggal'] ?></td>
                  <td><?= $a['nomor'] ?></td>
                  <td><?= $a['keterangan'] ?></td>
                  <td>
                    <a href="#" class="badge badge-primary">
                      <i class="fas fa-fw fa-edit"></i>
                    </a>
                    <a href="#" class="badge badge-danger">
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