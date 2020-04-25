<div class="principal container-fluid">

    <div class="row justify-content-center mt-5">

        <div class="col-5">

            <form action="" method="post">

                <div><h3><?php echo $titreFormulaire; ?></h3></div>

                <div class="form-group">
                    <label for="nomEquipement">Nom de l'équipement</label>
                    <input type="text" class="form-control" name="nomEquipement" id="nomEquipement"
                           value="<?php if (isset($query)) {
                               echo set_value('nomEquipement', $query->DESIGNATION);
                           } else {
                               set_value('nomEquipement');
                           } ?>"/>
                    <div class="error"><?php echo form_error('nomEquipement'); ?></div>
                </div>

                <div class="form-group">
                    <label for="plageTemp">Températures attendues</label>

                    <div class="form-row" id="plageTemp">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Minimum</span></div>
                                <input type="text" class="form-control" name="tempMini"
                                       value="<?php if (isset($query)) {
                                           echo set_value('tempMini', $query->MINI);
                                       } else {
                                           set_value('tempMini');
                                       } ?>">
                            </div>
                            <div class="error w-100"> <?php echo form_error('tempMini'); ?></div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Maximum</span></div>
                                <input type="text" class="form-control" name="tempMaxi"
                                       value="<?php if (isset($query)) {
                                           echo set_value('tempMaxi', $query->MAXI);
                                       } else {
                                           set_value('tempMAXI');
                                       } ?>">
                            </div>
                            <div class="error w-100"> <?php echo form_error('tempMaxi'); ?></div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="commEquipement">Commentaire</label>
                    <div class="input-group" id="commEquipement">
                        <textarea type="textarea" class="form-control" id="commEquipement" name="commEquipement"
                                  rows="5"><?php if (isset($query)) {
                                echo set_value('commEquipement', $query->COMMENTAIRE);
                            } else {
                                set_value('commEquipement');
                            } ?></textarea>
                    </div>
                    <div class="error"> <?php echo form_error('commEquipement'); ?></div>
                </div>


                <input class="btn btn-block mt-4" type="submit" value="Valider"/>

            </form>
        </div>

    </div>

</div>