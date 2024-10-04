<?php
//include_once("xlsxwriter.class.php");
$this->load->view('template/excel/xlsxwriter.class.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "Beasiswa ".date('d F Y').".xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$header = array(
    array('NAMA','ASAL SEKOLAH','KELAS','NO HP','NAMA ORTU','NO ORTU','PEKERJAAN ORTU','EMAIL','PRESTASI','SUMBER INFO'),
);
$query = ';';
$this->db->select('nama, asal_sekolah, kelas, no_hp, nama_ortu, no_hp_ortu,pekerjaan_ortu, email, prestasi, sumber_info');

if($this->session->userdata('nama')!=""){$this->db->where('nama',$this->session->userdata('nama'));}
if($this->session->userdata('jurusan')!=""){$this->db->where('jurusan',$this->session->userdata('jurusan'));}
if($this->session->userdata('sekolah')!=""){$this->db->where('sekolah',$this->session->userdata('sekolah'));}
if($this->session->userdata('tahun_akademik')!=""){$this->db->where('tahun_akademik',$this->session->userdata('tahun_akademik'));}

$this->db->from('beasiswa');		
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
