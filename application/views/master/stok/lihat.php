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
                    <h2>Data Stok</h2>
                    <div class="clearfix"></div>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                            <td>Kode Produk</td>
                            <td>Nama Produk</td>
                            <td>Satuan Produk</td>
                            <td>Kategori</td>
                            <td>Harga Modal</td>
                            <td>Harga Jual</td>
                            <td>Stok Masuk</td>
                            <td>Stok Minimal</td>
                            <?php if ($this->session->login['role'] == 'admin') : ?>
                            <td>Aksi</td>
                            <?php endif ?>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($all_stok as $stok): ?>
                          <tr>
                              <td><?= $stok->stokid ?></td>
                              <td><?= $stok->nama_barang ?></td>
                              <td><?= $stok->satuan ?></td>
                              <td><?= $stok->kategori ?></td>
                              <td><?= $stok->harga_modal ?></td>
                              <td><?= $stok->harga_jual ?></td>
                              <td><?= $stok->stok_masuk ?>
                              <td><?= $stok->stok_minimal ?>
                              <?php if ($this->session->login['role'] == 'admin') : ?>
                                <td>
                                     <a
                                      href="<?= ('stok/ubah/'. $stok->stokid) ?>"
                                      class="btn btn-success btn-sm">
                                      Edit
                                     </a>
                                     <a
                                       onclick="return confirm('apakah anda yakin?')"
                                       href="<?=base_url('stok/hapus/' .$stok->stokid) ?>"
                                       class="btn btn-danger btn-sm">
                                       Delete
                                   </a>
                                </td>
                                
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Stok</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       <form
    action="<?= base_url('stok/proses_tambah') ?>"
    id="form-tambah"
    method="POST">
    <div class="form-row">
    <div class="form-group col-md-6">
            <label for="stokid">
                <strong>Kode Produk</strong>
            </label>
            <input
                type="text"
                name="stokid"
                placeholder="Masukkan Kode Produk"
                autocomplete="off"
                class="form-control"
                required="required"
                value="DS<?= mt_rand(100000, 999999) ?>"
                maxlength="8"
                readonly="readonly">
        </div>
        <div class="form-group col-md-10">
            <label for="nama_barang">
                <strong>Nama Produk</strong>
            </label>
            <input
                type="text"
                name="nama_barang"
                placeholder="Masukkan Nama Barang"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="satuan">
                <strong>Satuan Porduk</strong>
            </label>
                <select name="satuan" id="satuan" class="form-control" required="required">
                <option value="">-- Pilih Satuan --</option>
                <option value="pcs">PCS</option>
                <option value="ml">ML</option>
                <option value="box">BOX</option>
            </select>
        </div>
        <div class="form-group col-md-10">
            <label for="kategori">
                <strong>Kategori</strong>
            </label>
                <select name="kategori" id="kategori" class="form-control" required="required">
                <option value="">-- Pilih kategori --</option>
                <option value="perawatan rambut">Perawatan Rambut</option>
                <option value="perawatan wajah">Perawatan wajah</option>
                <option value="styling rambut">Styling Rambut</option>
                <option value="perawatan kaki dan tangan">Perawatan Kaki Dan Tangan</option>
            </select>
        </div>
        <div class="form-group col-md-10">
            <label for="harga_modal">
                <strong>Harga Modal</strong>
            </label>
            <input
                type="number"
                name="harga_modal"
                placeholder="Masukkan Harga Modal"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="harga_jual">
                <strong>Harga Jual</strong>
            </label>
            <input
                type="number"
                name="harga_jual"
                placeholder="Masukkan Harga Jual"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="stok_masuk">
                <strong>Stok Masuk</strong>
            </label>
            <input
                type="number"
                name="stok_masuk"
                placeholder="Jumlah Stok Masuk"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="stok_minimal">
                <strong>Stok Minimal</strong>
            </label>
            <input
                type="number"
                name="stok_minimal"
                placeholder="Masukkan Stok Minimal"
                autocomplete="off"
                class="form-control">
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
        </div>
        </div>  
          </div>
        </div>  
      </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
