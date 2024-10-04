<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mkt extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Models','m');
    }
	/**function cek_log(){
	    if($this->session->userdata("log")!="lgn"){
	        redirect(base_url()."log");
	    }
	}**/
	/** --Off Sidebar-- **/
	function sidebar()
	{
	    //$this->cek_log();
		$data['dashboard']="";
		$data['database_siswa']="";
		$data['database_siswa_pmb']="";
		$data['marketing_plan']="";
		$data['marketing_plan_mhs']="";
		$this->session->set_userdata($data);
	}
	/** --Cek Sidebar Active-- **/
	/** --Dashboard-- **/
	public function index()
	{
		$this->sidebar();
		$data['dashboard']="active";
		$this->session->set_userdata($data);
		
		$this->session->set_userdata($data);
		$this->load->view('mkt/index');
	}
	/** --Dashboard-- **/
	/** --Database Marketing Plan-- **/
	public function marketing_plan()
	{
		$this->sidebar();
		$data['marketing_plan']="active";
		$this->session->set_userdata($data);
		
		$data['nama_sekolah']	= "";
		$data['tahun']			= "";
		if(isset($_POST['submit'])){
			$data['nama_sekolah']			= $this->input->post('nama_sekolah');
			$data['tahun']	= $this->input->post('tahun');
			$dt = array(
    			'nama_sekolah' 		    => $data['nama_sekolah'], 
    			'tahun'=> $data['tahun']
    		);
    		$this->session->set_userdata($dt);
    		redirect('mkt/marketing_plan/');
		}else if($this->session->userdata('nama_sekolah') or $this->session->userdata('tahun')){
		    $data['nama_sekolah']	=$this->session->userdata('nama_sekolah');
    		$data['tahun']=$this->session->userdata('tahun');
		}
		
		$select							= $this->db->select('*');
		$select							= $this->db->order_by('nama');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		
		//konfigurasi pagination
        $config['base_url'] = base_url('mkt/marketing_plan'); //site url
        
        $select = $this->db->select('*');
		if($data['nama_sekolah']!=""){$select = $this->db->where('nama_sekolah',$data['nama_sekolah']);}
		if($data['tahun']!=""){$select = $this->db->where('DATE_FORMAT(insert_date, "%Y") = '.$data['tahun']);}
		$record=$this->m->Get_All('head_marketing_plan',$select);
		
		$data['record']=0;
		foreach($record as $rc){$data['record']++;}
		
        $config['total_rows'] = $data['record']; //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
		$config['num_links'] = 2;
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$select = $this->db->select('*');
		if($data['nama_sekolah']!=""){$select = $this->db->where('nama_sekolah',$data['nama_sekolah']);}
		if($data['tahun']!=""){$select = $this->db->where('DATE_FORMAT(insert_date, "%Y")='.$data['tahun']);}
		$select = $this->db->order_by('insert_date','DESC');
        $data['data'] = $this->m->Get_Page($config["per_page"], $data['page'],'head_marketing_plan');
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('mkt/marketing_plan',$data);
	}
	public function marketing_plan_mhs()
	{
		$this->sidebar();
		$data['marketing_plan_mhs']="active";
		$this->session->set_userdata($data);
		
		$data['nama_prodi']	= "";
		$data['tahun']			= "";
		if(isset($_POST['submit'])){
			$data['nama_prodi']			= $this->input->post('nama_prodi');
			$data['tahun']	= $this->input->post('tahun');
			$dt = array(
    			'nama_prodi' 		    => $data['nama_prodi'], 
    			'tahun'=> $data['tahun']
    		);
    		$this->session->set_userdata($dt);
    		redirect('mkt/marketing_plan_mhs/');
		}else if($this->session->userdata('nama_prodi') or $this->session->userdata('tahun')){
		    $data['nama_prodi']	=$this->session->userdata('nama_prodi');
    		$data['tahun']=$this->session->userdata('tahun');
		}
		
		$select							= $this->db->select('*');
		$select							= $this->db->order_by('nama');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		
		//konfigurasi pagination
        $config['base_url'] = base_url('mkt/marketing_plan_mhs'); //site url
        
        $select = $this->db->select('*');
// 		if($data['nama_prodi']!=""){$select = $this->db->where('nama_prodi',$data['nama_prodi']);}
// 		if($data['tahun']!=""){$select = $this->db->where('DATE_FORMAT(insert_date, "%Y") = '.$data['tahun']);}
		$record=$this->m->Get_All('head_marketing_plan_mhs',$select);
		
		$data['record']=0;
		foreach($record as $rc){$data['record']++;}
		
        $config['total_rows'] = $data['record']; //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
		$config['num_links'] = 2;
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$select = $this->db->select('*');
// 		if($data['nama_prodi']!=""){$select = $this->db->where('nama_prodi',$data['nama_prodi']);}
// 		if($data['tahun']!=""){$select = $this->db->where('DATE_FORMAT(insert_date, "%Y")='.$data['tahun']);}
		$select = $this->db->order_by('insert_date','DESC');
        $data['data'] = $this->m->Get_Page($config["per_page"], $data['page'],'head_marketing_plan_mhs');
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('mkt/marketing_plan_mhs',$data);
	}
	public function detail_marketing_plan($id){
	    $select							= $this->db->select('*');
	    $select							= $this->db->where('id_head',$id);
		$data_anggota       			= $this->m->Get_All('detail_marketing_plan',$select);
		foreach($data_anggota as $d){
	    echo'
		    <div class="row">
		                                <div class="col-lg-6 pt-2">
											TIM '.$d->tim.'
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped">
        											<thead class="bg-dark">
            											<tr>
            											    <th class="text-center">NO</th>
            											    <th class="text-center">NAMA ANGGOTA</th>
            											    <th class="text-center">KELAS</th>
            											    <th class="text-center">NO HP</th>
            											    <th class="text-center">PHOTO 3x4 BERWARNA</th>
            											    <th class="text-center">PHOTO KARTU PELAJAR</th>
            											</tr>
        											</thead>
        											<tbody>
            											<tr>
            											    <td class="text-center">1</td>
            											    <td>'.$d->nama1.'</td>
            											    <td>'.$d->kelas1.'</td>
            											    <td>'.$d->nohp1.'</td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->foto1.'"><img src="'.base_url().'upload_file/'.$d->foto1.'" height="80px"></a>
            											    </td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->kartu1.'"><img src="'.base_url().'upload_file/'.$d->kartu1.'" height="80px"></a>
            											    </td>
            											</tr>
            											<tr>
            											    <td class="text-center">2</td>
            											    <td>'.$d->nama2.'</td>
            											    <td>'.$d->kelas2.'</td>
            											    <td>'.$d->nohp2.'</td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->foto2.'"><img src="'.base_url().'upload_file/'.$d->foto2.'" height="80px"></a>
            											    </td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->kartu2.'"><img src="'.base_url().'upload_file/'.$d->kartu2.'" height="80px"></a>
            											    </td>
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
        							</div>
		    ';
		}
	}
	public function detail_marketing_plan_mhs($id){
	    $select							= $this->db->select('*');
	    $select							= $this->db->where('id_head',$id);
		$data_anggota       			= $this->m->Get_All('detail_marketing_plan_mhs',$select);
		foreach($data_anggota as $d){
	    echo'
		    <div class="row">
		                                <div class="col-lg-6 pt-2">
											TIM '.$d->tim.'
										</div>
										<div class="col-lg-12 mt-2 mb-2">
    										<div class="table-responsive">
        									    <table class="table table-bordered table-striped">
        											<thead class="bg-dark">
            											<tr>
            											    <th class="text-center">NO</th>
            											    <th class="text-center">NAMA ANGGOTA</th>
            											    <th class="text-center">KELAS</th>
            											    <th class="text-center">NO HP</th>
            											    <th class="text-center">PHOTO 3x4 BERWARNA</th>
            											    <th class="text-center">PHOTO KARTU PELAJAR</th>
            											</tr>
        											</thead>
        											<tbody>
            											<tr>
            											    <td class="text-center">1</td>
            											    <td>'.$d->nama1.'</td>
            											    <td>'.$d->kelas1.'</td>
            											    <td>'.$d->nohp1.'</td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->foto1.'"><img src="'.base_url().'upload_file/'.$d->foto1.'" height="80px"></a>
            											    </td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->kartu1.'"><img src="'.base_url().'upload_file/'.$d->kartu1.'" height="80px"></a>
            											    </td>
            											</tr>
            											<tr>
            											    <td class="text-center">2</td>
            											    <td>'.$d->nama2.'</td>
            											    <td>'.$d->kelas2.'</td>
            											    <td>'.$d->nohp2.'</td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->foto2.'"><img src="'.base_url().'upload_file/'.$d->foto2.'" height="80px"></a>
            											    </td>
            											    <td class="text-center">
            											        <a href="'.base_url().'upload_file/'.$d->kartu2.'"><img src="'.base_url().'upload_file/'.$d->kartu2.'" height="80px"></a>
            											    </td>
            											</tr>
        											</tbody>
        										</table>
        									</div>
        								</div>
        							</div>
		    ';
		}
	}
	/** --Database Siswa-- **/
	public function database_siswa()
	{
		$this->sidebar();
		$data['database_siswa']="active";
		$this->session->set_userdata($data);
		
		$data['nama']				= "";
		$data['jurusan']			= "";
		$data['sekolah']			= "";
		$data['tahun_akademik']		= "";
		if(isset($_POST['submit'])){
			$data['nama']			= $this->input->post('nama');
			$data['jurusan']		= $this->input->post('jurusan');
			$data['sekolah']		= $this->input->post('sekolah');
			$data['tahun_akademik']	= $this->input->post('tahun_akademik');
			$dt = array(
    			'nama' 		    => $data['nama'], 
    			'jurusan' 		=> $data['jurusan'],
    			'sekolah' 		=> $data['sekolah'], 
    			'tahun_akademik'=> $data['tahun_akademik']
    		);
    		$this->session->set_userdata($dt);
    		redirect('mkt/database_siswa/');
		}else if($this->session->userdata('nama') or $this->session->userdata('jurusan') or $this->session->userdata('sekolah') or $this->session->userdata('tahun_akademik')){
		    $data['nama']	=$this->session->userdata('nama');
    		$data['jurusan']=$this->session->userdata('jurusan');
    		$data['sekolah']=$this->session->userdata('sekolah');
    		$data['tahun_akademik']=$this->session->userdata('tahun_akademik');
		}
		
		$select							= $this->db->select('*');
		$data['read_konfigurasi_pmb']	= $this->m->Get_All('konfigurasi_pmb',$select);
		$select							= $this->db->order_by('nama');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$select							= $this->db->group_by('nama');
		$select							= $this->db->order_by('nama');
		$data['read_jurusan']			= $this->m->Get_All('sekolah_jurusan',$select);
		
		//konfigurasi pagination
        $config['base_url'] = base_url('mkt/database_siswa'); //site url
        
        $select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$record=$this->m->Get_All('view_aplikan',$select);
		
		$data['record']=0;
		foreach($record as $rc){$data['record']++;}
		
        $config['total_rows'] = $data['record']; //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
		$config['num_links'] = 2;
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$select = $this->db->order_by('tanggal_input','DESC');
        $data['data'] = $this->m->Get_Page($config["per_page"], $data['page'],'view_aplikan');
        
        $select = $this->db->select('kelas, count(kelas) as jml');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$select = $this->db->group_by("kelas");
        $data['kelas'] = $this->m->Get_All('view_aplikan',$select);
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('mkt/database_siswa',$data);
	}
	/*** Beasiswa ***/
	public function beasiswa()
	{
		$this->sidebar();
		$data['beasiswa']="active";
		$this->session->set_userdata($data);
		
		$data['nama']				= "";
		$data['jurusan']			= "";
		$data['sekolah']			= "";
		$data['tahun_akademik']		= "";
		if(isset($_POST['submit'])){
			$data['nama']			= $this->input->post('nama');
			$data['jurusan']		= $this->input->post('jurusan');
			$data['sekolah']		= $this->input->post('sekolah');
			$data['tahun_akademik']	= $this->input->post('tahun_akademik');
			$dt = array(
    			'nama' 		    => $data['nama'], 
    			'jurusan' 		=> $data['jurusan'],
    			'sekolah' 		=> $data['sekolah'], 
    			'tahun_akademik'=> $data['tahun_akademik']
    		);
    		$this->session->set_userdata($dt);
    		redirect('mkt/beasiswa/');
		}else if($this->session->userdata('nama') or $this->session->userdata('jurusan') or $this->session->userdata('sekolah') or $this->session->userdata('tahun_akademik')){
		    $data['nama']	=$this->session->userdata('nama');
    		$data['jurusan']=$this->session->userdata('jurusan');
    		$data['sekolah']=$this->session->userdata('sekolah');
    		$data['tahun_akademik']=$this->session->userdata('tahun_akademik');
		}
		
		$select							= $this->db->select('*');
		$data['read_konfigurasi_pmb']	= $this->m->Get_All('konfigurasi_pmb',$select);
		$select							= $this->db->order_by('nama');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$select							= $this->db->group_by('nama');
		$select							= $this->db->order_by('nama');
		$data['read_jurusan']			= $this->m->Get_All('sekolah_jurusan',$select);
		
		//konfigurasi pagination
        $config['base_url'] = base_url('mkt/beasiswa'); //site url
        
        $select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('jurusan',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$record=$this->m->Get_All('beasiswa',$select);
		
		$data['record']=0;
		foreach($record as $rc){$data['record']++;}
		
        $config['total_rows'] = $data['record']; //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
		$config['num_links'] = 2;
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('jurusan',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$select = $this->db->order_by('input_time','DESC');
        $data['data'] = $this->m->Get_Page($config["per_page"], $data['page'],'beasiswa');
        
        $select = $this->db->select('kelas, count(kelas) as jml');
		if($data['nama']!=""){$select = $this->db->where('nama',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('jurusan',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		$select = $this->db->group_by("kelas");
        $data['kelas'] = $this->m->Get_All('beasiswa',$select);
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('mkt/beasiswa',$data);
	}
	/** --Database Siswa PMB-- **/
	public function database_siswa_pmb()
	{
		$this->sidebar();
		$data['database_siswa_pmb']="active";
		$this->session->set_userdata($data);
		
		$data['nama']				= "";
		$data['jurusan']			= "";
		$data['sekolah']			= "";
		$data['tahun_akademik']		= "";
		$data['presenter']		    = "";
		if(isset($_POST['submit'])){
			$data['nama']			= $this->input->post('nama');
			$data['jurusan']		= $this->input->post('jurusan');
			$data['sekolah']		= $this->input->post('sekolah');
			$data['tahun_akademik']	= $this->input->post('tahun_akademik');
			$data['presenter']	= $this->input->post('presenter');
			$dt = array(
    			'nama' 		    => $data['nama'], 
    			'jurusan' 		=> $data['jurusan'],
    			'sekolah' 		=> $data['sekolah'], 
    			'tahun_akademik'=> $data['tahun_akademik'], 
    			'presenter'     => $data['presenter']
    		);
    		$this->session->set_userdata($dt);
    		redirect('mkt/database_siswa_pmb/');
		}else if($this->session->userdata('nama') or $this->session->userdata('jurusan') or $this->session->userdata('sekolah') or $this->session->userdata('tahun_akademik') or $this->session->userdata('presenter')){
		    $data['nama']	=$this->session->userdata('nama');
    		$data['jurusan']=$this->session->userdata('jurusan');
    		$data['sekolah']=$this->session->userdata('sekolah');
    		$data['tahun_akademik']=$this->session->userdata('tahun_akademik');
    		$data['presenter']=$this->session->userdata('presenter');
		}
		
		$select							= $this->db->select('*');
		$data['read_konfigurasi_pmb']	= $this->m->Get_All('konfigurasi_pmb',$select);
		$data['read_presenter']			= $this->m->Get_All('master_presenter',$select);
		$select							= $this->db->order_by('nama');
		$data['read_sekolah']			= $this->m->Get_All('sekolah',$select);
		$select							= $this->db->group_by('nama');
		$select							= $this->db->order_by('nama');
		$data['read_jurusan']			= $this->m->Get_All('sekolah_jurusan',$select);
		
		//konfigurasi pagination
        $config['base_url'] = base_url('mkt/database_siswa_pmb'); //site url
        
        $select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		if($data['presenter']!=""){$select = $this->db->where('presenter',$data['presenter']);}
		$record=$this->m->Get_All('view_aplikan_pmb',$select);
		
		$data['record']=0;
		foreach($record as $rc){$data['record']++;}
		
        $config['total_rows'] = $data['record']; //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
		$config['num_links'] = 2;
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$select = $this->db->select('*');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		if($data['presenter']!=""){$select = $this->db->where('presenter',$data['presenter']);}
		$select = $this->db->order_by('tanggal_input','DESC');
        $data['data'] = $this->m->Get_Page($config["per_page"], $data['page'],'view_aplikan_pmb');
        
        $select = $this->db->select('kelas, count(kelas) as jml');
		if($data['nama']!=""){$select = $this->db->where('nama_lengkap',$data['nama']);}
		if($data['jurusan']!=""){$select = $this->db->where('id_jurusan_sekolah',$data['jurusan']);}
		if($data['sekolah']!=""){$select = $this->db->where('id_sekolah',$data['sekolah']);}
		if($data['tahun_akademik']!=""){$select = $this->db->where('tahun_akademik',$data['tahun_akademik']);}
		
		if($data['presenter']!=""){
		    if($data['presenter']=="lainnya"){
		        $select = $this->db->where('sumber_lainnya != ""');
		    }else{
		        $select = $this->db->where('presenter',$data['presenter']);
		    }
		    
		    
		}
		
		$select = $this->db->group_by("kelas");
        $data['kelas'] = $this->m->Get_All('view_aplikan_pmb',$select);
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('mkt/database_siswa_pmb',$data);
	}
	public function database_siswa_excel_all()
	{
		$this->load->view('mkt/database_siswa_excel_all');
	}
	public function database_siswa_excel_by_search()
	{
		$this->load->view('mkt/database_siswa_excel_by_search');
	}
	public function beasiswa_excel_all()
	{
		$this->load->view('mkt/beasiswa_excel_all');
	}
	public function beasiswa_excel_by_search()
	{
		$this->load->view('mkt/beasiswa_excel_by_search');
	}
	public function database_siswa_excel_all_pmb()
	{
		$this->load->view('mkt/database_siswa_excel_all_pmb');
	}
	public function database_siswa_excel_by_search_pmb()
	{
		$this->load->view('mkt/database_siswa_excel_by_search_pmb');
	}
	/** --Database Siswa-- **/
}
