<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class log extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }
	
	public function index()
	{
		$this->Login();
	}
	
	/** --Login-- **/
	public function login()
	{
		$this->load->view('log/login');
	}
	public function cek_login()
	{
		$data['akses']	= "-";
		$select 		= $this->db->select('*');
		$select 		= $this->db->join('user_detail','user.id=user_detail.id');
		$select 		= $this->db->where('username',$this->input->post('username'));
		$select 		= $this->db->where('password',md5($this->input->post('password')));
        $read_user 		= $this->m->Get_All('user',$select);
		foreach($read_user as $ru){
			$data['username']	= $ru->username;
			$data['nama_user']	= $ru->nama;
			$data['akses']		= $ru->akses;
			$data['log']		= "lgn";
			$this->session->set_userdata($data);
		}
		if($data['akses']=="Marketing"){
			redirect(base_url()."mkt");			
		}
		redirect(base_url()."log?msg=gagal");
	}	
	/** --Login-- **/
	
	/** --Logout-- **/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."log?msg=logout");
	}
	/** --Logout-- **/
	
}
