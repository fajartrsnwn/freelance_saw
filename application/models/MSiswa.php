<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:51
 */

class MSiswa extends CI_Model{

    public $kdSiswa;
    public $siswa;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'siswa';
    }

    private function getData(){
        $data = array(
            'siswa' => $this->siswa
        );

        return $data;
    }

    public function getAll()
    {
        $siswa = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $siswa[] = $row;
            }
        }
        return $siswa;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdSiswa', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdSiswa');
        $this->db->order_by('kdSiswa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}