<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDashboard extends CI_Model 
{
	var $tb_kriteria = 'kriteria';
	var $tb_siswa 	 = 'siswa';
	var $tb_panitia  = 'panitia';

	public function count_kriteria()
	{
		$this->db->from($this->tb_kriteria);
		return $this->db->count_all_results();
    }

    public function count_siswa()
	{
		$this->db->from($this->tb_siswa);
		return $this->db->count_all_results();
    }

    public function count_panitia()
	{
		$this->db->from($this->tb_panitia);
		return $this->db->count_all_results();
    }
}