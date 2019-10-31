<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Rekap Dokumen
        </div>
        <div class="card-body">
          <table id="" class="table table-hovered table-striped table-bordered">
            <thead>
              <th width="5%" class="text-center">No</th>
              <th width="90%" class="text-center">Nama Tabel Arsip</th>
              <th width="5%" class="text-center">Jumlah</th>
            </thead>
            <tbody>
              <?php
              $i = 1;
              // $list = array('Daftar Akta', 'Daftar Surat', 'Akta PPAT', 'Buku Tamu');
              $list = array('APHT', 'SKMHT', 'JUAL BELI');
              ?>
              <?php foreach ($agenda as $a) : ?>
                <tr>
                  <td class="text-center"><?= $i++; ?></td>
                  <td class="text-left"><?= $list[$i - 2] ?></td>
                  <td class="text-center"><?= $a['total'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>