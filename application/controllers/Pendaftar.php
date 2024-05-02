<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Pendaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        $this->load->model('Users_model');
    }

    /*
     * Listing of pendaftar
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('pendaftar/index?');
        $config['total_rows'] = $this->Pendaftar_model->get_all_pendaftar_count();
        $this->pagination->initialize($config);

        $data['pendaftar'] = $this->Pendaftar_model->get_all_pendaftar($params);

        // echo '<pre>';
        // print_r($data['pendaftar']);
        // exit();

        $data['_view'] = 'pendaftar/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new pendaftar
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'tanggal_pendaftar' => $this->input->post('tanggal_pendaftar'),
                'is_aktif' => '1',
                'tanggal_manasik' => $this->input->post('tanggal_manasik'),
            );

            $pendaftar_id = $this->Pendaftar_model->add_pendaftar($params);
            redirect('pendaftar/index');
        } else {
            $data['_view'] = 'pendaftar/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a pendaftar
     */


    public function edit($id_pendaftar)
    {
        // Memeriksa apakah pendaftar ada sebelum mencoba mengeditnya
        $data['pendaftar'] = $this->Pendaftar_model->get_pendaftar($id_pendaftar);

        if (isset($data['pendaftar']['id_pendaftar'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mendapatkan data dari formulir edit
                $tanggal_pendaftar = $this->input->post('tanggal_pendaftar');
                $is_aktif = ($this->input->post('is_aktif') == 'on') ? 1 : 0;
                $tanggal_manasik = $this->input->post('tanggal_manasik');

                // Menyiapkan data untuk diperbarui
                $params = array(
                    'tanggal_pendaftar' => $tanggal_pendaftar,
                    'is_aktif' => $is_aktif,
                    'tanggal_manasik' => $tanggal_manasik,
                );

                // Memperbarui data pendaftar berdasarkan ID
                $this->Pendaftar_model->update_pendaftar($id_pendaftar, $params);

                // Mengalihkan pengguna ke halaman index setelah pembaruan
                redirect('pendaftar/index');
            } else {
                // Menampilkan halaman edit dengan data pendaftar
                $data['_view'] = 'pendaftar/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The pendaftar you are trying to edit does not exist.');
        }
    }

    function view()
    {
        $data = $this->Pendaftar_model->get_all_pendaftar(); // Call a method from your model to get data from the database
        echo json_encode($data);
    }



    /*
     * Nonaktifkan pendaftar
     */
    function deactivate($id_pendaftar)
    {
        $this->Pendaftar_model->update_pendaftar($id_pendaftar, array('is_aktif' => '0'));
        redirect('pendaftar/index');
    }

    /*
     * Deleting pendaftar
     */
    function remove($id_pendaftar)
    {
        $pendaftar = $this->Pendaftar_model->get_pendaftar($id_pendaftar);

        // check if the pendaftar exists before trying to delete it
        if (isset($pendaftar['id_pendaftar'])) {
            $this->Pendaftar_model->delete_pendaftar($id_pendaftar);
            redirect('pendaftar/index');
        } else
            show_error('The pendaftar you are trying to delete does not exist.');
    }
}
