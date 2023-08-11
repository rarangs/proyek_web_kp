<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('partials/head.php') ?>
  </head>
       <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content" data-url="<?= base_url('m_quotation') ?>">

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
                                <a href="<?= base_url('quotation/export')?>" class="btn btn-danger">
                                    <i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
                                <!-- <a href="<?= base_url('quotation/tambah')?>" class="btn btn-primary btn-sm">
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
                    <h2>Quotation</h2>
                    <div class="clearfix"></div>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <td>No.Quo</td>
                          <td>Creation Date</td>
                          <td>Customer</td>
                          <td>Total</td>
                          <td>Status</td>
                          <td>Detail</td>
                           <?php if ($this->session->login['role'] == 'admin') : ?>
                          <td>Delete</td>
                          <?php endif ?>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($all_quotation as $quotation) : ?>
                          <tr>
                                <td><?= $quotation->q_no++ ?></td>
                              <td><?= $quotation->creation_date ?></td>
                              <td><?= $quotation->id_cust ?></td>
                              <td><?= $quotation->total ?></td>
                              <td><?= $quotation->status ?></td>
                              <td>
                                  <a
                                      onclick="return confirm('apakah anda yakin?')"
                                      href="<?=base_url('quotation/hapus/' .$quotation->q_no) ?>"
                                      class="btn btn-danger btn">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
                              <td>
                                <a
                                      onclick="return confirm('apakah anda yakin?')"
                                      href="<?=base_url('quotation/hapus/' .$quotation->q_no) ?>"
                                      class="btn btn-danger btn">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Quotation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       <form
    action="<?= base_url('quotation/proses_tambah') ?>"
    id="form-tambah"
    method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_pekerjaan">
                <strong>Q no</strong>
            </label>
            <input
                type="text"
                name="q_no"
                placeholder="Masukkan Quotation"
                autocomplete="off"
                class="form-control"
                required="required"
                value="DP<?= mt_rand(100000, 999999) ?>"
                maxlength="8"
                readonly="readonly">
        </div>
        <div class="form-group col-md-6">
            <label for="nama_pekerjaan">
                <strong>Namaadsadas</strong>
            </label>
            <input
                type="text"
                name="nama_pekerjaan"
                placeholder="Masukkan Nama Pekerjaan"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
    </div>
   <div class="form-row">
    <div class="form-group col-md-6">
    <label for="status">
        <strong>Status</strong>
    </label>
    <select name="status" id="status" class="form-control" required="required">
        <option value="">-- Pilih Status --</option>
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
    </select>
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
