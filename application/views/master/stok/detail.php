<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_stok') ?>">

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
                <a href="<?= base_url('stok')?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
                    <h2>Stok</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header"><strong>Isi Form Di Bawah Ini!</strong></div>
                                    <div class="card-body">
                                        <form action="<?= base_url('stok/proses_ubah/' .$stok->stokid) ?>" id="form-tambah" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="stokid"><strong>Kode Produk</strong></label>
                                                    <input type="number" name="stokid" placeholder="Masukkan Kode Produk" autocomplete="off" class="form-control" required value="<?= $stok->stokid ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_barang"><strong>Nama Produk</strong></label>
                                                    <input type="text" name="nama_barang" placeholder="Masukkan Nama Produk" autocomplete="off" class="form-control" required value="<?= $stok->nama_barang ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                 <label for="satuan"><strong>Satuan Produk</strong></label>
                                                    <select name="satuan" id="satuan" class="form-control" required>
                                                        <option value="">-- Silahkan Pilih --</option>
                                                        <option value="pcs" <?= $stok->satuan == 'pcs' ? 'selected' : '' ?>>PCS</option>
                                                        <option value="sachet" <?= $stok->satuan == 'ml' ? 'selected' : '' ?>>ML</option>
                                                        <option value="renceng" <?= $stok->satuan == 'box' ? 'selected' : '' ?>>BOX</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                 <label for="kategori"><strong>Kategori</strong></label>
                                                    <select name="kategori" id="kategori" class="form-control" required>
                                                        <option value="">-- Silahkan Pilih --</option>
                                                        <option value="pcs" <?= $stok->kategori == 'perawatan rambut' ? 'selected' : '' ?>>Perawatan Rambut</option>
                                                        <option value="sachet" <?= $stok->kategori == 'perawatan muka' ? 'selected' : '' ?>>Perawatan Muka</option>
                                                        <option value="renceng" <?= $stok->kategori == 'styling rambut' ? 'selected' : '' ?>>Styling Rambut</option>
                                                        <option value="renceng" <?= $stok->kategori == 'perawatan kaki dan tangan' ? 'selected' : '' ?>>Perawatan Kaki dan tangan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="harga_modal"><strong>Harga Modal</strong></label>
                                                    <input type="number" name="harga_modal" placeholder="Masukkan Harga Modal" autocomplete="off" class="form-control" required value="<?= $stok->harga_modal; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="harga_jual"><strong>Harga Jual</strong></label>
                                                    <input type="number" name="harga_jual" placeholder="Masukkan Harga Jual" autocomplete="off" class="form-control" required value="<?= $stok->harga_jual ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="stok_masuk"><strong>Stok Masuk</strong></label>
                                                    <input type="number" name="stok_masuk" placeholder="Masukkan Stok Masuk" autocomplete="off" class="form-control" required value="<?= $stok->stok_masuk; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="stok_minimal"><strong>Stok Minimal</strong></label>
                                                    <input type="number" name="stok_minimal" placeholder="Masukkan Stok Minimal" autocomplete="off" class="form-control" required value="<?= $stok->stok_minimal; ?>">
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
