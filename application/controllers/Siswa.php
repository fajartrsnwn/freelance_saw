<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:42
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Siswa');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MSiswa');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/siswa');
    }

    public function index()
    {
        $data['siswa'] = $this->MSiswa->getAll();
        loadPage('siswa/index', $data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('siswa', '', 'trim|required');
                $this->form_validation->set_rules('nisn', '', 'trim|required');
                $this->form_validation->set_rules('alamat', '', 'trim|required');
                $this->form_validation->set_rules('tanggal_lahir', '', 'trim|required');

                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                    if ($this->MSiswa->getNisn($this->input->post('nisn')) == false) {
                            $this->session->set_flashdata('message','NISN telah terdaftar dalam sistem :)');
                            redirect(current_url().'?nisnCheck=false');
                    }

                    $siswa = $this->input->post('siswa');
                    $nisn = $this->input->post('nisn');
                    $alamat = $this->input->post('alamat');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $sudah_di_nilai = $this->input->post('sudah_di_nilai');

                    $nilai = $this->input->post('nilai');

                    $this->MSiswa->siswa = $siswa;
                    $this->MSiswa->nisn = $nisn;
                    $this->MSiswa->alamat = $alamat;
                    $this->MSiswa->tanggal_lahir = $tanggal_lahir;
                    $this->MSiswa->jenis_kelamin = $jenis_kelamin;
                    $this->MSiswa->tempat_lahir = $tempat_lahir;
                    $this->MSiswa->sudah_di_nilai = $sudah_di_nilai;


                    if ($this->MSiswa->insert() == true) {
                        $success = false;
                        $kdSiswa = $this->MSiswa->getLastID()->kdSiswa;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdSiswa = $kdSiswa;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('siswa');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('siswa/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $kdSiswa = $this->uri->segment(3, 0);
                dump($kdSiswa);
                if($kdSiswa > 0){
                    $siswa = $this->input->post('siswa');
                    $nisn = $this->input->post('nisn');
                    $alamat = $this->input->post('alamat');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $sudah_di_nilai = $this->input->post('sudah_di_nilai');


                    $nilai = $this->input->post('nilai');
                    $where = array('kdSiswa' => $kdSiswa);
                    // dump($where);
                    $this->MSiswa->siswa = $siswa;
                    $this->MSiswa->nisn = $nisn;
                    $this->MSiswa->alamat = $alamat;
                    $this->MSiswa->tanggal_lahir = $tanggal_lahir;
                    $this->MSiswa->jenis_kelamin = $jenis_kelamin;
                    $this->MSiswa->tempat_lahir = $tempat_lahir;
                    $this->MSiswa->sudah_di_nilai = $sudah_di_nilai;
                    // dump($siswa);
                    if($this->MSiswa->update($where) == true){
                        $success = true;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdSiswa = $kdSiswa;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('siswa');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiSiswa'] = $this->MNilai->getNilaiBySiswa($id);
            loadPage('siswa/tambah', $data);
        }

    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }

    public function delete($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MSiswa->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
            }
        }
    }
}