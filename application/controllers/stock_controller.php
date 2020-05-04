<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_Controller extends CI_Controller
{

    public function index()
    {
        $this->voirStocks();
    }



    public function voirStocks()
    {
        // Récupération des données
        $this->load->model('produits_model');
        $data['query'] = $this->produits_model->allProducts();

        // Chargement des vues
        $this->load->view('general/header_view');
        $this->load->view('user/stocksIn_view', $data);
        $this->load->view('general/footer_view');
    }



    public function productIn($num)
    {

            $this->load->model('stocks_model');

            $dateEntree = date('Y-m-d H:i:s');

            $insert = array(
                    'CODE_PRODUIT' => 'CODE',
                    'DATE_ENTREE' => $dateEntree,
                    'DLC' => $this->findDLC($dateEntree,$num),
                    'Id_UTILISATEUR' => $this->session->id,
                    'Id_Produit' => $num);

            $this->stocks_model->create($insert);

            redirect('stock_controller');


    }


    public function findDLC($dateEntree, $IdProduit)
    {

        $this->load->model('produits_model');

        $where = array('Id' => $IdProduit);

        $query = $this->produits_model->readOne($where);

        $dlc = date('Y-m-d H:i:s', strtotime($dateEntree . '+' . $query->DLC_heures . ' hours'));

        return $dlc;

    }



}
