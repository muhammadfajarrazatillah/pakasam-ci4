<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Arsip - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
<div class="section-header">
            <h1>Edit Arsip</h1>
            <div class="section-header-button">
                <a href="<?=site_url('warkah')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Edit Arsip
              </div>
                  <div class="card-body col-md-6">
                  <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?=site_url('warkah/'. $warkah->id_warkah)?>" method="post"  autocomplete="off">
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                              <label>DI 208</label>
                              <input type="number" name="di_208" value="<?=$warkah->di_208?>" class="form-control" autofocus>
                          </div>
                          <div class="form-group">
                              <label>No Hak/Surat Ukur/Surat Perintah Membayar</label>
                              <input type="number" name="no_hak" value="<?=old('no_hak', $warkah->no_hak)?>" class="form-control <?=isset($errors['no_hak']) ? 'is-invalid' : null?>">
                              <div class="invalid-feedback">
                                  <?=isset($errors['no_hak']) ? $errors['no_hak'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Tahun</label>
                              <input type="number" name="tahun" value="<?=old('tahun', $warkah->tahun)?>" class="form-control <?=isset($errors['tahun']) ? 'is-invalid' : null?>">
                              <div class="invalid-feedback">
                                  <?=isset($errors['tahun']) ? $errors['tahun'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Jenis Arsip</label>
                              <select name="jenis_hak" class="form-control <?=isset($errors['jenis_hak']) ? 'is-invalid' : null?>">
                              <option <?php if ($warkah->jenis_hak == "Hak Milik") {
                                            echo "selected='selected'";
                                        }
                                        echo $warkah->jenis_hak; ?> value="Hak Milik">Hak Milik</option>
                                <option <?php if ($warkah->jenis_hak == "Hak Guna Bangunan") {
                                            echo "selected='selected'";
                                        }
                                        echo $warkah->jenis_hak; ?> value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                                <option <?php if ($warkah->jenis_hak == "Hak Pakai") {
                                            echo "selected='selected'";
                                        }
                                        echo $warkah->jenis_hak; ?> value="Hak Pakai">Hak Pakai</option>
                                <option <?php if ($warkah->jenis_hak == "Surat Ukur") {
                                            echo "selected='selected'";
                                        }
                                        echo $warkah->jenis_hak; ?> value="Surat Ukur">Surat Ukur</option>
                                <option <?php if ($warkah->jenis_hak == "Surat Perintah Membayar") {
                                            echo "selected='selected'";
                                        }
                                        echo $warkah->jenis_hak; ?> value="Surat Perintah Membayar">Surat Perintah Membayar</option>
                               </select>
                               <div class="invalid-feedback">
                                  <?=isset($errors['jenis_hak']) ? $errors['jenis_hak'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Nama Pemilik</label>
                              <input type="text" name="pemilik" value="<?=$warkah->pemilik?>" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Kecamatan</label>
                              <select name="id_kecamatan" class="form-control <?=isset($errors['kecamatan']) ? 'is-invalid' : null?>">
                                  <option value="" hidden></option>
                                  <?php foreach ($kecamatan as $key => $value) : ?>
                                  <option value="<?=$value->id_kecamatan?>" <?=old('id_kecamatan', $warkah->id_kecamatan) == $value->id_kecamatan ? 'selected' : null?>>
                                    <?=$value->kecamatan?>
                                  </option>
                                  <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?=isset($errors['kecamatan']) ? $errors['kecamatan'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Desa/Kelurahan</label>
                              <select name="id_desa" class="form-control <?=isset($errors['desa']) ? 'is-invalid' : null?>">
                                  <option value="" hidden></option>
                                  <?php foreach ($desa as $key => $value) : ?>
                                  <option value="<?=$value->id_desa?>" <?=old('id_desa', $warkah->id_desa) == $value->id_desa ? 'selected' : null?>>
                                  <?=$value->desa?>
                                  </option>
                                  <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?=isset($errors['desa']) ? $errors['desa'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Rak</label>
                              <select name="id_rak" class="form-control <?=isset($errors['rak']) ? 'is-invalid' : null?>">
                                  <option value="" hidden></option>
                                  <?php foreach ($rak as $key => $value) : ?>
                                  <option value="<?=$value->id_rak?>" <?=old('id_rak', $warkah->id_rak) == $value->id_rak ? 'selected' : null?>>
                                    <?=$value->rak?>
                                  </option>
                                  <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                  <?=isset($errors['rak']) ? $errors['rak'] : null?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <input type="text" name="keterangan" value="<?=$warkah->keterangan?>" class="form-control">
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