<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MNilai extends CI_Model{

    public $kdSiswa;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'kdSiswa' => $this->kdSiswa,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiBySiswa($id)
    {
        $query = $this->db->query(
            'select u.*, k.kdKriteria, n.nilai from siswa u, nilai n, kriteria k, subkriteria sk where u.kdSiswa = n.kdSiswa AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdSiswa = '.$id.' GROUP by n.nilai '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiSiswa()
    {
        $query = $this->db->query(
            'select u.kdSiswa, u.siswa, k.kdKriteria, k.kriteria ,n.nilai from siswa u, nilai n, kriteria k where u.kdSiswa = n.kdSiswa AND k.kdKriteria = n.kdKriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdSiswa', $this->kdSiswa);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdSiswa', $id);
        return $this->db->delete($this->getTable());
    }
}