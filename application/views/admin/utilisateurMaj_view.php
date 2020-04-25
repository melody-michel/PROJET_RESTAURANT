<div class="principal container-fluid">

    <div class="row justify-content-center mt-5">

        <div class="col-5">

            <form action="" method="post">

                <div><h3><?php echo $titreFormulaire; ?></h3></div>

                <div class="form-group">
                    <label for="nomUtilisateur">Nom</label>
                    <input type="text" class="form-control" name="nomUtilisateur" id="nomUtilisateur"
                           value="<?php if (isset($query)) {
                               echo set_value('nomUtilisateur', $query->NOM);
                           } else {
                               set_value('nomUtilisateur');
                           } ?>"/>
                    <div class="error"><?php echo form_error('nomUtilisateur'); ?></div>
                </div>

                <div class="form-group">
                    <label for="prenomUtilisateur">Prénom</label>
                    <input type="text" class="form-control" name="prenomUtilisateur" id="prenomUtilisateur"
                           value="<?php if (isset($query)) {
                               echo set_value('prenomUtilisateur', $query->PRENOM);
                           } else {
                               set_value('prenomUtilisateur');
                           } ?>"/>
                    <div class="error"><?php echo form_error('prenomUtilisateur'); ?></div>
                </div>

                <div class="form-group">
                    <label for="roleUtilisateur">Rôle</label>

                    <div class="form-row" id="roleUtilisateur">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="roleUtilisateur"
                                               value="utilisateur" <?php if (!isset($query) || $query->ROLE == 'utilisateur') {
                                            echo 'checked = "checked"';
                                        } ?>>
                                    </div>
                                </div>
                                <input type="text" class="form-control label-radio" disabled value="Utilisateur">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="roleUtilisateur"
                                               value="administrateur" <?php if (isset($query) && $query->ROLE == 'administrateur') {
                                            echo 'checked = "checked"';
                                        } ?>>
                                    </div>
                                </div>
                                <input type="text" class="form-control label-radio" disabled value="Administrateur">
                            </div>

                        </div>

                    </div>

                </div>


                <div class="form-group">
                    <label for="mailUtilisateur">Email</label>
                    <input type="text" class="form-control" name="mailUtilisateur" id="mailUtilisateur"
                           value="<?php if (isset($query)) {
                               echo set_value('mailUtilisateur', $query->MAIL);
                           } else {
                               set_value('mailUtilisateur');
                           } ?>"/>
                    <div class="error"><?php echo form_error('mailUtilisateur'); ?></div>
                </div>

                <input class="btn btn-block mt-4" type="submit" value="Valider"/>


            </form>

        </div>

    </div>

</div>