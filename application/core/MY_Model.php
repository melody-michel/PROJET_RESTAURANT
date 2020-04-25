<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public function create($data)
    {
        $this->db->set($data)->insert($this->table);
    }

    public function update($data, $where)
    {
        $this->db->where($where)->update($this->table,$data);
    }

    public function readOne($where)
    {
        $query = $this->db->select('*')->from($this->table)->where($where)->get();

        if ($query->num_rows()) {
            return $query->row();
        }
    }

    public function delete($where)
    {
        $this->db->delete($this->table,$where);
    }

    public function getId()
    {
        $sql = "SHOW TABLE STATUS WHERE NAME = '" . $this->table . "'";
        $query = $this->db->query($sql);
        return $query->row()->Auto_increment;
    }

}