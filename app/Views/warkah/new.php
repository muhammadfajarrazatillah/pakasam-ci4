<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Tambah Arsip - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Tambah Arsip</h1>
            <div class="section-header-button">
                <a href="<?=site_url('warkah')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Tambah Arsip
              </div>
                  <div class="card-body col-md-6">
                  <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?=site_url('warkah')?>" method="post"  autocomplete="off">
                          <div class="form-group">
                              <label>DI 208</label>
                              <input type="text" name="di_208" value="<?=old('di_208')?>" class="form-control" autofocus>
                          </div>
                          <div class="form-group">
                              <label>No Hak/Surat Ukur/Surat Perintah Membayar</label>
                              <input type="text" name="no_hak" value="<?=old('no_hak')?>" class="form-control <?=isset($errors['no_hak']) ? 'is-invalid' : null ?>">
                              <div class="invalid-feedback">
                                  <?=isset($errors['no_hak']) ? $errors['no_hak'] : null?>
                              </div>
                            </div>
                          <div class="form-group">
                              <label>Tahun</label>
                              <input type="number" name="tahun" value="<?=old('tahun')?>" class="form-control <?=isset($errors['tahun']) ? 'is-invalid' : null ?>">
                              <div class="invalid-feedback">
                                  <?=isset($errors['tahun']) ? $errors['tahun'] : null?>
                              </div>
                            </div>
                          <div class="form-group">
                              <label>Jenis Arsip</label>
                              <select name="jenis_arsip" class="form-control <?=isset($errors['jenis_arsip']) ? 'is-invalid' : null ?>">
                                    <option value="">-Pilih Jenis Arsip-</option>
                                    <option value="Buku Tanah" <?=old('jenis_arsip') == 'Buku Tanah' ? 'selected' : null?>>Buku Tanah</option>
                                    <option value="Surat Ukur" <?=old('jenis_arsip') == 'Surat Ukur' ? 'selected' : null?>>Surat Ukur</option>
                                    <option value="Buku Tanah dan Surat Ukur" <?=old('jenis_arsip') == 'Buku Tanah dan Surat Ukur' ? 'selected' : null?>>Buku Tanah dan Surat Ukur</option>
                                    <option value="Warkah" <?=old('jenis_arsip') == 'Warkah' ? 'selected' : null?>>Warkah</option>
                                    <option value="Warkah Satu Set" <?=old('jenis_arsip') == 'Warkah Satu Set' ? 'selected' : null?>>Warkah Satu Set</option>
                                    <option value="Surat Perintah Membayar" <?=old('jenis_arsip') == 'Surat Perintah Membayar' ? 'selected' : null?>>Surat Perintah Membayar</option>
                               </select>
                               <div class="invalid-feedback">
                                  <?=isset($errors['jenis_hak']) ? $errors['jenis_hak'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Jenis Hak</label>
                              <select name="jenis_hak" class="form-control">
                                    <option value="">-Pilih Jenis Hak-</option>
                                    <option value="Hak Milik" <?=old('jenis_hak') == 'Hak Milik' ? 'selected' : null?>>Hak Milik</option>
                                    <option value="Hak Guna Bangunan" <?=old('jenis_hak') == 'Hak Guna Bangunan' ? 'selected' : null?>>Hak Guna Bangunan</option>
                                    <option value="Hak Pakai" <?=old('jenis_hak') == 'Hak Pakai' ? 'selected' : null?>>Hak Pakai</option>
                                    <option value="Hak Wakaf" <?=old('jenis_hak') == 'Hak Wakaf' ? 'selected' : null?>>Hak Wakaf</option>
                               </select>
                          </div>
                          <div class="form-group">
                              <label>Nama Pemilik</label>
                              <input type="text" name="pemilik" value="<?=old('pemilik')?>" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Kecamatan</label>
                              <select name="id_kecamatan" class="form-control">
                                  <option value='selected' : null'>-Pilih Kecamatan-</option>
                                  <?php foreach ($kecamatan as $key => $value) : ?>
                                  <option value="<?=$value->id_kecamatan?>" <?=old('id_kecamatan') == $value->id_kecamatan ? 'selected' : null?>>
                                    <?=$value->kecamatan?>
                                  </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Desa/Kelurahan</label>
                              <select name="id_desa" class="form-control">
                                  <option value="">-Pilih Desa/Kelurahan-</option>
                                  <?php foreach ($desa as $key => $value) : ?>
                                  <option value="<?=$value->id_desa?>" <?=old('id_desa') == $value->id_desa ? 'selected' : null?>>
                                  <?=$value->desa?>
                                </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Rak</label>
                              <select name="id_rak" class="form-control <?=isset($errors['id_rak']) ? 'is-invalid' : null ?>">
                                  <option value="">-Pilih Rak-</option>
                                  <?php foreach ($rak as $key => $value) : ?>
                                  <option value="<?=$value->id_rak?>" <?=old('id_rak') == $value->id_rak ? 'selected' : null?>>
                                  <?=$value->rak?></option>
                                  <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?=isset($errors['id_rak']) ? $errors['id_rak'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <input type="text" name="keterangan" value="<?=old('keterangan')?>" class="form-control">
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