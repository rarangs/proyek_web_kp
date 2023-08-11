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
        </div>
        <div class="float-right">
            <a href="<?= base_url('pembelian') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
            
                    <div class="row">
						<div class="col">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('pembelian/proses_tambah') ?>" id="form-tambah" method="POST">
										<h5>Keranjang Pembelian</h5>
										<hr>
										<div class="form-row">
											<div class="form-group col-2">
												<label>No. Faktur</label>
												<input type="text" name="no_faktur" value="NF<?= mt_rand(100000, 999999) ?>" readonly class="form-control">
											</div>
											<div class="form-group col-3">
												<label>User</label>
												<input type="text" name="username" value="<?= $this->session->login['username'] ?>" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Tanggal Pembelian</label>
												<input type="text" name="tgl_beli" value="<?= date('d/m/Y') ?>" readonly class="form-control">
											</div>
										</div>
										<h5>Data Barang</h5>
										<hr>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="nama_barang">Nama Barang</label>
												<select name="nama_barang" id="nama_barang" class="form-control">
													<option value="">Pilih Barang</option>
													<?php foreach ($all_barang as $m_stok) : ?>
														<option value="<?= $m_stok->nama_barang ?>"><?= $m_stok->nama_barang ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group col-2">
                                                <label>Harga Satuan</label>
												<input type="text" name="harga_barang" value="" readonly class="form-control">
											</div>
                                            <div class="form-group col-2">
                                                <label>Satuan</label>
                                                <select name="satuan" id="satuan" class="form-control">
													<option value="">Pilih Satuan</option>
													<?php foreach ($all_satuan as $m_stok) : ?>
														<option value="<?= $m_stok->satuan ?>"><?= $m_stok->satuan ?></option>
													<?php endforeach ?>
												</select>
                                            </div>
											<div class="form-group col-2">
                                                <label>Jumlah Barang</label>
												<input type="number" name="jumlah_barang" value="" class="form-control" readonly min='1'>
											</div>
											<div class="form-group col-2">
												<label>Total</label>
												<input type="number" name="total" value="" class="form-control" readonly>
											</div>
											<div class="form-group col-1">
												<label for="">&nbsp;</label>
												<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
											</div>
											<input type="hidden" name="satuan" value="">
										</div>
										<div class="keranjang">
											<h5>Detail Pembelian</h5>
											<hr>
											<table class="table table-bordered" id="keranjang">
												<thead>
													<tr>
														<td width="35%">Nama Barang</td>
														<td width="15%">Harga Satuan</td>
														<td width="15%">Satuan</td>
														<td width="10%">Jumlah Barang</td>
														<td width="10%">Total</td>
														<td width="15%">Aksi</td>
													</tr>
												</thead>
												<tbody>

												</tbody>
												<tfoot>
													<tr>
														<td colspan="4" align="right"><strong>Total : </strong></td>
														<td id="total"></td>

														<td>
															<input type="hidden" name="total_hidden" value="">
															<input type="hidden" name="max_hidden" value="">
															<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
														</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$(document).ready(function() {
			$('tfoot').hide()

			$(document).keypress(function(event) {
				if (event.which == '13') {
					event.preventDefault();
				}
			})

			$('#nama_barang').on('change', function() {

				if ($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {
							nama_barang: $(this).val()
						},
						success: function(data) {
							$('input[name="kode_barang"]').val(data.kode_barang)
							$('input[name="harga_barang"]').val(data.harga_jual)
							$('input[name="jumlah"]').val(1)
							$('input[name="satuan"]').val(data.satuan)
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())

							$('input[name="jumlah"]').on('keydown keyup change blur', function() {
								$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							})
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e) {
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					nama_barang: $('select[name="nama_barang"]').val(),
					harga_barang: $('input[name="harga_barang"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					sub_total: $('input[name="sub_total"]').val(),
				}

				if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
					alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))
				} else {
					$.ajax({
						url: url_keranjang_barang,
						type: 'POST',
						data: data_keranjang,
						success: function(data) {
							if ($('select[name="nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
							reset()

							$('table#keranjang tbody').append(data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
						}
					})
				}

			})


			$(document).on('click', '#tombol-hapus', function() {
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if ($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function() {
				$('input[name="kode_barang"]').prop('disabled', true)
				$('select[name="nama_barang"]').prop('disabled', true)
				$('input[name="harga_barang"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				$('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total() {
				let total = 0;
				$('.sub_total').each(function() {
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset() {
				$('#nama_barang').val('')
				$('input[name="kode_barang"]').val('')
				$('input[name="harga_barang"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="sub_total"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>