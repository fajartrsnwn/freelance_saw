<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Superadmin');
        $this->load->model('MSuperadmin');
        $this->page->setLoadJs('assets/js/panitia');
    }


    private function getValidationInsert()
    {
        $validation = array(
            array('field' => 'nip', 'label' => '', 'rules' => 'required|integer')
        );

        return $validation;
    }

    private function getValidationUpdatePanitia()
    {
        $validation = array(
            array('field' => 'nip', 'label' => '', 'rules' => 'required|integer')
        );

        return $validation;
    }

    public function index($id=null)
    {
            if(count($_POST)){
                $this->form_validation->set_rules($this->getValidationUpdatePanitia());
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $errors['valid'] = false;
                    echo json_encode($errors);
                }else{
                    $this->MSuperadmin->username = $this->input->post('nip', true);
                        if (!empty($this->input->post('password')) ) {
                              if ($this->input->post('password') != $this->input->post('password2')) {
                                $this->session->set_flashdata('message','Password tidak cocok, silakan samakan password Anda :)');
                                redirect(current_url().'?update=false');
                            } else {
                                $this->MSuperadmin->password = md5($this->input->post('password', true));
                            } 
                        }
                        $where = array('id' => $id);
                        $update = $this->MSuperadmin->update($where);
                            if($update){
                                $this->session->set_flashdata('message','Berhasil mengubah data :)');
                                redirect(current_url().'?update=true');
                            }else{
                                $this->session->set_flashdata('message','Gagal mengubah data :)');
                                redirect(current_url().'?update=false');
                        }
                }
            }
            $data['dataView'] = $this->getDataUpdate($id); 
            loadPage('superadmin/index',$data);

    }

    public function delete($id)
    {
        if($this->MSuperadmin->delete($id) == true){
            $this->session->set_flashdata('message','Berhasil menghapus data :)');
            echo json_encode(array("status" => 'true'));
        }
    }

    public function getById($kode)
    {
        $this->MSuperadmin->id = $kode;
        $data = $this->MSuperadmin->getById();
        echo json_encode($data);
    }

    private function getDataUpdate($id)
    {
        $dataView = array();
        $superadmin = $this->MSuperadmin->getById($id);
            $dataView[] = array(
                'nip' => $superadmin->username
            );
        return $dataView;
    }

    private function getDataInsert()
    {
        $dataView = array();
        $superadmin = $this->MSuperadmin->getAll();
        foreach ($superadmin as $item) {
            $dataView[$item->id] = array(
                'nip' => $item->username
            );
        }

        return $dataView;
    }

}