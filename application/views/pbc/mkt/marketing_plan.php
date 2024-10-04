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
		<div class="page-header-content text-center">
			<div class="page-title text-center" style="padding:1rem 0">
				<h2><span class="font-weight-semibold">Form Persyaratan Registrasi<br>Marketing Plan Competition</span></h2>
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
							<div class="card-body">
								<form action="<?= base_url() ?>save-marketing-plan" method="POST" enctype='multipart/form-data'>
								    <input type="hidden" name="jenisinput" value="<?= $jenis ?>">
									<div class="row">
									    <?php if($jenis=="mhs"){ ?>
										<input type="hidden" name="nama_prodi" value="-">
									    <?php }else{ ?>
										<div class="form-group col-lg-4 mb-1"id="sekolah">
											<label class="col-form-label">Nama Sekolah</label>
											<input name="nama_sekolah" type="text" class="form-control" placeholder="NAMA SEKOLAH" required>
										</div>
									    <?php } ?>
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">Nama Koordinator</label>
											<input name="nama_koordinator" type="text" class="form-control" placeholder="NAMA KOORDINATOR" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-lg-4 mb-1">
											<label class="col-form-label">No. HP</label>
											<input name="no_hp" type="text" class="form-control" placeholder="NO. HP" required>
										</div>
										<div class="form-group col-lg-2 mb-1 col-4">
											<label class="col-form-label">Jumlah Tim</label>
											<input name="jumlah_tim" type="number" class="form-control text-center" placeholder="JUMLAH TIM" onchange="return jml_tim()" value="1" readonly>
										</div>
										<div class="form-group col-lg-2 mb-1 pt-4 col-8">
										    <input type="hidden" value="1" name="id_tim">
											<button class="btn btn-dark mt-1" type="button" onclick="return add_tim()">Tambah Tim</button>
										</div>
									</div>
									<div class="mb-2" id="tim">
										
									</div>
									
									<div class="text-right col-lg-12 mt-3 p-0">
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
<div class="d-none" id="temporary"></div>
	
	<script>
	    $('#tim').load("<?= base_url() ?>pbc/tabel_tim/<?= $jenis ?>/1");
        
		function jml_tim(){
		    var jml_tim = $('[name="jumlah_tim"]').val();
		    if(jml_tim==""){jml_tim=0;}
		    $('#tim').load("<?= base_url() ?>pbc/tabel_tim/<?= $jenis ?>"+jml_tim);
		}
		function add_anggota(tim){
		    var table = document.getElementById("tabel_tim_"+tim);
		    var jml_anggota = parseInt($('[name="baris_tabel_'+tim+'"]').val())+1;
		    
            let newRow = table.insertRow(-1);
            newRow.id = "rowid"+tim+"-"+jml_anggota;
            let newCell = newRow.insertCell(0);
            let newText = document.createTextNode('New bottom row');
            newCell.appendChild(newText);
            
            $('[name="baris_tabel_'+tim+'"]').val(jml_anggota);
		}
		function del_anggota(id){
		    $('#'+id).remove();
		    var jml_anggota = parseInt($('[name="baris_tabel_'+tim+'"]').val())-1;
		    $('[name="baris_tabel_'+tim+'"]').val(jml_anggota);
		}
		
		function add_tim(){
		    var jml_tim = parseInt($('[name="jumlah_tim"]').val())+1;
		    $('[name="jumlah_tim"]').val(jml_tim);
		    
		    var id_tim = parseInt($('[name="id_tim"]').val())+1;
		    $('[name="id_tim"]').val(id_tim);
		    
            $("#tim").append('<div class="row" id="tim-'+id_tim+'"></div>');
		    $('#tim-'+id_tim).load("<?= base_url() ?>pbc/add_tim/<?= $jenis ?>/"+id_tim);
		}
		
		function del_tim(id){
		    $('#'+id).remove();
		    var jml_tim = parseInt($('[name="jumlah_tim"]').val())-1;
		    $('[name="jumlah_tim"]').val(jml_tim);
		}
	</script>
</body>
</html>
