<div class="principal container-fluid">

    <div class="row mt-3 justify-content-center">
        <?php foreach ($query as $row): ?>

            <div class="col-3 p-3 m-3 border shadow">
                <h3 class="text-center pb-2"><?php echo $row['DESIGNATION'] ?></h3>
                <p>Plage de température :
                    <?php echo $row['MINI'] . "°C à " . $row['MAXI'] . "°C" ?></p>
                <p>Commentaire : <?php echo $row['COMMENTAIRE'] ?></p>
                <div class="icones-equipement">

                    <a href="equipement/<?php echo $row['Id'] ?>"><span class="fas fa-edit"></span></a>
                    <a href="equipement/desactiver/<?php echo $row['Id'] ?>"><span class="fas fa-times"></span></a>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="col-3 p-3 m-3 border shadow d-flex align-items-center">
            <a class="text-center w-100" href="equipement/new"><h4>Ajouter<br/>un équipement</h4></a>
        </div>

    </div>

</div>