<?php

class Produits_model extends MY_Model
{

    protected $table = 'produits';

    public function allProducts()
    {
        $query = $this->db->select('*')
                ->from($this->table)
                ->where(array('STATUT'=>'ACTIF'))
                ->order_by('Id_CATEGORIE ASC')
                ->get();

        if ($query->num_rows()) {
            return $query->result_array();
        }
    }



}