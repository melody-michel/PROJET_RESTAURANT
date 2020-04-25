<?php

class Utilisateurs_model extends MY_Model
{
    protected $table = 'utilisateurs';

    public function allUsers($statut, $order)
    {
        $query = $this->db->select('*')
                ->from($this->table)
                ->where(array('STATUT' => $statut,'LOGIN !=' => 'ADMIN'))
                ->order_by($order)
                ->get();

        if ($query->num_rows()) {
            return $query->result_array();
        }
    }

}