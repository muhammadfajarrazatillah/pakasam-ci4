<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Tambah User - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Tambah User</h1>
            <div class="section-header-button">
                <a href="<?=site_url('users')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Tambah User
              </div>
                  <div class="card-body col-md-6">
                  <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?=site_url('users')?>" method="post"  autocomplete="off">
                          <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="nama_user" value="<?=old('nama_user')?>" class="form-control <?=isset($errors['nama_user']) ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=isset($errors['nama_user']) ? $errors['nama_user'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" value="<?=old('username')?>" class="form-control <?=isset($errors['username']) ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=isset($errors['username']) ? $errors['username'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" value="<?=old('password')?>" class="form-control <?=isset($errors['password']) ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=isset($errors['password']) ? $errors['password'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input type="password" name="passkonf" value="<?=old('passkonf')?>" class="form-control <?=isset($errors['passkonf']) ? 'is-invalid' : null ?>" autofocus>
                              <div class="invalid-feedback">
                                  <?=isset($errors['passkonf']) ? $errors['passkonf'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Level</label>
                              <select name="level" class="form-control <?=isset($errors['level']) ? 'is-invalid' : null ?>">
                                <option value="">- Pilih Level-</option>
                                <option value="1" <?=old('level') == 1 ? 'selected' : null?>>Admin</option>
                                <option value="2" <?=old('level') == 2 ? 'selected' : null?>>Petugas Warkah</option>
                               </select>
                               <div class="invalid-feedback">
                                  <?=isset($errors['level']) ? $errors['level'] : null?>
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