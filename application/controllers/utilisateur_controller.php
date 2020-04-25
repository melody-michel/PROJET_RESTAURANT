<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_Controller extends CI_Controller
{

    public function index()
    {
        $this->voirUtilisateurs();
    }



    public function voirUtilisateurs()
    {
        $this->load->model('utilisateurs_model');

        $order = 'ROLE ASC, NOM ASC';

        $data['actif'] = $this->utilisateurs_model->allUsers('ACTIF', $order);
        $data['inactif'] = $this->utilisateurs_model->allUsers('INACTIF', $order);

        $this->load->view('general/header_view');
        $this->load->view('admin/utilisateurs_view', $data);
        $this->load->view('general/footer_view');
    }



    public function utilisateurNew()
    {
        $data['titreFormulaire']='Nouvel utilisateur';

        // Validation du formulaire avec la bibliothèque 'form_validation'
        $this->form_validation->set_rules('nomUtilisateur', '"Nom"', 'trim|required|min_length[2]|max_length[50]|alphaaccent');
        $this->form_validation->set_rules('prenomUtilisateur', '"Prenom"', 'trim|required|min_length[2]|max_length[50]|alphaaccent');
        $this->form_validation->set_rules('mailUtilisateur', '"Email"', 'trim|required|max_length[255]|valid_email');

        if ($this->form_validation->run()) {

            //	Le formulaire est valide

            // Chargement du modèle, recherche de l'id
            $this->load->model('utilisateurs_model');
            $id = $this->utilisateurs_model->getId();


            // Récupération des données
            $nom = $_POST['nomUtilisateur'];
            $prenom = $_POST['prenomUtilisateur'];
            $login = mb_substr($prenom, 0, 2) . str_pad($id, 3, "0", STR_PAD_LEFT)
                    . mb_substr($nom, -1, 1);
            $mdp = password_hash($this->mdp(8), PASSWORD_DEFAULT);
            $role = $_POST['roleUtilisateur'];
            $mail = $_POST['mailUtilisateur'];


            // Préparation de la requête d'insertion
            $data = array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'login' => $login,
                    'mdp' => $mdp,
                    'role' => $role,
                    'mail' => $mail,
                    'statut'=> 'ACTIF');

            // Insertion des données dans la base de données
            $this->utilisateurs_model->create($data);

            // Redirection
            redirect('utilisateurs');

        } else {

            //	Le formulaire est invalide ou vide
            $this->load->view('general/header_view');
            $this->load->view('admin/utilisateurMaj_view', $data);
            $this->load->view('general/footer_view');
        }
    }



    public function mdp($nbChar)
    {
        // Création d'un mot de passe aléatoire
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 1, $nbChar);
    }



    public function utilisateurUpdate($num)
    {
        $data['titreFormulaire']='Mise à jour du profil';

        // Validation du formulaire avec la bibliothèque 'form_validation'
        $this->form_validation->set_rules('nomUtilisateur', '"Nom"', 'trim|required|min_length[2]|max_length[50]|alphaaccent');
        $this->form_validation->set_rules('prenomUtilisateur', '"Prenom"', 'trim|required|min_length[2]|max_length[50]|alphaaccent');
        $this->form_validation->set_rules('mailUtilisateur', '"Email"', 'trim|required|max_length[255]|valid_email');

        if ($this->form_validation->run()) {

            //	Le formulaire est valide

                        $this->load->model('utilisateurs_model');

                        // Récupération des données
                        $nom = $_POST['nomUtilisateur'];
                        $prenom = $_POST['prenomUtilisateur'];
                        $role = $_POST['roleUtilisateur'];
                        $mail = $_POST['mailUtilisateur'];


                        // Préparation de la requête d'insertion
                        $data = array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'role' => $role,
                                'mail' => $mail);
                        $where = array('Id' => $num);




                        // Insertion des données dans la base de données
                        $this->utilisateurs_model->update($data, $where);

            // Redirection
            redirect('utilisateurs');

        } else {

            //	Le formulaire est invalide ou vide


            $this->load->model('utilisateurs_model');

            $where = array('Id' => $num);
            $data['query'] = $this->utilisateurs_model->readOne($where);

            $this->load->view('general/header_view');
            $this->load->view('admin/utilisateurMaj_view', $data);
            $this->load->view('general/footer_view');
        }
    }



    public function utilisateurOff($num)
    {
        $this->load->model('utilisateurs_model');

        // Préparation de la requête d'insertion
        $data = array('STATUT' => 'INACTIF',);
        $where = array('Id' => $num);


        // Insertion des données dans la base de données
        $this->utilisateurs_model->update($data, $where);


        redirect('utilisateurs');
    }



    public function utilisateurOn($num)
    {
        $this->load->model('utilisateurs_model');

        // Préparation de la requête d'insertion
        $data = array('STATUT' => 'ACTIF',);
        $where = array('Id' => $num);


        // Insertion des données dans la base de données
        $this->utilisateurs_model->update($data, $where);


        redirect('utilisateurs');
    }


}