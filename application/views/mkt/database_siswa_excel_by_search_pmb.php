<?php
//include_once("xlsxwriter.class.php");
$this->load->view('template/excel/xlsxwriter.class.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "Database Siswa PMB ".date('d F Y').".xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$header = array(
    array('PRESENTER','NAMA','TANGGAL LAHIR','ALAMAT','KABUPATEN/ KOTA','ASAL SEKOLAH','JURUSAN SEKOLAH','KELAS','RANKING','PRESTASI','NO HP/ WHATSAPP', 'NAMA ORANG TUA', 'PEKERJAAN ORANG TUA', 'NO HP ORANG TUA', 'PENGHASILAN ORANG TUA', 'LP3I', 'JURUSAN LP3I', 'KAMPUS LAIN', 'NAMA KAMPUS LAIN', 'JURUSAN KAMPUS LAIN', 'LAIN - LAIN', 'KIP', 'KESAN/ PERTANYAAN'),
);
$query = ';';
$this->db->select('nama_presenter,nama_lengkap, DATE_FORMAT(tanggal_lahir, "%d %M %Y"), alamat, kota, sekolah, jurusan_sekolah, kelas, ranking, prestasi, no_hp, nama_wali, pekerjaan_wali, no_hp_wali, penghasilan_orang_tua, IF(lp3i != "","v",""), lp3i, IF(kampus_lain != "","v",""), kampus_lain, kampus_lain_jurusan, lain_lain, kip, kesan');

if($this->session->userdata('nama')!=""){$this->db->where('nama_lengkap',$this->session->userdata('nama'));}
if($this->session->userdata('jurusan')!=""){$this->db->where('id_jurusan_sekolah',$this->session->userdata('jurusan'));}
if($this->session->userdata('sekolah')!=""){$this->db->where('id_sekolah',$this->session->userdata('sekolah'));}
if($this->session->userdata('tahun_akademik')!=""){$this->db->where('tahun_akademik',$this->session->userdata('tahun_akademik'));}
if($this->session->userdata('presenter')!=""){$this->db->where('presenter',$this->session->userdata('presenter'));}

$this->db->from('view_aplikan_pmb');		
$main_menu = $this->db->get();

foreach ($main_menu->result_array() as $row)
{
    $rows[] = $row;
}	

$writer = new XLSXWriter();
$writer->setAuthor('Some Author');
 
foreach($header as $row)
	$writer->writeSheetRow('Sheet1', $row);
	
foreach($rows as $row)
	$writer->writeSheetRow('Sheet1', $row);
$writer->writeToStdOut();
exit(0);
