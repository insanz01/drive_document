<!-- Image and text -->
<!-- <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url() ?>assets/img/logo-ini.jpeg" width="35" height="35" class="d-inline-block align-top" alt="">
      App Arsip Notaris & PPAT
    </a>
    <button class="btn btn-outline-success float-right">
      <i class="fas fa-fw fa-sign-out-alt"></i> Keluar
    </button>
  </nav> -->
<div class="container">
  <div class="row">
    <div class="col-12 mx-auto py-4">
      <a href="<?= base_url('berkas/tambah_berkas') ?>" class="btn btn-primary">Upload Berkas</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mx-auto py-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mx-auto">
      <table class="table table-hover" id="tabelku" width="100%">
        <thead>
          <th width="60%">Nama Dokumen</th>
          <th width="20%" class="text-center">Download</th>
          <th width="20%" class="text-center">Action</th>
        </thead>
        <tbody>
          <?php foreach ($dokumen as $d) : ?>
            <tr>
              <td><?= $d['nama_dokumen'] ?></td>
              <td class="text-center">
                <a href="<?= $d['path'] ?>">
                  <i class="fas fa-fw fa-download"></i>
                </a>
              </td>
              <td class="text-center">
                <button type="button" class="badge badge-danger badge-pill" ketempelan="<?= $d['id'] ?>" kerasukan="<?= $d['path'] ?>" data-toggle="modal" data-target="#hapusModal" onclick="getId(this)">
                  hapus
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('berkas/hapus_berkas') ?>" method="post">
        <div class="modal-body">
          <p class="lead">Apakah kamu ingin menghapus dokumen tersebut ?</p>
          <input type="hidden" name="id" id="id_hapus">
          <input type="hidden" name="path" id="path_hapus">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus Dokumen</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tabelku').DataTable();
  });

  const getId = (e) => {
    let id = document.getElementById('id_hapus');
    let path = document.getElementById('path_hapus');

    id.value = e.getAttribute('ketempelan');
    path.value = e.getAttribute('kerasukan');
  }
</script>