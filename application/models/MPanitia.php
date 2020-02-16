<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MPanitia extends CI_Model{

    public $kdPanitia;
    public $nip;
    public $nama;
    public $jabatan;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'panitia';
    }

    private function getData(){
        $data = array(
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan
        );

        return $data;
    }



    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $panitia[] = $row;
            }
            return $panitia;
        }
    }

    public function getById($id)
    {

        $this->db->from($this->getTable());
        $this->db->where('kdPanitia',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPanitia', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdPanitia');
        $this->db->order_by('kdPanitia', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

}