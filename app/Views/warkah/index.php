<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Data Arsip - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Arsip</h1>
            <div class="section-header-button">
                <a href="<?=site_url('warkah/new')?>" class="btn btn-primary">Tambah</a>
            </div>
          </div>

          <?php if(session()->getFlashdata('succes')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?=session()->getFlashdata('succes')?>
              </div>
            </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('warning')) : ?>
            <div class="alert alert-warning alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?=session()->getFlashdata('warning')?>
              </div>
            </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('danger')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?=session()->getFlashdata('danger')?>
              </div>
            </div>
            <?php endif; ?>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                Data Warkah
              </div>
                  <div class="card-body table-responsive">
                          <table class="table table-striped table-md" id="table1">
                            <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">DI 208</th>
                              <th class="text-center">No Hak/Surat Ukur/Surat Perintah Membayar</th>
                              <th class="text-center">Tahun</th>
                              <th class="text-center">Jenis Arsip</th>
                              <th class="text-center">Jenis Hak</th>
                              <th class="text-center">Nama Pemilik</th>
                              <th class="text-center">Kecamatan</th>
                              <th class="text-center">Desa/Kelurahan</th>
                              <th class="text-center">Rak</th>
                              <th class="text-center">Keterangan</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($warkah as $key => $value) : ?>
                            <tr>
                              <td class="text-center" style="width:5%"><?=$key +1?></td>
                              <td><?=$value->di_208?></td>
                              <td><?=$value->no_hak?></td>
                              <td><?=$value->tahun?></td>
                              <td><?=$value->jenis_arsip?></td>
                              <td><?=$value->jenis_hak?></td>
                              <td><?=$value->pemilik?></td>
                              <td><?=$value->kecamatan?></td>
                              <td><?=$value->desa?></td>
                              <td><?=$value->rak?></td>
                              <td><?=$value->keterangan?></td>
                              <td class="text-center" style="width:10%">
                                <a href="<?=site_url('warkah/'. $value->id_warkah.'/edit')?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?=site_url('warkah/'. $value->id_warkah)?>" method="post" class="d-inline" id="del-<?=$value->id_warkah?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value->id_warkah?>)">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                  </div>
          </div>
</section>
<?= $this->endSection() ?>