<div class="principal container-fluid">

    <?php if (isset($actif)) { ?>

    <div class="row">
        <div class="col offset-2">
            <h2>
                Utilisateurs actifs
                <a href="utilisateur/new"><span class="fas fa-user-plus" title="Ajouter un utilisateur"></span></a>
            </h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-7 text-right">
            <a class="trier-par">Trier par</a>
            <span class="fas fa-chevron-down fa-xs"></span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-7">
            <table class="w-100">
                <?php foreach ($actif as $row): ?>
                    <tr>
                        <td>
                            <a href="#">
                            <span class="fas fa-envelope" title="Renvoyer les informations de connexion"> </span>
                            </a>
                            <a href="utilisateur/<?php echo $row['Id'] ?>">
                                <span class="fas fa-user-edit" title="Modifier le profil de l'utilisateur"> </span>
                            </a>

                            <a href="utilisateur/desactiver/<?php echo $row['Id'] ?>"
                               onclick="return confirm('&Ecirc;tes-vous sûr de vouloir désactiver le compte de l\'utilisateur <?php echo $row['PRENOM'] . ' ' . $row['NOM'] ?> ? ')"><span
                                        class="fas fa-user-times" title="Désactiver le profil de l'utilisateur"></span>
                            </a></td>
                        <td><?php echo $row['LOGIN'] ?></td>
                        <td><?php echo $row['NOM'] ?></td>
                        <td><?php echo $row['PRENOM'] ?></td>
                        <td><?php echo $row['ROLE'] ?></td>
                        <td><?php echo $row['MAIL'] ?></td>
                    </tr>

                <?php
                endforeach;
                } ?>
            </table>
        </div>
    </div>


    <?php if (isset($inactif)) { ?>


    <div class="row">
        <div class="col offset-2">
            <h2>Utilisateurs inactifs</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-7 text-right">
            <a class="trier-par">Trier par</a>
            <span class="fas fa-chevron-down fa-xs"></span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-7">
            <table class="w-100">
                <?php foreach ($inactif as $row): ?>
                    <tr>

                        <td><a href="utilisateur/activer/<?php echo $row['Id'] ?>"
                               onclick="return confirm('&Ecirc;tes-vous sûr de vouloir réactiver le compte de l\'utilisateur <?php echo $row['PRENOM'] . ' ' . $row['NOM'] ?> ? ')"><span
                                        class="fas fa-user-check"></span></a></td>
                        <td><?php echo $row['LOGIN'] ?></td>
                        <td><?php echo $row['NOM'] ?></td>
                        <td><?php echo $row['PRENOM'] ?></td>
                        <td><?php echo $row['ROLE'] ?></td>
                        <td><?php echo $row['MAIL'] ?></td>


                    </tr>
                <?php
                endforeach;
                } ?>
            </table>
        </div>


    </div>
</div>