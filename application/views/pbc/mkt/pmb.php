<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Pendaftaran Online</title>
	<?php $this->load->view('template/layout_4/link.php')?>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/layout_4/navbar_kuesioner.php')?>
	<!-- /main navbar -->

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex" style="padding:1rem 0">
				<h2><i class="icon-2x icon-graduation2 mr-2"></i> <span class="font-weight-semibold">Pendaftaran Online</span></h2>
			</div>
		</div>
	</div>
	<!-- /page header -->
		

	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">

				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12 col-sm-12">

						<!-- Form -->
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>
							<div class="card-body">
								<form onsubmit="return validasi()" action="<?= base_url() ?>pbc/save_pmb" method="POST">
									<div class="row mb-3">
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Program Studi</label>
											<select name="prodi" class="form-control select-search" data-fouc required>
												<option value="">PILIH</option>
												<?php foreach($read_jurusan as $rs){
													echo '<option value="'.$rs->id.'">'.$rs->nama.'</option>';
												}?>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Nama Lengkap</label>
											<input name="nama" type="text" class="form-control" placeholder="NAMA LENGKAP" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Tanggal Lahir</label>
											<div class="row">
												<div class="col-4 pr-0">
													<select name="lahir_tanggal" class="form-control select-search" data-fouc required>
														<?php for($i=1;$i<=31;$i++){
														$nol = "";
														if($i<10){$nol="0";}
														echo '<option value="'.$nol.$i.'">'.$nol.$i.'</option>';
														} ?>
													</select>
												</div>			
												<div class="col-4">									
													<select name="lahir_bulan" class="form-control select-search" data-fouc required>
														<?php $bulan= array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOPEMBER","DESEMBER");
														for($i=0;$i<12;$i++){
															$nol = "";
															if($i<10){$nol="0";}
															echo '<option value="'.$nol.($i+1).'">'.$bulan[$i].'</option>';
														}
														?>
													</select>
												</div>
												<div class="col-4 pl-0">
													<select name="lahir_tahun" class="form-control select-search" data-fouc required>
													<?php for($i=date('Y')-25;$i<date('Y');$i++){
														echo '<option value="'.$i.'">'.$i.'</option>';
													}?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-4 mb-1"id="sekolah">
											<label class="col-form-label">Nama Sekolah</label>
											<select name="sekolah" class="form-control select-search sekolah" data-fouc data-combo="sekolah" required>
												<option value="">PILIH NAMA SEKOLAH</option>
												<?php foreach($read_sekolah as $rs){
													echo '<option value="'.$rs->id.'">'.$rs->nama.'</option>';
												}?>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Jurusan</label>
											<select name="sekolah_jurusan" class="form-control select-search" data-fouc required>
												<option value="">PILIH JURUSAN</option>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Kelas</label>
											<div class="row">
												<div class="col-6 sekolah_kelas pr-0">
													<input name="sekolah_kelas" type="text" class="form-control" placeholder="XII IPA" readonly>
												</div>
												<div class="col-6">
													<select name="sekolah_kelas_ke" class="form-control select-search" data-fouc required>
														<?php for($i=1;$i<=10;$i++){ 
														echo '<option value="'.$i.'">'.$i.'</option>';
														} ?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Ranking</label>
											<input name="ranking" type="text" maxlength="3" class="form-control" placeholder="Ranking" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Prestasi</label>
											<textarea name="prestasi" type="text" class="form-control" placeholder="Prestasi" required></textarea>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">No HP/ WA</label>
											<input name="no_hp" type="text" maxlength="15" class="form-control" placeholder="No HP/ WA" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Alamat Lengkap</label>
											<textarea name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap" required></textarea>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Kota/ Kabupaten</label>
											<select name="kota" class="form-control select-search" data-fouc required>
												<option value="">PILIH KOTA/ KABUPATEN</option>
												<?php foreach($read_aplikan_kota as $rak){
													echo '<option value="'.$rak->id.'">'.$rak->nama.'</option>';
												}?>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Nama Orang Tua</label>
											<input name="wali_nama" type="text" class="form-control" placeholder="Nama Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Pekerjaan Orang Tua</label>
											<input name="wali_pekerjaan" type="text" class="form-control" placeholder="Pekerjaan Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">No HP/ WA Orang Tua</label>
											<input name="wali_no_hp" maxlength="15" type="text" class="form-control" placeholder="No HP/ WA Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Penghasilan Orang Tua</label>
											<select name="penghasilan" class="form-control select-search" data-fouc required>
												<option value="">PILIH PENGHASILAN ORANG TUA</option>
												<option value="< 1.000.000">< 1.000.000</option>
												<option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
												<option value="2.000.000 - 4.000.000">2.000.000 - 4.000.000</option>
												<option value="> 5.000.000">> 5.000.000</option>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Memiliki KIP</label>
											<div class="row pl-3">
    											<div class="custom-control custom-checkbox">
    												<input name="kip" type="radio" class="custom-control-input" id="checkbox_kip_ya" value="Ya">
    												<label class="custom-control-label pr-3" for="checkbox_kip_ya">YA</label>
    											</div>
    											<div class="custom-control custom-checkbox">
    												<input name="kip" type="radio" class="custom-control-input" id="checkbox_kip_tidak" value="Tidak" checked>
    												<label class="custom-control-label" for="checkbox_kip_tidak">TIDAK</label>
    											</div>
    										</div>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Sumber Informasi</label>
											<select name="presenter" class="form-control select-search" onchange="return cekpresenter()" data-fouc required>
												<option value="">PILIH</option>
												<?php foreach($read_presenter as $p){ ?>
												<option value="<?= $p->nama_presenter ?>"><?= $p->nama_presenter ?></option>
												<?php } ?>
												<option value="lainnya">Lainnya</option>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1 sumber-lainnya d-none">
											<label class="col-form-label">Sumber Informasi Lainnya</label>
											<input name="lainnya" type="text" class="form-control" placeholder="Sumber Informasi" required>
										</div>
									</div>
									<div class="text-right col-lg-12">
										<button type="submit" class="btn btn-dark legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
						</div>
						<!-- /form -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!--/content area -->
			
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Footer -->
	<?php $this->load->view('template/layout_4/footer.php')?>
	<!-- /footer -->
	
	<script>
		function validasi(){	
			var no_hp              	= $('[name="no_hp"]').val();
			var no_hp_ortu         	= $('[name="no_hp_ortu"]').val();
			
			if(no_hp=="-"){alert("No HP/ WA Harus di Isi");return false;}else
			if(no_hp_ortu=="-"){alert("No HP/ WA Orang Tua Harus di Isi");return false;}
		}
		$(document).ready(function() {
			$(document).on('change','[name="sekolah"]',function(){	
				var sekolah = $('[name="sekolah"]').val();
				$('[name="sekolah_jurusan"]').load("<?php echo base_url();?>pbc/cek_sekolah_jurusan?sekolah="+sekolah);	
			})
			$(document).on('change','[name="sekolah_jurusan"]',function(){	
				var sekolah_jurusan = $('[name="sekolah_jurusan"]').val();
				$('.sekolah_kelas').load("<?php echo base_url();?>pbc/cek_sekolah_kelas?sekolah_jurusan="+sekolah_jurusan);	
			})
		})
		function cekpresenter(){
		    var sumber = $('[name="presenter"]').val();
		    if(sumber=="lainnya"){
		        $('.sumber-lainnya').removeClass('d-none');
		    }else{
		        $('.sumber-lainnya').addClass('d-none');
		        $('[name="lainnya"]').val("");
		    }
		}
	</script>
</body>
</html>
