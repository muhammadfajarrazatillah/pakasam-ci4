<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Home - Si Pakasam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
                </div>
                <div class="section-body">
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                        <i class="far fa-square"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Kecamatan</h4>
                        </div>
                        <div class="card-body">
                          <?=countData('kecamatan')?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-danger">
                        <i class="fas fa-th"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Desa/Kelurahan</h4>
                        </div>
                        <div class="card-body">
                        <?=countData('desa')?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="fas fa-th-large"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Rak</h4>
                        </div>
                        <div class="card-body">
                        <?=countData('rak')?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                        <i class="far fa-file-alt"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Arsip</h4>
                        </div>
                        <div class="card-body">
                        <?=countData('warkah')?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
</section>
<?= $this->endSection() ?>