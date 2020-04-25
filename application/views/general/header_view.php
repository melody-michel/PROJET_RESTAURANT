<!DOCTYPE html>
<html lang="fr">

<head>

    <title>P.E.P.S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta charset="utf-8"/>

    <!-- Fichier CSS Bootstrap -->
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet"/>

    <!-- Fichier Fontawesome -->
    <link href="../../../assets/css/all-fontawesome.css" rel="stylesheet"/>

    <!-- Feuille de style CSS -->
    <link href="../../../assets/css/style.css" rel="stylesheet"/>

</head>

<body>

    <!-- Barre de navigation adaptée selon l'écran -->
    <div class="navbar navbar-expand-xl fixed-top">

        <!-- Masque la commande du menu aux utilisateurs non connectés (si navbar repliée) -->
        <?php if (isset($this->session->role)) { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPEPS"
                    aria-controls="menuPEPS" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
        <?php } ?>

        <span class="navbar-brand">
            P.E.P.S
            <span class="navbar-text d-none d-sm-inline">PREMIER ENTRÉ PREMIER SORTI</span>
        </span>

        <?php if (isset($this->session->role)) { ?>
            <div class="collapse navbar-collapse" id="menuPEPS">
                <ul class="navbar-nav flex-grow-1">

                    <!-- Menu de l'application, adapté selon le profil -->
                    <?php if ($this->session->role === 'administrateur') { ?>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" id="menuStocks" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Gestion des stocks</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuStocks">
                                <a class="dropdown-item" href="/equipements">Equipements frigorifiques</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Produits de référence</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Mise à jour des stocks</a>
                                <a class="dropdown-item" href="#">Historique</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" id="menuTemperature" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Gestion des températures</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuTemperature">
                                <a class="dropdown-item" href="#">Mise à jour</a>
                                <a class="dropdown-item" href="#">Historique</a>
                            </div>
                        </li>
                        <li class="nav-item flex-grow-1">
                            <a href="/utilisateurs">Gestion des utilisateurs</a>
                        </li>

                    <?php }

                    if ($this->session->role === 'utilisateur') { ?>
                        <li class="nav-item"><a href="#">Gestion des stocks</a></li>
                        <li class="nav-item flex-grow-1"><a href="#">Gestion des températures</a></li>
                    <?php } ?>

                    <li class="nav-item">
                        <span><?php echo $this->session->prenom . ' ' . $this->session->nom; ?></span>
                        <a href="deconnexion"><span class="fas fa-sign-out-alt"></span></a>
                    </li>

                </ul>

            </div>

        <?php } ?>

    </div>


    <!-- Bannière -->
    <div id="banniere"></div>

