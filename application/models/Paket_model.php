<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Paket_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get luasan by id_luasan
     */
    function get_paket($id_paket)
    {
        return $this->db->get_where('paket', array('id_paket' => $id_paket))->row_array();
    }


    /*
     * Get all paket count
     */
    function get_all_paket_count()
    {
        $this->db->from('paket');
        return $this->db->count_all_results();
    }

    function get_tanggal_keberangkatan()
    {
        $this->db->where('is_aktif', '1'); // Tambahkan kondisi is_aktif = 1
        $this->db->order_by('keberangkatan.id_keberangkatan', 'desc');
        return $this->db->get('keberangkatan')->result_array();
    }

    function get_tanggal_keberangkatan_for_detail($id_paket)
    {
        $this->db->join('keberangkatan', 'keberangkatan.id_keberangkatan=paket.fk_id_keberangkatan', 'left');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get('paket')->result_array();
    }

    function get_record_with_this_paket($id_paket)
    {
        $this->db->join('jamaah', 'jamaah.id_jamaah=record_keberangkatan.id_jamaah', 'left');
        $this->db->where('record_keberangkatan.id_paket', $id_paket);
        return $this->db->get('record_keberangkatan')->result_array();
    }

    /*
     * Get all paket
     */
    function get_all_paket($params = array())
    {
        $this->db->order_by('paket.id_paket', 'desc');
        $this->db->join('tbl_users', 'tbl_users.user_id=paket.created_by', 'left');
        $this->db->join('keberangkatan', 'keberangkatan.id_keberangkatan=paket.fk_id_keberangkatan', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('paket')->result_array();
    }

    /*
     * function to add new paket
     */
    function add_paket($params, $gambar)
    {
        $this->db->set('travel', $params['travel']);
        $this->db->set('nama_program', $params['nama_program']);
        $this->db->set('fk_id_keberangkatan', $params['fk_id_keberangkatan']);
        $this->db->set('lama_hari', $params['lama_hari']);
        $this->db->set('kategori', $params['kategori']);
        $this->db->set('paket', $params['paket']);
        $this->db->set('hotel_mekkah', $params['hotel_mekkah']);
        $this->db->set('hotel_madinah', $params['hotel_madinah']);
        $this->db->set('bintang_mekkah', $params['bintang_mekkah']);
        $this->db->set('bintang_madinah', $params['bintang_madinah']);
        $this->db->set('matauang', $params['matauang']);
        $this->db->set('uang_muka', $params['uang_muka']);
        $this->db->set('matauangall', $params['matauangall']);
        $this->db->set('harga_paket', $params['harga_paket']);
        $this->db->set('sudah_termasuk', $params['sudah_termasuk']);
        $this->db->set('belum_termasuk', $params['belum_termasuk']);
        $this->db->set('paket_img', $gambar);
        $this->db->set('created_by', $params['created_by']);
        $this->db->set('nomor_guide', $params['nomor_guide']);
        $this->db->set('publish', $params['publish']);
        $this->db->insert('paket');
    }

    /*
     * function to update paket
     */
    function update_paket($id_paket, $params)
    {
        $this->db->where('id_paket', $id_paket);
        return $this->db->update('paket', $params);
    }


    /*
     * function to delete paket
     */
    function delete_paket($id_paket)
    {
        return $this->db->delete('paket', array('id_paket' => $id_paket));
    }
}
