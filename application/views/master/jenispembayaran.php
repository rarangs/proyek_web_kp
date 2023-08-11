<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_user') ?>">

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
                    <h2>Daftar Jenis Pembayaran</h2>
                    <div class="clearfix"></div>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <?php if ($this->session->login['role'] == 'admin') : ?>
                          <td>Aksi</td>
                          <?php endif ?>
                          <td>No</td>
                          <td>Id Pembayaran</td>
                          <td>Jenis Pembayaran</td>
                          <td>Keterangan</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($all_jenis_pembayaran as $jenis_pembayaran) : ?>
                          <tr>
                                <td>
                                  <a
                                      onclick="return confirm('apakah anda yakin?')"
                                      href="<?=base_url('jenispembayaran/hapus/' .$jenis_pembayaran->id_pembayaran) ?>"
                                      class="btn btn-danger btn">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
                              <td><?= $no++ ?></td>
                              <td><?= $jenis_pembayaran->id_pembayaran ?></td>
                              <td><?= $jenis_pembayaran->jenis_pembayaran ?></td>
                              <td><?= $jenis_pembayaran->keterangan ?></td>
                              <?php if ($this->session->login['role'] == 'admin') : ?>
                              
                              <?php endif ?>
                          </tr>
                          <?php endforeach ?>
                      </tbody>
                    </table>
                    <div class="float-right">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
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
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       <form
    action="<?= base_url('jenispembayaran/proses_tambah') ?>"
    id="form-tambah"
    method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_pembayaran">
                <strong>id_pembayaran</strong>
            </label>
            <input
                type="text"
                name="id_pembayaran"
                placeholder="Masukkan Kode Pembayaran"
                autocomplete="off"
                class="form-control"
                required="required"
                value="JP<?= mt_rand(100000, 999999) ?>"
                maxlength="8"
                readonly="readonly">
        </div>
        <div class="form-group col-md-6">
            <label for="jenis_pembayaran">
                <strong>Jenis Pembayaran</strong>
            </label>
            <input
                type="text"
                name="jenis_pembayaran"
                placeholder="Masukkan Jenis Pembayaran"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="keterangan">
                <strong>keterangan</strong>
            </label>
            <input
                type="text"
                name="keterangan"
                placeholder="Masukkan Keterangan"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
    </div>
    <div class="form-row">
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                <button type="reset" class="btn btn-danger">
                    <i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>  
          </div>
        </div>  
      </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
