<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_pembelian') ?>">

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
                    <h2>Riwayat Pembelian</h2>
                    <div class="clearfix"></div>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <?php if ($this->session->login['role'] == 'admin') : ?>
                          <td>Aksi</td>
                          <?php endif ?>
                          <td>No</td>
                          <td>No Faktur</td>
                          <td>Tanggal</td>
                          <td>Item Belanja</td>
                          <td>Total</td>
                          <td>User</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($all_pembelian as $pembelian): ?>
                          <tr>
                               <td>
                                    <a
                                     href="<?= ('pembelian/ubah/'. $pembelian->no_faktur) ?>"
                                     class="btn btn-success btn-sm">
                                     Detail
                                    </a>
                                    <a
                                      onclick="return confirm('apakah anda yakin?')"
                                      href="<?=base_url('pembelian/hapus/' .$pembelian->no_faktur) ?>"
                                      class="btn btn-danger btn-sm">Hapus
                                  </a>
                               </td>
                              <td><?= $no++ ?></td>
                              <td><?= $pembelian->no_faktur ?></td>
                              <td><?= $pembelian->tgl_beli ?></td>
                              <td><?= $pembelian->total_item ?></td>
                              <td><?= $pembelian->total ?></td>
                              <td><?= $pembelian->user ?></td>
                              <?php if ($this->session->login['role'] == 'admin') : ?>
                              
                              <?php endif ?>
                          </tr>
                          <?php endforeach ?>
                      </tbody>
                    </table>
                    <div class="float-right">
                    <a href="<?= base_url('pembelian/tambah')?>" class="btn btn-danger btn-sm">&nbsp;&nbsp;Pembelian Baru</a>
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
              <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       <form
    action="<?= base_url('pegawai/proses_tambah') ?>"
    id="form-tambah"
    method="POST">
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="nama_pegawai">
                <strong>No Faktur</strong>
            </label>
            <input
                type="text"
                name="no_faktur"
                placeholder=""
                autocomplete="off"
                class="form-control"
                required="required"
                value="NF<?= mt_rand(100000, 999999) ?>"
                maxlength="8"
                readonly="readonly">
        </div>
        <div class="form-group col-md-10">
            <label for="tgl_beli">
                <strong>Tanggal Beli</strong>
            </label>
            <input
                type="date"
                name="tgl_beli"
                placeholder="Masukkan Tanggal Pembelian"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="total_item">
                <strong>Item Belanja</strong>
            </label>
            <input
                type="text"
                name="total_item"
                placeholder="Masukkan Total Item"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="total">
                <strong>Total</strong>
            </label>
            <input
                type="number"
                name="total"
                placeholder="Masukkan Total"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="user">
                <strong>User</strong>
            </label>
                <select name="user" id="user" class="form-control" required="required">
                <option value="">-- Pilih User --</option>
                <option value="abdul">Abdul</option>
                <option value="roni">Roni</option>
                <option value="endang">Endang</option>
            </select>
        </div>
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
        </div> -->
        </div>  
          </div>
        </div>  
      </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
