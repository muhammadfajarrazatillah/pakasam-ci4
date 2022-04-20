<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Tambah Rak - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Tambah Rak</h1>
            <div class="section-header-button">
                <a href="<?=site_url('rak')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Tambah Rak
              </div>
                  <div class="card-body col-md-6">
                  <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?=site_url('rak')?>" method="post"  autocomplete="off">
                          <div class="form-group">
                              <label>Rak</label>
                              <input type="text" name="rak" value="<?=old('rak')?>" class="form-control <?=isset($errors['rak']) ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=isset($errors['rak']) ? $errors['rak'] : null?>
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