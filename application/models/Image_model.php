<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Image_model extends CI_Model
{
    protected $table = 'images';

    public function get($id)
    {
    	$query = $this->db->get_where($this->table, array('id'=> $id));

    	return $query->row();
    }

    public function insert($data)
    {
    	$this->db->insert($this->table, $data);


    	return $this->db->insert_id();
    }

}
