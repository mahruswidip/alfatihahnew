<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Keberangkatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Keberangkatan_model');
        $this->load->model('Users_model');
    }

    /*
     * Listing of keberangkatan
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('keberangkatan/index?');
        $config['total_rows'] = $this->Keberangkatan_model->get_all_keberangkatan_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['keberangkatan'] = '';
        if ($user_level == '2') {
            $data['keberangkatan'] = $this->Keberangkatan_model->get_users_by_created_by($user_id);
        } elseif ($user_level == '1') {
            $data['keberangkatan'] = $this->Keberangkatan_model->get_all_keberangkatan($params);
        }


        // echo '<pre>';
        // print_r($data['keberangkatan']);
        // exit();

        $data['_view'] = 'keberangkatan/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new keberangkatan
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'tanggal_keberangkatan' => $this->input->post('tanggal_keberangkatan'),
                'is_aktif' => $this->input->post('is_aktif'),
                'tanggal_manasik' => $this->input->post('tanggal_manasik'),
            );

            $keberangkatan_id = $this->Keberangkatan_model->add_keberangkatan($params);
            redirect('keberangkatan/index');
        } else {
            $data['_view'] = 'keberangkatan/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a keberangkatan
     */


    public function edit($id_keberangkatan)
    {
        // Memeriksa apakah keberangkatan ada sebelum mencoba mengeditnya
        $data['keberangkatan'] = $this->Keberangkatan_model->get_keberangkatan($id_keberangkatan);

        if (isset($data['keberangkatan']['id_keberangkatan'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mendapatkan data dari formulir edit
                $tanggal_keberangkatan = $this->input->post('tanggal_keberangkatan');
                $is_aktif = ($this->input->post('is_aktif') == 'on') ? 1 : 0;
                $tanggal_manasik = $this->input->post('tanggal_manasik');

                // Menyiapkan data untuk diperbarui
                $params = array(
                    'tanggal_keberangkatan' => $tanggal_keberangkatan,
                    'is_aktif' => $is_aktif,
                    'tanggal_manasik' => $tanggal_manasik,
                );

                // Memperbarui data keberangkatan berdasarkan ID
                $this->Keberangkatan_model->update_keberangkatan($id_keberangkatan, $params);

                // Mengalihkan pengguna ke halaman index setelah pembaruan
                redirect('keberangkatan/index');
            } else {
                // Menampilkan halaman edit dengan data keberangkatan
                $data['_view'] = 'keberangkatan/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The keberangkatan you are trying to edit does not exist.');
        }
    }

    function view()
    {
        $data = $this->Keberangkatan_model->get_all_keberangkatan(); // Call a method from your model to get data from the database
        echo json_encode($data);
    }



    /*
     * Nonaktifkan keberangkatan
     */
    function deactivate($id_keberangkatan)
    {
        $this->Keberangkatan_model->update_keberangkatan($id_keberangkatan, array('is_aktif' => '0'));
        redirect('keberangkatan/index');
    }

    /*
     * Deleting keberangkatan
     */
    function remove($id_keberangkatan)
    {
        $keberangkatan = $this->Keberangkatan_model->get_keberangkatan($id_keberangkatan);

        // check if the keberangkatan exists before trying to delete it
        if (isset($keberangkatan['id_keberangkatan'])) {
            $this->Keberangkatan_model->delete_keberangkatan($id_keberangkatan);
            redirect('keberangkatan/index');
        } else
            show_error('The keberangkatan you are trying to delete does not exist.');
    }
}
