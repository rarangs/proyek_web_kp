<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_diskon') ?>">

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
                <a href="<?= base_url('diskon')?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
                    <h2>Data Diskon</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header"><strong>Isi Form Di Bawah Ini!</strong></div>
                                    <div class="card-body">
                                        <form action="<?= base_url('diskon/proses_ubah/' .$diskon->id_diskon) ?>" id="form-tambah" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_diskon"><strong>Id Disc</strong></label>
                                                    <input type="number" name="id_diskon" placeholder="Masukkan Id Diskon" autocomplete="off" class="form-control" required value="<?= $diskon->id_diskon ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_diskon"><strong>Nama Diskon</strong></label>
                                                    <input type="text" name="nama_diskon" placeholder="Masukkan Nama Diskon" autocomplete="off" class="form-control" required value="<?= $diskon->nama_diskon ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                 <label for="jenis_diskon"><strong>Jenis Diskon</strong></label>
                                                    <select name="jenis_diskon" id="jenis_diskon" class="form-control" required>
                                                        <option value="">-- Silahkan Pilih --</option>
                                                        <option value="perawatan rambut" <?= $diskon->jenis_diskon == 'angka' ? 'selected' : '' ?>>Angka</option>
                                                        <option value="perawatan muka" <?= $diskon->jenis_diskon == 'persentase' ? 'selected' : '' ?>>Persentase</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="harga_diskon"><strong>Harga Diskon</strong></label>
                                                    <input type="number" name="harga_diskon" placeholder="Masukkan Harga Diskon" autocomplete="off" class="form-control" required value="<?= $diskon->harga_diskon; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="keterangan"><strong>Keterangan</strong></label>
                                                    <input type="text" name="keterangan" placeholder="Masukkan Keterangan" autocomplete="off" class="form-control" required value="<?= $diskon->keterangan ?>">
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
