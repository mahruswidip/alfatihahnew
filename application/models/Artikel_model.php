<?php

class Artikel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get artikel by id_artikel
     */
    function get_artikel($id_artikel)
    {
        return $this->db->get_where('artikel', array('id_artikel' => $id_artikel))->row_array();
    }

    /*
     * Get all artikel count
     */
    function get_all_artikel_count()
    {
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }

    /*
     * Get all artikel
     */
    function get_all_artikel($params = array())
    {
        $this->db->order_by('artikel.id_artikel', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_artikel=artikel.id_artikel', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('artikel')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('artikel', 'artikel.id_artikel=tbl_users.id_artikel', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new artikel
     */
    public function add_artikel($params, $gambar)
    {
        $data = array(
            'kategori' => $params['kategori'],
            'travel' => $params['travel'],
            'judul_artikel' => $params['judul_artikel'],
            'konten' => $params['konten'],
            'artikel_img' => $gambar
        );

        $this->db->insert('artikel', $data);
    }

    /*
     * function to update artikel
     */

    public function update_artikel($id_artikel, $data)
    {
        // Update data artikel berdasarkan ID
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel', $data);
    }

    public function edit_artikel($id, $data)
    {
        $this->db->where('id_artikel', $id);
        $this->db->update('artikel', $data);
    }

    /*
     * function to delete artikel
     */
    function delete_artikel($id_artikel)
    {
        return $this->db->delete('artikel', array('id_artikel' => $id_artikel));
    }
}
