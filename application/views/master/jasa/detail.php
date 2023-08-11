<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_jasa') ?>">

              <!-- top navigation -->
            <?php $this->load->view('partials/topbar.php') ?>
              <!-- /top navigation -->
            
              <!-- page content -->
              <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="float-left">
              <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
            </div>
            <div class="float-right">
                <a href="<?= base_url('jasa')?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </div>
            <!-- <div class="float-right">
                                <?php if ($this->session->login['role'] == 'admin') : ?>
                                <a href="<?= base_url('barang/export')?>" class="btn btn-danger">
                                    <i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
                                <!-- <a href="<?= base_url('barang/tambah')?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Tambah
                                    </button>
                                <?php endif ?>
                            </div> -->
                        </div>
                        <br>
                        <hr>
                        </br>
                        <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                            <buttontype="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jasa Layanan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header"><strong>Isi Form Di Bawah Ini!</strong></div>
                                    <div class="card-body">
                                        <form action="<?= base_url('jasa/proses_ubah/' .$jasa->id_jasa) ?>" id="form-tambah" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_jasa"><strong>Id Layanan</strong></label>
                                                    <input type="number" name="id_jasa" placeholder="Masukkan Id Jasa" autocomplete="off" class="form-control" required value="<?= $jasa->id_jasa ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_jasa"><strong>Nama Jasa</strong></label>
                                                    <input type="text" name="nama_jasa" placeholder="Masukkan Nama Jasa" autocomplete="off" class="form-control" required value="<?= $jasa->nama_jasa ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                 <label for="kategori_jasa"><strong>Kategori</strong></label>
                                                    <select name="kategori_jasa" id="kategori_jasa" class="form-control" required>
                                                        <option value="">-- Silahkan Pilih --</option>
                                                        <option value="perawatan rambut" <?= $jasa->kategori_jasa == 'perawatan rambut' ? 'selected' : '' ?>>Perawatan Rambut</option>
                                                        <option value="perawatan muka" <?= $jasa->kategori_jasa == 'perawatan muka' ? 'selected' : '' ?>>Perawatan Muka</option>
                                                        <option value="styling rambut" <?= $jasa->kategori_jasa == 'styling rambut' ? 'selected' : '' ?>>Styling Rambut</option>
                                                        <option value="perawatan kaki dan tangan" <?= $jasa->kategori_jasa == 'perawatan kaki dan tangan' ? 'selected' : '' ?>>Perawatan Kaki dan tangan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="harga"><strong>Harga</strong></label>
                                                    <input type="number" name="harga" placeholder="Masukkan Harga" autocomplete="off" class="form-control" required value="<?= $jasa->harga; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="deskripsi"><strong>Deskripsi</strong></label>
                                                    <input type="text" name="deskripsi" placeholder="Masukkan Deskripsi" autocomplete="off" class="form-control" required value="<?= $jasa->deskripsi ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                            </div>    
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
              <!-- /page content -->

              <!-- footer content -->
            <?php $this->load->view('partials/footer.php') ?>
              <!-- /footer content -->
             
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
