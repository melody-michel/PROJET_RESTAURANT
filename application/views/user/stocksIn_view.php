<div class="principal container-fluid">

    <?php if (isset($query)) { ?>

        <div class="row">
            <div class="col offset-2">
                <h2>
                    Gestion des stocks
                    <a href="#"><span class="fas fa-plus fa-xs" title="Ajouter des produits"></span></a>
                </h2>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-7">
                <form>
                    <table class="w-100">
                        <?php foreach ($query as $row): ?>
                            <tr>
                                <td><?php echo $row['DESIGNATION'] ?></td>
                                <td><?php echo $row['DLC_heures'] ?></td>
                                <td style="width:17%">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><button class="btn" type="button">-</button></div>
                                        <input type="text" class="form-control text-center" placeholder="0" maxlength="3"/>
                                        <div class="input-group-append"><button class="btn" type="button">+</button></div>
                                    </div>
                                </td>
                                <td><a href="stock/in/<?php echo $row['Id'] ?>">Ajouter</a></td>


                            </tr>

                        <?php
                        endforeach; ?>

                    </table>
                </form>
            </div>
        </div>
    <?php } ?>


    <?php
    $date = date_create('2000-01-01');
    date_add($date, date_interval_create_from_date_string('10 days'));
    echo date_format($date, 'Y-m-d');
    ?>

</div>