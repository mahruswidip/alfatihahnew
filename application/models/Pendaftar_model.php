<?php

class Pendaftar_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get pendaftar by id_pendaftar
     */
    function get_pendaftar($id_pendaftar)
    {
        return $this->db->get_where('pendaftar', array('id_pendaftar' => $id_pendaftar))->row_array();
    }

    /*
     * Get all pendaftar count
     */
    function get_all_pendaftar_count()
    {
        $this->db->from('pendaftar');
        return $this->db->count_all_results();
    }

    /*
     * Get all pendaftar
     */
    function get_all_pendaftar($params = array())
    {
        $this->db->order_by('pendaftar.id_pendaftar', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_pendaftar=pendaftar.id_pendaftar', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pendaftar')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('pendaftar', 'pendaftar.id_pendaftar=tbl_users.id_pendaftar', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new pendaftar
     */
    function add_pendaftar($params)
    {
        $this->db->insert('pendaftar', $params);
        return $this->db->insert_id();
    }


    function register($user_name, $user_email, $user_password)
    {
        $data_user = array(
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_password' => $user_password
        );
        // var_dump($data_user);
        $this->db->insert('tbl_users', $data_user);
    }

    /*
     * function to update pendaftar
     */
    function update_pendaftar($id_pendaftar, $params)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        return $this->db->update('pendaftar', $params);
    }

    /*
     * function to delete pendaftar
     */
    function delete_pendaftar($id_pendaftar)
    {
        return $this->db->delete('pendaftar', array('id_pendaftar' => $id_pendaftar));
    }
}
