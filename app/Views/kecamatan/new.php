<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Tambah Kecamatan - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Tambah Kecamatan</h1>
            <div class="section-header-button">
                <a href="<?=site_url('kecamatan')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Tambah Kecamatan
              </div>
                  <div class="card-body col-md-6">
                    <?php $validation =  \Config\Services::validation(); ?>
                      <form action="<?=site_url('kecamatan')?>" method="post"  autocomplete="off">
                          <div class="form-group">
                              <label>Kecamatan</label>
                              <input type="text" name="kecamatan" class="form-control <?=$validation->hasError('kecamatan') ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=$validation->getError('kecamatan')?>
                              </div>
                          </div>
                          <div>
                              <button type="submit" class="btn btn-success">Simpan</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                          </div>
                      </form>
                  </div>
            </div>
          </div>
</section>
<?= $this->endSection() ?>