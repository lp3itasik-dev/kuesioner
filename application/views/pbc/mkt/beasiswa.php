<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Kuesioner</title>
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
				<h2><i class="icon-2x icon-graduation2 mr-2"></i> <span class="font-weight-semibold">Kesempatan Kamu Untuk Mendapatkan <b>BEASISWA PENDIDIKAN</b> di Politeknik LP3I Kampus Tasikmalaya </span></h2>
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
								<h5 class="card-title">Apa Rencana Anda Setelah Lulus?</h5>
							</div>
							<div class="card-body">
								<h6>Beri tanda ceklis minimal 1 pilihan.</h6>
								<form onsubmit="return validasi()" action="<?= base_url() ?>pbc/save_beasiswa" method="POST">
									<div class="row mb-3">
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Nama Lengkap</label>
											<input name="nama" type="text" class="form-control" placeholder="NAMA LENGKAP" required>
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
														} 
														$abjad = array("A","B","C","D","E","F","G","H","I","J");
														for($i=0;$i<10;$i++){
														    echo '<option value="'.$abjad[$i].'">'.$abjad[$i].'</option>';
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">No HP/ WA</label>
											<input name="no_hp" type="text" maxlength="15" class="form-control" placeholder="No HP/ WA" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Nama Orang Tua</label>
											<input name="nama_ortu" type="text" class="form-control" placeholder="Nama Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">No HP/ WA Orang Tua</label>
											<input name="no_hp_ortu" maxlength="15" type="text" class="form-control" placeholder="No HP/ WA Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Pekerjaan Orang Tua</label>
											<input name="pekerjaan_ortu" type="text" class="form-control" placeholder="Pekerjaan Orang Tua" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Email</label>
											<input name="email" maxlength="100" type="email" class="form-control" placeholder="Email" required>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Presetasi Akademik/ Non Akademik</label>
											<textarea name="prestasi" type="text" class="form-control" placeholder="Prestasi" required></textarea>
										</div>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Sumber Info</label>
											<select name="sumber_info" class="form-control select-search" data-fouc required>
												<option value="">PILIH SUMBER INFO</option>
												<option value="Kak Benny">Kak Benny</option>
												<option value="Kak Ahyar">Kak Ahyar</option>
												<option value="Kak Ratna">Kak Ratna</option>
												<option value="Kak Yanti">Kak Yanti</option>
												<option value="Kak Nizma">Kak Nizma</option>
												<option value="Kak Galih">Kak Galih</option>
												<option value="Lainnya">Lainnya</option>
											</select>
										</div>
										<div class="form-group col-lg-4 mb-1 lainnya d-none">
											<label class="col-form-label">Lainnya</label>
											<input name="lainnya" type="text" class="form-control" placeholder="Sosisal Media atau Orang Lain" value="">
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
			$(document).on('change','[name="sumber_info"]',function(){	
				var sumber_info = $('[name="sumber_info"]').val();
				if(sumber_info=="Lainnya"){
					$('.lainnya').removeClass('d-none');
					$('[name="lainnya"]').attr('required',true);
				}else{
					$('.lainnya').addClass('d-none');
					$('input[name="lainnya"]').val("");
					$('[name="lainnya"]').removeAttr('required');
				}
			})
			$(document).on('change','[name="sekolah"]',function(){	
				var sekolah = $('[name="sekolah"]').val();
				$('[name="sekolah_jurusan"]').load("<?php echo base_url();?>pbc/cek_sekolah_jurusan?sekolah="+sekolah);	
			})
			$(document).on('change','[name="sekolah_jurusan"]',function(){	
				var sekolah_jurusan = $('[name="sekolah_jurusan"]').val();
				$('.sekolah_kelas').load("<?php echo base_url();?>pbc/cek_sekolah_kelas?sekolah_jurusan="+sekolah_jurusan);	
			})
		})
	</script>
</body>
</html>
