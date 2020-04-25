<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion_Controller extends CI_Controller
{

    public function index()
    {
        $this->connexion();
    }


    public function connexion()
    {
        $authentification['authentification'] = NULL;

        // Validation du formulaire avec la bibliothèque 'form_validation'
        $this->form_validation->set_rules('login', 'login', 'trim|required');
        $this->form_validation->set_rules('mdp', 'mot de passe', 'trim|required');

        if ($this->form_validation->run()) {

            //	Le formulaire est valide

            // Chargement du modèle
            $this->load->model('utilisateurs_model');

            // Préparation et exécution de la requête (=récupération des éléments selon le login)
            $where = array('LOGIN' => $_POST['login']);
            $query = $this->utilisateurs_model->readOne($where);

            // Analyse du résultat de la requête
            if ($query && password_verify($_POST['mdp'], $query->MDP)) {

                if ($query->STATUT === 'ACTIF') {

                    //Utilisateur authentifié, création de la session
                    $this->session->id = $query->Id;
                    $this->session->nom = $query->NOM;
                    $this->session->prenom = $query->PRENOM;
                    $this->session->role = $query->ROLE;

                    $this->load->view('general/header_view');
                    $this->load->view('user/connexion_view', $authentification);
                    $this->load->view('general/footer_view');

                } else {

                    $authentification['authentification'] = nl2br("Votre compte est désactivé. \nVeuillez contacter l'administrateur.");
                    $this->load->view('general/header_view');
                    $this->load->view('user/connexion_view', $authentification);
                    $this->load->view('general/footer_view');

                }

            } else {

                $authentification['authentification'] = 'L\'identifiant et/ou le mot de passe sont incorrects.';
                $this->load->view('general/header_view');
                $this->load->view('user/connexion_view', $authentification);
                $this->load->view('general/footer_view');

            }

        } else {

            //	Le formulaire est invalide ou vide
            $this->load->view('general/header_view');
            $this->load->view('user/connexion_view');
            $this->load->view('general/footer_view');

        }

    }



    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('connexion_controller');
    }
}
