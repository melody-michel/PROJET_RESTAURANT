<?php

class Equipements_model extends MY_Model
{
    protected $table = 'equipements';

    public function allEquipment()
    {
        $query = $this->db->select('*')
                ->from($this->table)
                ->where(array('STATUT'=>'ACTIF'))
                ->order_by('DESIGNATION ASC')
                ->get();

        if ($query->num_rows()) {
            return $query->result_array();
        }
    }

}