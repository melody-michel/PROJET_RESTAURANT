<div class="container-fluid principal">

    <div class="row justify-content-center">
        <div class="col-8 col-md-6 col-lg-5 col-xl-4">
            <h2>Connexion</h2>
        </div>
    </div>

    <div class="form-row justify-content-center">
        <div class="col-8 col-md-6 col-lg-5 col-xl-4 ">
            <form action="" method="post">

                <input type="text" class="form-control" id="login" name="login" placeholder="LOGIN" value="<?php echo set_value('login'); ?>"/>
                <div class="error"> <?php echo form_error('login'); ?></div>

                <input type="text" class="form-control mt-4" id="mdp" name="mdp" placeholder="Mot de passe"/>
                <div class="error"><?php echo form_error('mdp'); ?></div>

                <input class="btn btn-block mt-4" type="submit" value="Valider"/>

            </form>
            <div class="error mt-4" style="overflow: auto"><?php
                if (isset($authentification)) {echo $authentification;} ?></div>
        </div>
    </div>

</div>