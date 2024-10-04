<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pbc extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }
	
	public function index()
	{
		$data['title']='Example Simple CRUD CodeIgniter';
		$this->load->view('index',$data);
	}
	
	public function marketing_plan_pilih()
	{
		$this->load->view('pbc/marketing_plan');
	}
	
	public function marketing_plan()
	{
		$select							= $this->db->select('*');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$data['jenis']="siswa";
		$this->load->view('pbc/mkt/marketing_plan',$data);
	}
	
	public function marketing_plan_mhs()
	{
		$select							= $this->db->select('*');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$data['jenis']="mhs";
		$this->load->view('pbc/mkt/marketing_plan',$data);
	}
	
	public function tabel_tim($jenis,$i)
	{
	    if($jenis=="siswa"){
	    echo'
		    <div class="row" id="tim-'.$i.'">
		                                <div class="col-lg-6 pt-2">
											TIM '.$i.'
										</div>
										<div class="col-lg-6 text-right">
										    <input type="hidden" value="1" name="baris_tabel_'.$i.'">
										    <button class="btn btn-dark" type="button" onclick="return del_tim(`tim-'.$i.'`)">Hapus TIM</button>
											<!--<button class="btn btn-dark" type="button" onclick="return add_anggota(`'.$i.'`)">Tambah Anggota</button>-->
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped" id="tabel_tim_'.$i.'">
        											<thead>
            											<tr>
            											    <th>NO</th>
            											    <th>NAMA ANGGOTA</th>
            											    <th>KELAS</th>
            											    <th>NO HP</th>
            											    <th>PHOTO 3x4 BERWARNA</th>
            											    <th>PHOTO KARTU PELAJAR</th>
            											    <!--<th>AKSI</th>-->
            											</tr>
        											</thead>
        											<tbody>
            											<tr id="rowid'.$i.'-1">
            											    <td class="text-center">1</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][0]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][0]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][0]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-1`)">HAPUS</button></td>-->
            											</tr>
            											<tr id="rowid'.$i.'-2">
            											    <td class="text-center">2</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][1]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][1]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][1]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-2`)">HAPUS</button></td>-->
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
        							</div>
		    ';
	    }else{
	    echo'
		    <div class="row" id="tim-'.$i.'">
		                                <div class="col-lg-6 pt-2">
											TIM '.$i.'
										</div>
										<div class="col-lg-6 text-right">
										    <input type="hidden" value="1" name="baris_tabel_'.$i.'">
										    <button class="btn btn-dark" type="button" onclick="return del_tim(`tim-'.$i.'`)">Hapus TIM</button>
											<!--<button class="btn btn-dark" type="button" onclick="return add_anggota(`'.$i.'`)">Tambah Anggota</button>-->
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped" id="tabel_tim_'.$i.'">
        											<thead>
            											<tr>
            											    <th>NO</th>
            											    <th>NAMA ANGGOTA</th>
            											    <th>KELAS</th>
            											    <th>NO HP</th>
            											    <th>PHOTO 3x4 BERWARNA</th>
            											    <th>PHOTO KTP</th>
            											    <!--<th>AKSI</th>-->
            											</tr>
        											</thead>
        											<tbody>
            											<tr id="rowid'.$i.'-1">
            											    <td class="text-center">1</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][0]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][0]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][0]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-1`)">HAPUS</button></td>-->
            											</tr>
            											<tr id="rowid'.$i.'-2">
            											    <td class="text-center">2</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][1]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][1]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][1]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-2`)">HAPUS</button></td>-->
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
        							</div>
		    ';    
	    }
	}
	public function add_tim($jenis,$i){
	    if($jenis=="siswa"){
	    echo'
	        <div class="col-lg-6 pt-2">
											TIM '.$i.'
										</div>
										<div class="col-lg-6 text-right">
										    <input type="hidden" value="1" name="baris_tabel_'.$i.'">
										    <button class="btn btn-dark" type="button" onclick="return del_tim(`tim-'.$i.'`)">Hapus TIM</button>
											<!--<button class="btn btn-dark" type="button" onclick="return add_anggota(`'.$i.'`)">Tambah Anggota</button>-->
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped" id="tabel_tim_'.$i.'">
        											<thead>
            											<tr>
            											    <th>NO</th>
            											    <th>NAMA ANGGOTA</th>
            											    <th>KELAS</th>
            											    <th>NO HP</th>
            											    <th>PHOTO 3x4 BERWARNA</th>
            											    <th>PHOTO KARTU PELAJAR</th>
            											    <!--<th>AKSI</th>-->
            											</tr>
        											</thead>
        											<tbody>
            											<tr id="rowid'.$i.'-1">
            											    <td class="text-center">1</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][0]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][0]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][0]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-1`)">HAPUS</button></td>-->
            											</tr>
            											<tr id="rowid'.$i.'-2">
            											    <td class="text-center">2</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][1]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][1]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][1]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-2`)">HAPUS</button></td>-->
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
	    ';
	    }else{
	    echo'
	        <div class="col-lg-6 pt-2">
											TIM '.$i.'
										</div>
										<div class="col-lg-6 text-right">
										    <input type="hidden" value="1" name="baris_tabel_'.$i.'">
										    <button class="btn btn-dark" type="button" onclick="return del_tim(`tim-'.$i.'`)">Hapus TIM</button>
											<!--<button class="btn btn-dark" type="button" onclick="return add_anggota(`'.$i.'`)">Tambah Anggota</button>-->
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped" id="tabel_tim_'.$i.'">
        											<thead>
            											<tr>
            											    <th>NO</th>
            											    <th>NAMA ANGGOTA</th>
            											    <th>KELAS</th>
            											    <th>NO HP</th>
            											    <th>PHOTO 3x4 BERWARNA</th>
            											    <th>PHOTO KTP</th>
            											    <!--<th>AKSI</th>-->
            											</tr>
        											</thead>
        											<tbody>
            											<tr id="rowid'.$i.'-1">
            											    <td class="text-center">1</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][0]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][0]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][0]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_0" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-1`)">HAPUS</button></td>-->
            											</tr>
            											<tr id="rowid'.$i.'-2">
            											    <td class="text-center">2</td>
            											    <td><input type="text" name="nama_anggota['.$i.'][1]" class="form-control" style="width:200px" required></td>
            											    <td><input type="text" name="kelas['.$i.'][1]" class="form-control" style="width:80px" required></td>
            											    <td><input type="text" name="no_hp_tim['.$i.'][1]" class="form-control" style="width:150px" required></td>
            											    <td><input type="file" name="foto_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <td><input type="file" name="kartu_pelajar_'.$i.'_1" class="form-control" style="width:250px" required></td>
            											    <!--<td><button class="btn btn-danger" type="button" onclick="return del_anggota(`rowid'.$i.'-2`)">HAPUS</button></td>-->
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
	    ';    
	    }
	}
	public function save_marketing_plan()
	{
	    if($this->input->post('jenisinput')=="siswa"){
    	    $id = date('Ymdhis');
    	    $data=array(
    			'id'					=>	$id,
    			'nama_sekolah'			=>	$this->input->post('nama_sekolah'),
    			'nama_koordinator'		=>	$this->input->post('nama_koordinator'),
    			'no_hp'			        =>	$this->input->post('no_hp'),
    			'jumlah_tim'			=>	$this->input->post('jumlah_tim'),	
    		);
    		$this->m->Save($data, 'head_marketing_plan');
    		
    	    $data2['id_head']=$id;
    		$id_tim = $this->input->post('id_tim');
    		$tim = 1;
    		$cek = 0;
    		for($i=1;$i<=$id_tim;$i++){
    		    $cek = 0;
    		    for($f=0;$f<=1;$f++){
    		        if(isset($_POST['nama_anggota'][$i][$f])){
    		            $cek = 1;
    		            $data2['nama'.($f+1)]=$_POST['nama_anggota'][$i][$f];
                		$data2['kelas'.($f+1)]=$_POST['kelas'][$i][$f];
                		$data2['nohp'.($f+1)]=$_POST['no_hp_tim'][$i][$f];
    		        }
    		       print_r($data2);
    		       echo'<br><br>';
        		    if(!empty($_FILES['foto_'.$i.'_'.$f]['name']))
                	{
                		$path = 'upload_file/';
                		$name = 'foto_'.$i.'_'.$f;
                		$name_file = $_POST['nama_anggota'][$i][$f].'-FOTO';
                		$upload = $this->_do_upload($path,$name,$name_file);
                		$data2['foto'.($f+1)] = $upload;
                	}
        		    if(!empty($_FILES['kartu_pelajar_'.$i.'_'.$f]['name']))
                	{
                		$path = 'upload_file/';
                		$name = 'kartu_pelajar_'.$i.'_'.$f;
                		$name_file = $_POST['nama_anggota'][$i][$f].'-KARTU-PELAJAR';
                		$upload = $this->_do_upload($path,$name,$name_file);
                		$data2['kartu'.($f+1)] = $upload;
                	}
    		    }
    		    if($cek == 1){
    		    $data2['tim'] = $tim++;
    		    $this->m->Save($data2, 'detail_marketing_plan');
    		    }
    		}  
	    }else{
    	    $id = date('Ymdhis');
    	    $data=array(
    			'id'					=>	$id,
    			'nama_prodi'			=>	$this->input->post('nama_prodi'),
    			'nama_koordinator'		=>	$this->input->post('nama_koordinator'),
    			'no_hp'			        =>	$this->input->post('no_hp'),
    			'jumlah_tim'			=>	$this->input->post('jumlah_tim'),	
    		);
    		$this->m->Save($data, 'head_marketing_plan_mhs');
    		
    	    $data2['id_head']=$id;
    		$id_tim = $this->input->post('id_tim');
    		$tim = 1;
    		$cek = 0;
    		for($i=1;$i<=$id_tim;$i++){
    		    $cek = 0;
    		    for($f=0;$f<=1;$f++){
    		        if(isset($_POST['nama_anggota'][$i][$f])){
    		            $cek = 1;
    		            $data2['nama'.($f+1)]=$_POST['nama_anggota'][$i][$f];
                		$data2['kelas'.($f+1)]=$_POST['kelas'][$i][$f];
                		$data2['nohp'.($f+1)]=$_POST['no_hp_tim'][$i][$f];
    		        }
    		       print_r($data2);
    		       echo'<br><br>';
        		    if(!empty($_FILES['foto_'.$i.'_'.$f]['name']))
                	{
                		$path = 'upload_file/';
                		$name = 'foto_'.$i.'_'.$f;
                		$name_file = $_POST['nama_anggota'][$i][$f].'-FOTO';
                		$upload = $this->_do_upload($path,$name,$name_file);
                		$data2['foto'.($f+1)] = $upload;
                	}
        		    if(!empty($_FILES['kartu_pelajar_'.$i.'_'.$f]['name']))
                	{
                		$path = 'upload_file/';
                		$name = 'kartu_pelajar_'.$i.'_'.$f;
                		$name_file = $_POST['nama_anggota'][$i][$f].'-KTP';
                		$upload = $this->_do_upload($path,$name,$name_file);
                		$data2['kartu'.($f+1)] = $upload;
                	}
    		    }
    		    if($cek == 1){
    		    $data2['tim'] = $tim++;
    		    $this->m->Save($data2, 'detail_marketing_plan_mhs');
    		    }
    		} 
	    }
		redirect(base_url()."pbc/sosmed");
	}
	private function _do_upload($path,$name,$name_file){	
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf|jpg|png|jpeg|pdf';
        $config['max_size']             = 50000000; //set max size allowed in Kilobyte
        $config['max_width']            = 50000000; // set max width image allowed
        $config['max_height']           = 50000000; // set max height allowed
        $config['file_name']            = $name_file;//round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($name)) //upload and validate
        {
            $data['inputerror'][] = $name;
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
	/** --MKT-- **/
	public function kuesioner()
	{
		$select							= $this->db->select('*');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$data['read_aplikan_kota']		= $this->m->Get_All('aplikan_kota',$select);
		$select							= $this->db->where('status != "off"');
		$data['read_jurusan']			= $this->m->Get_All('jurusan',$select);
		$this->load->view('pbc/mkt/kuesioner',$data);
	}
	public function beasiswa()
	{
		$select							= $this->db->select('*');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$data['read_aplikan_kota']		= $this->m->Get_All('aplikan_kota',$select);
		$select							= $this->db->where('status != "off"');
		$data['read_jurusan']			= $this->m->Get_All('jurusan',$select);
		$this->load->view('pbc/mkt/beasiswa',$data);
	}
	public function pmb()
	{
		$select							= $this->db->select('*');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$data['read_aplikan_kota']		= $this->m->Get_All('aplikan_kota',$select);
		$data['read_presenter']		= $this->m->Get_All('master_presenter',$select);
		$select							= $this->db->where('status != "off"');
		$data['read_jurusan']			= $this->m->Get_All('jurusan',$select);
		$this->load->view('pbc/mkt/pmb',$data);
	}
	public function cek_sekolah_jurusan()
	{
		$status							= "-";
		$select							= $this->db->select('*');
		$select							= $this->db->where('id',$_GET['sekolah']);
		$select							= $this->db->order_by('nama');
		$read_sekolah					= $this->m->Get_All('sekolah',$select);
		foreach($read_sekolah as $rs){
			$status						= $rs->status;
		}
		$select							= $this->db->where('status',$status);
		$select							= $this->db->order_by('nama');
		$read_sekolah_jurusan			= $this->m->Get_All('sekolah_jurusan',$select);
			echo '<option value="">PILIH JURUSAN</option>';
		foreach($read_sekolah_jurusan as $rsj){
			echo '<option value="'.$rsj->id.'">'.$rsj->nama.'</option>';
		}
	}
	public function cek_sekolah_kelas()
	{
		$select							= $this->db->where('id',$_GET['sekolah_jurusan']);
		$select							= $this->db->order_by('nama');
		$read_sekolah_jurusan			= $this->m->Get_All('sekolah_jurusan',$select);
		foreach($read_sekolah_jurusan as $rsj){
			echo '<input value="XII '.$rsj->kelas.'" name="sekolah_kelas" type="text" class="form-control" placeholder="XII IPA" readonly>';
		}
	}
	public function save_kuesioner()
	{
		$tahun_akademik_mkt				= "-";
		$select							= $this->db->select('*');
		$read_konfigurasi_pmb			= $this->m->Get_All('konfigurasi_pmb',$select);
		foreach($read_konfigurasi_pmb as $rkp){
			$tahun_akademik_mkt			= $rkp->tahun_akademik_mkt;
		}
		$data=array(
			'nama'				=>	$this->input->post('nama'),
			'id_jurusan'		=>	NULL,
			'tahun_akademik'	=>	$tahun_akademik_mkt,
			'status'			=>	'siswa',
		);
		$this->m->Save($data, 'aplikan');
		
		$id								= "-";
		$select							= $this->db->select('max(id) as id');
		$read_aplikan					= $this->m->Get_All('aplikan',$select);
		foreach($read_aplikan as $ra){
			$id 						= $ra->id;
		}
		
		$folder_nama					= "PRESENTER ONLINE";
		$folder_ke						= "1";
		$select							= $this->db->select('*');
		$read_konfigurasi_kuesioner		= $this->m->Get_All('konfigurasi_kuesioner',$select);
		foreach($read_konfigurasi_kuesioner as $rkk){
			$folder_nama				= $rkk->folder_nama;
			$folder_ke					= $rkk->folder_ke;
		}
		 
		$data=array(
			'id'					=>	$id,
			'tempat_lahir'			=>	NULL,
			'tanggal_lahir'			=>	$this->input->post('lahir_tahun')."-".$this->input->post('lahir_bulan')."-".$this->input->post('lahir_tanggal'),
			'jenis_kelamin'			=>	NULL,
			'alamat'				=>	$this->input->post('alamat'),
			'dusun'					=>	NULL,
			'rt_rw'					=>	NULL,
			'kelurahan'				=>	NULL,
			'kecamatan'				=>	NULL,
			'id_kota'				=>	$this->input->post('kota'),
			'kode_pos'				=>	NULL,
			'no_hp'					=>	$this->input->post('no_hp'),
			'whatsapp'				=>	$this->input->post('no_hp'),
			'facebook'				=>	NULL,
			'instagram'				=>	NULL,
			'email'					=>	NULL,
			'id_sekolah'			=>	$this->input->post('sekolah'),
			'id_sekolah_jurusan'	=>	$this->input->post('sekolah_jurusan'),
			'kelas'					=>	$this->input->post('sekolah_kelas')." ".$this->input->post('sekolah_kelas_ke'),
			'ranking'				=>	$this->input->post('ranking'),
			'prestasi'				=>	$this->input->post('prestasi'),
			'tahun_lulus'			=>	substr($tahun_akademik_mkt,5,4),
			'folder_nama'			=>	$folder_nama,
			'folder_ke'				=>	$folder_ke,
			'lp3i'					=>	$this->input->post('lp3i_jurusan'),
			'kampus_lain'			=>	$this->input->post('kampus_lain_nama'),
			'kampus_lain_jurusan'	=>	$this->input->post('kampus_lain_jurusan'),
			'kerja'					=>	NULL,
			'wiraswasta'			=>	NULL,
			'nikah'					=>	NULL,
			'lain_lain'				=>	$this->input->post('lain_lain2'),
			'kesan'					=>	$this->input->post('kesan'),
			'nama_ibu'				=>	NULL,
			'pekerjaan_ibu'			=>	NULL,
			'no_hp_ibu'				=>	NULL,
			'nama_ayah'				=>	NULL,
			'pekerjaan_ayah'		=>	NULL,
			'no_hp_ayah'			=>	NULL,
			'nama_wali'				=>	$this->input->post('wali_nama'),
			'pekerjaan_wali'		=>	$this->input->post('wali_pekerjaan'),
			'no_hp_wali'			=>	$this->input->post('wali_no_hp'),
			'penghasilan_orang_tua'	=>	$this->input->post('penghasilan'),
			'id_presenter'			=>	NULL,
			'tanggal_input'			=>	date('Y-m-d H:i:s'),
			'status'				=>	'ONLINE',
			'kip'				    =>	$this->input->post('kip'),		
		);
		$this->m->Save($data, 'aplikan_detail');
		redirect(base_url()."pbc/sosmed");
	}
	public function save_beasiswa()
	{
		$tahun_akademik_mkt				= "-";
		$select							= $this->db->select('*');
		$read_konfigurasi_pmb			= $this->m->Get_All('konfigurasi_pmb',$select);
		$tahun_akademik_mkt             = "";
		foreach($read_konfigurasi_pmb as $rkp){
			$tahun_akademik_mkt			= $rkp->tahun_akademik_mkt;
		}
		$select							= $this->db->select('*');
		$select							= $this->db->where('id',$this->input->post('sekolah'));
		$read_sekolah					= $this->m->Get_All('sekolah',$select);
		$sekolah                        = "";
		foreach($read_sekolah as $rs){
			$sekolah					= $rs->nama;
		}
		$select							= $this->db->select('*');
		$select							= $this->db->where('id',$this->input->post('sekolah_jurusan'));
		$read_sekolah_jurusan			= $this->m->Get_All('sekolah_jurusan',$select);
		$sekolah_jurusan                = "";
		foreach($read_sekolah as $rs){
			$sekolah_jurusan			= $rs->nama;
		}
		$data=array(
			'nama'      			=>	$this->input->post('nama'),
			'asal_sekolah'		    	=>	$sekolah,
			'jurusan'           	=>	$sekolah_jurusan,
			'kelas'					=>	$this->input->post('sekolah_kelas')." ".$this->input->post('sekolah_kelas_ke'),
			'no_hp'		        	=>	$this->input->post('no_hp'),
			'nama_ortu'				=>	$this->input->post('nama_ortu'),
			'no_hp_ortu'			=>	$this->input->post('no_hp_ortu'),
			'pekerjaan_ortu'		=>	$this->input->post('pekerjaan_ortu'),
			'prestasi'				=>	$this->input->post('prestasi'),
			'email'			    	=>	$this->input->post('email'),
			'sumber_info'			=>	$this->input->post('sumber_info').$this->input->post('lainnya'),	
			'tahun_akademik'		=>	$tahun_akademik_mkt,
		);
		$this->m->Save($data, 'beasiswa');
		redirect(base_url()."pbc/sosmed");
	}
	public function save_pmb()
	{
		$tahun_akademik_mkt				= "-";
		$select							= $this->db->select('*');
		$read_konfigurasi_pmb			= $this->m->Get_All('konfigurasi_pmb',$select);
		foreach($read_konfigurasi_pmb as $rkp){
			$tahun_akademik_mkt			= $rkp->tahun_akademik_mkt;
		}
		$data=array(
			'nama'				=>	$this->input->post('nama'),
			'id_jurusan'		=>	NULL,
			'tahun_akademik'	=>	$tahun_akademik_mkt,
			'status'			=>	'siswa',
		);
		$this->m->Save($data, 'aplikan_pmb');
		
		$id								= "-";
		$select							= $this->db->select('max(id) as id');
		$read_aplikan					= $this->m->Get_All('aplikan_pmb',$select);
		foreach($read_aplikan as $ra){
			$id 						= $ra->id;
		}
		
		$folder_nama					= "PRESENTER ONLINE";
		$folder_ke						= "1";
		$select							= $this->db->select('*');
		$read_konfigurasi_kuesioner		= $this->m->Get_All('konfigurasi_kuesioner',$select);
		foreach($read_konfigurasi_kuesioner as $rkk){
			$folder_nama				= $rkk->folder_nama;
			$folder_ke					= $rkk->folder_ke;
		}
		$data=array(
			'id'					=>	$id,
			'tempat_lahir'			=>	NULL,
			'tanggal_lahir'			=>	$this->input->post('lahir_tahun')."-".$this->input->post('lahir_bulan')."-".$this->input->post('lahir_tanggal'),
			'jenis_kelamin'			=>	NULL,
			'alamat'				=>	$this->input->post('alamat'),
			'dusun'					=>	NULL,
			'rt_rw'					=>	NULL,
			'kelurahan'				=>	NULL,
			'kecamatan'				=>	NULL,
			'id_kota'				=>	$this->input->post('kota'),
			'kode_pos'				=>	NULL,
			'no_hp'					=>	$this->input->post('no_hp'),
			'whatsapp'				=>	$this->input->post('no_hp'),
			'facebook'				=>	NULL,
			'instagram'				=>	NULL,
			'email'					=>	NULL,
			'id_sekolah'			=>	$this->input->post('sekolah'),
			'id_sekolah_jurusan'	=>	$this->input->post('sekolah_jurusan'),
			'kelas'					=>	$this->input->post('sekolah_kelas')." ".$this->input->post('sekolah_kelas_ke'),
			'ranking'				=>	$this->input->post('ranking'),
			'prestasi'				=>	$this->input->post('prestasi'),
			'tahun_lulus'			=>	substr($tahun_akademik_mkt,5,4),
			'folder_nama'			=>	$folder_nama,
			'folder_ke'				=>	$folder_ke,
			'lp3i'					=>	$this->input->post('prodi'),
			'kampus_lain'			=>	NULL,
			'kampus_lain_jurusan'	=>	NULL,
			'kerja'					=>	NULL,
			'wiraswasta'			=>	NULL,
			'nikah'					=>	NULL,
			'lain_lain'				=>	NULL,
			'kesan'					=>	NULL,
			'nama_ibu'				=>	NULL,
			'pekerjaan_ibu'			=>	NULL,
			'no_hp_ibu'				=>	NULL,
			'nama_ayah'				=>	NULL,
			'pekerjaan_ayah'		=>	NULL,
			'no_hp_ayah'			=>	NULL,
			'nama_wali'				=>	$this->input->post('wali_nama'),
			'pekerjaan_wali'		=>	$this->input->post('wali_pekerjaan'),
			'no_hp_wali'			=>	$this->input->post('wali_no_hp'),
			'penghasilan_orang_tua'	=>	$this->input->post('penghasilan'),
			'id_presenter'			=>	$this->input->post('presenter'),
			'sumber_lainnya'		=>	$this->input->post('lainnya'),
			'tanggal_input'			=>	date('Y-m-d H:i:s'),
			'status'				=>	'ONLINE',
			'kip'				    =>	$this->input->post('kip'),		
		);
		$this->m->Save($data, 'aplikan_detail_pmb');
		redirect(base_url()."pbc/sosmed");
	}
	public function sosmed()
	{
		$this->load->view('pbc/mkt/sosmed');
	}
	/** --MKT-- **/
	
}
