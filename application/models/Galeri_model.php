<?php
class Galeri_model extends CI_Model
{
    function insert_galeri($data)
    {
        $this->db->insert('img_dropzone', $data);
    }
    function get_all_galeri($params = array())
    {
        $this->db->order_by('img_dropzone.id', 'desc');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('img_dropzone')->result_array();
    }
    function get_galeri_by_id($id)
    {
        return $this->db->get_where('img_dropzone', array('id' => $id))->row_array();
    }
    function remove($id)
    {
        return $this->db->delete('img_dropzone', array('id' => $id));
    }
}
