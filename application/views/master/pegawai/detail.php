<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_pegawai') ?>">

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
                <a href="<?= base_url('pegawai')?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
                    <h2>Daftar Pekerjaan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header"><strong>Isi Form Di Bawah Ini!</strong></div>
                                    <div class="card-body">
                                        <form action="<?= base_url('pegawai/proses_ubah/' .$pegawai->id_pegawai) ?>" id="form-tambah" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_pegawai"><strong>Nama Pegawai</strong></label>
                                                    <input type="text" name="nama_pegawai" placeholder="Masukkan Nama Pegawai" autocomplete="off" class="form-control" required value="<?= $pegawai->nama_pegawai ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                                    <input type="text" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" autocomplete="off" class="form-control" required value="<?= $pegawai->tgl_lahir ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="pekerjaan"><strong>Pekerjaan</strong></label>
                                                    <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" autocomplete="off" class="form-control" required value="<?= $pegawai->pekerjaan ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat"><strong>Alamat</strong></label>
                                                    <input type="text" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" class="form-control" required value="<?= $pegawai->alamat ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="telp"><strong>No Telp</strong></label>
                                                    <input type="number" name="telp" placeholder="Masukkan No Telp" autocomplete="off" class="form-control" required value="<?= $pegawai->telp ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tanggal_masuk"><strong>Tanggal Masuk</strong></label>
                                                    <input type="date" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" autocomplete="off" class="form-control" required value="<?= $pegawai->tanggal_masuk ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tanggal_resign"><strong>Tanggal Resign</strong></label>
                                                    <input type="date" name="tanggal_resign" placeholder="Masukkan Tanggal Resign" autocomplete="off" class="form-control" required value="<?= $pegawai->tanggal_resign ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_rek"><strong>No Rek</strong></label>
                                                    <input type="text" name="no_rek" placeholder="Masukkan Nomor Rekening" autocomplete="off" class="form-control" required value="<?= $pegawai->no_rek ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_bank"><strong>Nama Bank</strong></label>
                                                    <input type="text" name="nama_bank" placeholder="Masukkan Nama Bank" autocomplete="off" class="form-control" required value="<?= $pegawai->nama_bank ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="gapok"><strong>Gapok</strong></label>
                                                    <input type="number" name="gapok" placeholder="Masukkan Gapok" autocomplete="off" class="form-control" required value="<?= $pegawai->gapok ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="uang_makan"><strong>Uang Makan</strong></label>
                                                    <input type="number" name="uang_makan" placeholder="Masukkan Uang Makan" autocomplete="off" class="form-control" required value="<?= $pegawai->uang_makan ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="persentase"><strong>Persentase</strong></label>
                                                    <input type="number" name="persentase" placeholder="Masukkan Persentase" autocomplete="off" class="form-control" required value="<?= $pegawai->persentase ?>">
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
