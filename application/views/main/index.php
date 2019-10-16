<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/98f1a0cbdc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

  <title>Dokumenku</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto py-4">
        <a href="<?= base_url('berkas/tambah_berkas') ?>" class="btn btn-primary">Upload Berkas</a>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mx-auto py-4">
        <?= $this->session->flashdata('pesan'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mx-auto">
        <table class="table table-hover" id="tabelku" width="100%">
          <thead>
            <th width="60%">Nama Dokumen</th>
            <th width="20%">Download</th>
            <th width="20%">Action</th>
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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
</body>

</html>