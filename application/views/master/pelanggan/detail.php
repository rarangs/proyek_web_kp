<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_pelanggan') ?>">

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
                <a href="<?= base_url('pelanggan')?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
                    <h2>Pelanggan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header"><strong>Isi Form Di Bawah Ini!</strong></div>
                                    <div class="card-body">
                                        <form action="<?= base_url('pelanggan/proses_ubah/' .$pelanggan->id_cust) ?>" id="form-tambah" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_cust"><strong>Id Customer</strong></label>
                                                    <input type="number" name="id_cust" placeholder="Masukkan Id Customer" autocomplete="off" class="form-control" required value="<?= $pelanggan->id_cust ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_cust"><strong>Nama Customer</strong></label>
                                                    <input type="text" name="nama_cust" placeholder="Masukkan Nama Customer" autocomplete="off" class="form-control" required value="<?= $pelanggan->nama_cust ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                                    <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" autocomplete="off" class="form-control" required value="<?= $pelanggan->tgl_lahir; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_telp"><strong>Phone</strong></label>
                                                    <input type="telp" name="no_telp" placeholder="Masukkan No Telpon" autocomplete="off" class="form-control" required value="<?= $pelanggan->no_telp ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat"><strong>Address</strong></label>
                                                    <input type="text" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" class="form-control" required value="<?= $pelanggan->alamat; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="register_date"><strong>Register Date</strong></label>
                                                    <input type="date" name="register_date" placeholder="Input Register Date" autocomplete="off" class="form-control" required value="<?= $pelanggan->register_date; ?>">
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
