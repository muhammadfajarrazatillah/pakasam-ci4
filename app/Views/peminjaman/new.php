<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Tambah Arsip - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<script>
    function setData(e) { 
        var id_warkah = $(e).data('id_warkah');
        var no_hak = $(e).data('no_hak');
        var jenis_arsip = $(e).data('jenis_arsip');
        var jenis_hak = $(e).data('jenis_hak');
        var id_kecamatan = $(e).data('id_kecamatan');
        var id_desa = $(e).data('id_desa');
        var id_rak = $(e).data('id_rak');
        $('#id_warkah').val(id_warkah);
        $('#no_hak').val(no_hak);
        $('#jenis_arsip').val(jenis_arsip);
        $('#jenis_hak').val(jenis_hak);
        $('#id_kecamatan').val(id_kecamatan);
        $('#id_desa').val(id_desa);
        $('#id_rak').val(id_rak);
        $('#modal-arsip').modal('hide');
    }
</script>

<section class="section">
<div class="section-header">
            <h1>Tambah Peminjaman Arsip</h1>
            <div class="section-header-button">
                <a href="<?=site_url('peminjaman')?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="section-body">

            <div class="card">
              <div class="card-header">
                Tambah Peminjaman Arsip
              </div>
                  <div class="card-body col-md-6">
                  <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?=site_url('peminjaman')?>" method="post"  autocomplete="off">
                          <div class="form-group"> 
                                <label>No Hak/Surat Ukur/Surat Perintah Membayar</label> 
                            <div class="input-group"> 
                                <input type="hidden" name="id_warkah" id="id_warkah">
                                <input type="number" name="no_hak" id="no_hak" value="<?=old('no_hak')?>" class="form-control <?=isset($errors['no_hak']) ? 'is-invalid' : null ?>" readonly> 
                            <div class="input-group-append"> 
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-arsip"><i class="fa fa-search"></i></button> 
                            </div> 
                            <div class="invalid-feedback">
                                  <?=isset($errors['no_hak']) ? $errors['no_hak'] : null?>
                              </div>
                            </div> 
                        </div>
                        <div class="form-group">
                              <label>Jenis Arsip</label>
                              <select name="jenis_arsip" id="jenis_arsip" class="form-control" readonly>
                                    <option value="">-Pilih Jenis Arsip-</option>
                                    <option value="Buku Tanah" <?=old('jenis_arsip') == 'Buku Tanah' ? 'selected' : null?>>Buku Tanah</option>
                                    <option value="Surat Ukur" <?=old('jenis_arsip') == 'Surat Ukur' ? 'selected' : null?>>Surat Ukur</option>
                                    <option value="Buku Tanah dan Surat Ukur" <?=old('jenis_arsip') == 'Buku Tanah dan Surat Ukur' ? 'selected' : null?>>Buku Tanah dan Surat Ukur</option>
                                    <option value="Warkah" <?=old('jenis_arsip') == 'Warkah' ? 'selected' : null?>>Warkah</option>
                                    <option value="Warkah Satu Set" <?=old('jenis_arsip') == 'Warkah Satu Set' ? 'selected' : null?>>Warkah Satu Set</option>
                                    <option value="Surat Perintah Membayar" <?=old('jenis_arsip') == 'Surat Perintah Membayar' ? 'selected' : null?>>Surat Perintah Membayar</option>
                               </select>
                          </div>
                          <div class="form-group">
                              <label>Jenis Hak</label>
                              <select name="jenis_hak" id="jenis_hak" class="form-control" readonly>
                                    <option value="">-Pilih Jenis Hak-</option>
                                    <option value="Hak Milik" <?=old('jenis_hak') == 'Hak Milik' ? 'selected' : null?>>Hak Milik</option>
                                    <option value="Hak Guna Bangunan" <?=old('jenis_hak') == 'Hak Guna Bangunan' ? 'selected' : null?>>Hak Guna Bangunan</option>
                                    <option value="Hak Pakai" <?=old('jenis_hak') == 'Hak Pakai' ? 'selected' : null?>>Hak Pakai</option>
                                    <option value="Hak Wakaf" <?=old('jenis_hak') == 'Hak Wakaf' ? 'selected' : null?>>Hak Wakaf</option>
                               </select>
                          </div>
                          <div class="form-group">
                              <label>Kecamatan</label>
                              <select name="id_kecamatan" id="id_kecamatan" class="form-control" readonly>
                              <option value="">-Pilih Kecamatan-</option>
                                  <?php foreach ($kecamatan as $key => $value) : ?>
                                  <option value="<?=$value->id_kecamatan?>" <?=old('id_kecamatan') == $value->id_kecamatan ? 'selected' : null?>>
                                    <?=$value->kecamatan?>
                                  </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Desa/Kelurahan</label>
                              <select name="id_desa" id="id_desa" class="form-control" readonly>
                              <option value="" hidden>-Pilih Desa/Kelurahan-</option>
                                  <?php foreach ($desa as $key => $value) : ?>
                                  <option value="<?=$value->id_desa?>" <?=old('id_desa') == $value->id_desa ? 'selected' : null?>>
                                  <?=$value->desa?>
                                </option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Rak</label>
                              <select name="id_rak" id="id_rak" class="form-control" readonly>
                                  <option value="">-Pilih Rak-</option>
                                  <?php foreach ($rak as $key => $value) : ?>
                                  <option value="<?=$value->id_rak?>" <?=old('id_rak') == $value->id_rak ? 'selected' : null?>>
                                  <?=$value->rak?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Tanggal</label>
                              <input type="date" name="tanggal" value="<?=old('tanggal')?>" class="form-control <?=isset($errors['tanggal']) ? 'is-invalid' : null ?>">
                              <div class="invalid-feedback">
                                  <?=isset($errors['tanggal']) ? $errors['tanggal'] : null?>
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

<div class="modal fade" id="modal-arsip">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Pilih Arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span arian-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Hak/Surat Ukur/Surat Perintah Membayar</th>
                            <th>Jenis Arsip</th>
                            <th>Jenis Hak</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Rak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($warkah as $key => $value) : ?>
                            <tr>
                              <td class="text-center" style="width:5%"><?=$key +1?></td>
                              <td><?=$value->no_hak?></td>
                              <td><?=$value->jenis_arsip?></td>
                              <td><?=$value->jenis_hak?></td>
                              <td><?=$value->kecamatan?></td>
                              <td><?=$value->desa?></td>
                              <td><?=$value->rak?></td>
                                <td class="text-center" style="width:10%">
                                    <button class="btn btn-primary btn-sm select" onclick="setData(this)" data-no_hak="<?=$value->no_hak?>" data-jenis_arsip="<?=$value->jenis_arsip?>" data-jenis_hak="<?=$value->jenis_hak?>" data-id_kecamatan="<?=$value->id_kecamatan?>" data-id_desa="<?=$value->id_desa?>" data-id_rak="<?=$value->id_rak?>" data-id_warkah="<?=$value->id_warkah?>">
                                        <i class="fa fa-check"></i> 
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>