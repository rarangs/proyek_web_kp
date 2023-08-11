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
                    <h2>Data Pegawai</h2>
                    <div class="clearfix"></div>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <?php if ($this->session->login['role'] == 'admin') : ?>
                          <td>Aksi</td>
                          <?php endif ?>
                          <td>No</td>
                          <td>Id</td>
                          <td>Nama</td>
                          <td>Tanggal Lahir</td>
                          <td>Pekerjaan</td>
                          <td>Telp</td>
                          <td>Alamat</td>
                          <td>Libur</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($all_pegawai as $pegawai): ?>
                          <tr>
                               <td>
                                    <a
                                     href="<?= ('pegawai/ubah/'. $pegawai->id_pegawai) ?>"
                                     class="btn btn-success btn-sm">
                                     Detail
                                    </a>
                                    <a
                                      onclick="return confirm('apakah anda yakin?')"
                                      href="<?=base_url('pegawai/hapus/' .$pegawai->id_pegawai) ?>"
                                      class="btn btn-danger btn-sm">Hapus
                                  </a>
                               </td>
                              <td><?= $no++ ?></td>
                              <td><?= $pegawai->id_pegawai ?></td>
                              <td><?= $pegawai->nama_pegawai ?></td>
                              <td><?= $pegawai->tgl_lahir ?></td>
                              <td><?= $pegawai->pekerjaan ?></td>
                              <td><?= $pegawai->telp ?></td>
                              <td><?= $pegawai->alamat ?></td>
                              <td><?= $pegawai->libur ?>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
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
                <strong>Nama Pegawai</strong>
            </label>
            <input
                type="text"
                name="nama_pegawai"
                placeholder="Masukkan Nama Pegawai"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="tgl_lahir">
                <strong>Tanggal Lahir</strong>
            </label>
            <input
                type="date"
                name="tgl_lahir"
                placeholder="Masukkan Tanggal Lahir"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="pekerjaan">
                <strong>Pekerjaan</strong>
            </label>
            <input
                type="text"
                name="pekerjaan"
                placeholder="Masukkan Pekerjaan"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="alamat">
                <strong>Alamat</strong>
            </label>
            <input
                type="text"
                name="alamat"
                placeholder="Masukkan Alamat"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="telp">
                <strong>No Telp</strong>
            </label>
            <input
                type="number"
                name="telp"
                placeholder="Masukkan No Telpon"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="tanggal_masuk">
                <strong>Tanggal Masuk</strong>
            </label>
            <input
                type="date"
                name="tanggal_masuk"
                placeholder="Masukkan Tanggal Masuk"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="tanggal_resign">
                <strong>Tanggal Resign</strong>
            </label>
            <input
                type="date"
                name="tanggal_resign"
                placeholder="Masukkan Tanggal Resign"
                autocomplete="off"
                class="form-control">
        </div>
        <div class="form-group col-md-10">
            <label for="nama_bank">
                <strong>Nama Bank</strong>
            </label>
            <input
                type="text"
                name="nama_bank"
                placeholder="Masukkan Nama Bank"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="no_rek">
                <strong>No Rek</strong>
            </label>
            <input
                type="number"
                name="no_rek"
                placeholder="Masukkan No Rekening"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="gapok">
                <strong>Gapok</strong>
            </label>
            <input
                type="number"
                name="gapok"
                placeholder="Masukkan Gaji Pokok"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="uang_makan">
                <strong>Uang Makan</strong>
            </label>
            <input
                type="number"
                name="uang_makan"
                placeholder="Masukkan Uang Makan"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="persentase">
                <strong>Persentase</strong>
            </label>
            <input
                type="number"
                name="persentase"
                placeholder="Masukkan Persentase"
                autocomplete="off"
                class="form-control"
                required="required">
        </div>
        <div class="form-group col-md-10">
            <label for="satuan">
                <strong>Libur</strong>
            </label>
                <select name="satuan" id="satuan" class="form-control" required="required">
                <option value="">-- Pilih Libur --</option>
                <option value="senin">Senin</option>
                <option value="selasa">Selasa</option>
                <option value="kamis">Kamis</option>
                <option value="jumat">Jumat</option>
                <option value="sabtu">Sabtu</option>
                <option value="minggu">Minggu</option>
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
        </div>
        </div>  
          </div>
        </div>  
      </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
  </body>
</html>
