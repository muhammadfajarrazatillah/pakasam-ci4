<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Laporan Peminjaman Arsip - Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Laporan Peminjaman Arsip</h1>
            </div>

            <div class="section-body">

<div class="card">
  <div class="card-header">
    Unduh Laporan Peminjaman Arsip
  </div>
      <div class="card-body col-md-6">
      <form action="<?= site_url("peminjaman/export") ?>" method="post">
                <div class="row">
                  <div class="col-sm-3">
                  <select name="filter" id="filter" class="form-control">
                                <?php foreach ($filters as $key => $value) : ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                  </div>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-download"></i> Unduh Laporan
                      </button>
                  </div>
                </div>
                </form>
      </div>
</div>
</div>
</section>
<?= $this->endSection() ?>