<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Database Siswa</title>
	<?php $this->load->view('template/layout_2/link.php')?>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/layout_2/navbar.php')?>	
	<!-- /main navbar -->

					
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/layout_2/sidebar_mkt.php')?>	
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Database Marketing Plan</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts --> 
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; Search For Database Marketing Plan</h6>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group row">
										<label class="col-form-label col-2">Nama Sekolah <span class="float-right">:</span></label>
										<div class="col-10">
											<select name="nama_sekolah" class="form-control select-search" data-fouc>
												<option value="">PILIH SEKOLAH</option>
												<?php foreach($read_sekolah as $rs){
													$select="";
													if($rs->id==$sekolah){$select="selected";}
													echo '<option '.$select.' value="'.$rs->nama.'">'.$rs->nama.'</option>';
												}?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-2">Tahun <span class="float-right">:</span></label>
										<div class="col-10">
											<select name="tahun" class="form-control select-search" data-fouc>
												<?php 
												for($i=date('Y');$i>=2016;$i--){
													$select="";
													if($tahun==$i){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';													
												}
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group row mb-0">
										<div class="col-12 text-right">
											<button type="submit" name="submit" class="btn btn-dark legitRipple">Search <i class="icon-search4 ml-2"></i></button>
										</div>
									</div>
									
								</form>
								<h6 class="card-title mb-1"><i class="icon-users2" style="width:30px"></i> &nbsp; Total Data Of Database Marketing Plan [ <?= $record?> ]</h6>
								<!--
								<div class="form-group row mt-2">
									<div class="col-12 text-right">
										<a href="<?= base_url() ?>mkt/database_siswa_excel_all">
											<button type="button" class="btn btn-dark legitRipple">Export Excel All <i class="icon-file-excel ml-2"></i></button>
										</a>
										<a href="<?= base_url() ?>mkt/database_siswa_excel_by_search">
											<button type="button" class="btn btn-dark legitRipple">Export Excel By Search <i class="icon-file-excel ml-2"></i></button>
										</a>
									</div>
								</div>
								-->
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center" width="50px" class="text-center">No</th>
												<th class="text-center" width="200px">Nama Sekolah</th>
												<th class="text-center" width="200px">Nama Koordinator</th>
												<th class="text-center" width="200px">NO HP</th>
												<th class="text-center" width="200px">Jumlah Anggota</th>
												<th class="text-center" width="100px" class="text-center">Detail Anggota</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = $this->uri->segment('3') + 1;
											foreach ($data->result() as $d) {
											echo'
											<tr>
												<td class="text-center">'.$no++.'</td>
												<td>'.$d->nama_sekolah.'</td>
												<td>'.$d->nama_koordinator.'</td>
												<td class="text-center">'.$d->no_hp.'</td>
												<td class="text-center">'.$d->jumlah_tim.'</td>
												<td class="text-center"><button type="button" class="btn btn-info" onclick="return anggota(`'.$d->id.'`)">ANGGOTA</button></td>
											</tr>';
											}
											?>
										</tbody>
									</table>
								</div>
								
                                <div class="col-lg-12 mt-3">
								
                                    <!--Tampilkan pagination-->
                                    <?php echo $pagination; ?>
									
                                </div>
							</div>
						</div>
						<!-- /traffic sources -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<span class="navbar-text">
						&copy; 2020. <a href="#" class="text-dark">POLITEKNIK LP3I KAMPUS TASIKMALAYA</a>
					</span>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020. <a href="#" class="text-dark">POLITEKNIK LP3I KAMPUS TASIKMALAYA</a>
					</span>
				</div>
			</div>
			<!-- /footer -->
 
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script>		
		function anggota(id){
		    $('#ModalAnggota').modal('show');
		    $('.modal-body').load('<?= base_url() ?>mkt/detail_marketing_plan/'+id);
		}
	</script>
</body>
<div class="modal" tabindex="-1" role="dialog" id="ModalAnggota">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</html>
