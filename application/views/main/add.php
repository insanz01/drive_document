  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto py-4">
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('berkas/store') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama">Nama Berkas</label>
                <input type="text" class="form-control" name="nama" id="nama">
              </div>
              <div class="form-group">
                <label for="jenis">Jenis Akta</label>
                <input type="text" class="form-control" name="jenis" id="jenis">
              </div>
              <div class="form-group">
                <label for="nomor">Nomor Akta</label>
                <input type="text" class="form-control" name="nomor" id="nomor">
              </div>
              <div class="form-group">
                <label for="berkas">Berkas file</label>
                <input type="file" class="form-control" name="berkas" id="berkas">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan berkas</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>