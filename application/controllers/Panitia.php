<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Panitia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Panitia');
        $this->load->model('MPanitia');
        $this->page->setLoadJs('assets/js/panitia');
    }


    private function getValidationInsert()
    {
        $validation = array(
            array('field' => 'nip', 'label' => '', 'rules' => 'required|integer'),
            array('field' => 'nama', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'jabatan', 'label' => '', 'rules' => 'trim|required')
        );

        return $validation;
    }

    private function getValidationUpdatePanitia()
    {
        $validation = array(
            array('field' => 'nip', 'label' => '', 'rules' => 'required|integer'),
            array('field' => 'nama', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'jabatan', 'label' => '', 'rules' => 'trim|required')
        );

        return $validation;
    }

    public function index()
    {
        $data['panitia'] = $this->MPanitia->getAll();
        loadPage('panitia/index',$data);
    }

    public function tambah($id=null)
    {
        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules($this->getValidationInsert());
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {
                    $this->MPanitia->nip = $this->input->post('nip', true);
                    $this->MPanitia->nama = $this->input->post('nama', true);
                    $this->MPanitia->jabatan = $this->input->post('jabatan', true);

                    if ($this->MPanitia->insert() == true) {
                        $this->session->set_flashdata('message','Berhasil menambah data :)');
                        redirect('panitia');
                    }
                }
            } else {
                $data['dataView'] = $this->getDataInsert(); 
                loadPage('panitia/tambah',$data);
            }
        } else {
            if(count($_POST)){
                $this->form_validation->set_rules($this->getValidationUpdatePanitia());
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $errors['valid'] = false;
                    echo json_encode($errors);
                }else{
                    $this->MPanitia->nip = $this->input->post('nip', true);
                    $this->MPanitia->nama = $this->input->post('nama', true);
                    $this->MPanitia->jabatan = $this->input->post('jabatan', true);

                    $where = array('kdPanitia' => $id);
                    $update = $this->MPanitia->update($where);
                    if($update){
                        $this->session->set_flashdata('message','Berhasil mengubah data :)');
                        redirect('panitia?update=true');
                    }else{
                        redirect('panitia?update=false');
                    }
                }
            }
            $data['dataView'] = $this->getDataUpdate($id); 
            loadPage('panitia/tambah',$data);
        }

    }

    public function delete($id)
    {
        if($this->MPanitia->delete($id) == true){
            $this->session->set_flashdata('message','Berhasil menghapus data :)');
            echo json_encode(array("status" => 'true'));
        }
    }

    public function getById($kode)
    {
        $this->MPanitia->kdPanitia = $kode;
        $data = $this->MPanitia->getById();
        echo json_encode($data);
    }

    private function getDataUpdate($id)
    {
        $dataView = array();
        $panitia = $this->MPanitia->getById($id);
            $dataView[] = array(
                'nip' => $panitia->nip,
                'nama' => $panitia->nama,
                'jabatan' => $panitia->jabatan
            );
        return $dataView;
    }

    private function getDataInsert()
    {
        $dataView = array();
        $panitia = $this->MPanitia->getAll();
        foreach ($panitia as $item) {
            $dataView[$item->kdPanitia] = array(
                'nip' => $item->nip,
                'nama' => $item->nama,
                'jabatan' => $item->jabatan
            );
        }

        return $dataView;
    }

}