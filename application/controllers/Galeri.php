<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    private $datauser;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'file'));
        $this->load->model('Galeri_model');
    }

    function index()
    {
        $data['js'] = base_url('assets/js');
        $data['css'] = base_url('assets/css');
        $data['img'] = base_url('assets/images');

        $data['galeri'] = $this->Galeri_model->get_all_galeri();

        $data['_view'] = 'galeri/index';
        $this->load->view('layouts/main', $data);
    }

    function gambar_upload()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $travel = $this->input->post('travel'); // Assuming you have a form field for 'travel'

            $targetPath = './assets/images/galeri/';
            $targetFile = $targetPath . $fileName;

            move_uploaded_file($tempFile, $targetFile);

            $data = array(
                'nama' => $fileName,
                'tipe' => $fileType,
                'ukuran' => $fileSize,
                'travel' => $travel,
            );

            // echo '<pre>';
            // print_r($data);
            // exit();

            $this->Galeri_model->insert_galeri($data);
        }

        redirect('galeri/index');
    }

    function remove($id)
    {
        $data['selectedgaleri'] = $this->Galeri_model->get_galeri_by_id($id);

        if (isset($data['selectedgaleri'])) {
            unlink(FCPATH . 'assets/images/galeri/' . $data['selectedgaleri']['nama']);
            $this->Galeri_model->remove($id);
            redirect('galeri/index');
        } else {
            redirect('galeri/index');
        }
    }
}
