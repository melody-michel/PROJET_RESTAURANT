<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipement_Controller extends CI_Controller
{

    public function index()
    {
        $this->voirEquipements();
    }



    public function voirEquipements()
    {
        // Récupération des données
        $this->load->model('equipements_model');
        $data['query'] = $this->equipements_model->allEquipment();

        // Chargement des vues
        $this->load->view('general/header_view');
        $this->load->view('admin/equipements_view', $data);
        $this->load->view('general/footer_view');
    }



    public function equipementNew()
    {
        $data['titreFormulaire']='Nouvel équipement';

        // Règles de validation du formulaire
        $this->form_validation->set_rules('nomEquipement', 'nom', 'trim|required');
        $this->form_validation->set_rules('tempMini', 'minimum', 'trim|required');
        $this->form_validation->set_rules('tempMaxi', 'maximum', 'trim|required');
        $this->form_validation->set_rules('commEquipement', 'commentaire', 'trim|max_length[255] ');

        // Vérification de la validité du formulaire
        if ($this->form_validation->run()) {

            $this->load->model('equipements_model');

            $insert = array(
                    'designation' => $_POST['nomEquipement'],
                    'mini' => $_POST['tempMini'],
                    'maxi' => $_POST['tempMaxi'],
                    'commentaire' => $_POST['commEquipement'],
                    'statut' => 'ACTIF');

            $this->equipements_model->create($insert);

            redirect('equipements');

        } else {

            $this->load->view('general/header_view');
            $this->load->view('admin/equipementMaj_view', $data);
            $this->load->view('general/footer_view');
        }
    }



    public function equipementUpdate($num)
    {
        $data['titreFormulaire']='Mise à jour d\'un équipement';


        $this->load->model('equipements_model');

        // Récupération des données de l'équipement sélectionné
        $where = array('Id' => $num);
        $data['query'] = $this->equipements_model->readOne($where);

        // Règles de validation du formulaire
        $this->form_validation->set_rules('nomEquipement', 'nom', 'trim|required');
        $this->form_validation->set_rules('tempMini', 'minimum', 'trim|required');
        $this->form_validation->set_rules('tempMaxi', 'maximum', 'trim|required');
        $this->form_validation->set_rules('commEquipement', 'commentaire', 'trim|max_length[255] ');

        // Vérification de la validité du formulaire
        if ($this->form_validation->run()) {

            $update = array(
                    'designation' => $_POST['nomEquipement'],
                    'mini' => $_POST['tempMini'],
                    'maxi' => $_POST['tempMaxi'],
                    'commentaire' => $_POST['commEquipement']);

            $this->equipements_model->update($update,$where);

            redirect('equipements');

        } else {

            $this->load->view('general/header_view');
            $this->load->view('admin/equipementMaj_view',$data);
            $this->load->view('general/footer_view');
        }
    }



    public function equipementOff($num)
    {
        // Désactivation de l'équipement sélectionné
        $this->load->model('equipements_model');
        $data = array('STATUT' => 'INACTIF');
        $where = array('Id' => $num);
        $this->equipements_model->update($data, $where);

        // Chargement de la page mise à jour
        redirect('equipements');
    }

}
