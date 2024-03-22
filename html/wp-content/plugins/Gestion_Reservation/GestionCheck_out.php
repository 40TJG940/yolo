<!DOCTYPE html>
<html>
<head>
    <title>Gestion des réservations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align: center;">parametre Etat des lieux</h1>

    <?php
    global $wpdb;

    // Récupérer la valeur actuelle de nbreceptionniste
    $parametre_etat_des_lieux = $wpdb->get_row("SELECT * FROM wp_parametre_etat_des_lieux WHERE Id_parametre_etat_des_lieux = 1");
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['update'])) {
        // Récupérer la nouvelle valeur de nbreceptionniste depuis le formulaire
        $new_nbreceptionniste = $_POST['nbreceptionniste'];
        $debut_horaire = $_POST['debut_horaire'];
        $fin_horaire = $_POST['fin_horaire'];

        // Mettre à jour la valeur de nbreceptionniste dans la base de données
        $wpdb->update(
            'wp_parametre_etat_des_lieux',
            array('nbreceptionniste' => $new_nbreceptionniste,
            'debut_horaire' => $debut_horaire,
            'fin_horaire' => $fin_horaire),
            array('Id_parametre_etat_des_lieux' => 1)

        );

        // Afficher un message de succès
        echo '<div class="alert alert-success" role="alert">Le nombre de réceptionnistes a été modifié avec succès.</div>';
    }
    ?>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="param-tab" data-toggle="tab" href="#param" role="tab" aria-controls="param" aria-selected="true">Paramètres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">reservation check_out</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="param" role="tabpanel" aria-labelledby="param-tab">
                <form method="POST">
                    <div class="form-group">
                        <label for="nbreceptionniste">Nombre de réceptionnistes :</label>
                        <input type="number" class="form-control" id="nbreceptionniste" name="nbreceptionniste" value="<?php echo $parametre_etat_des_lieux->nbreceptionniste; ?>">
                    </div>
                    <div class="form-group">
                        <label for="debut_horaire">Heure de début :</label>
                        <input type="time" class="form-control" id="debut_horaire" name="debut_horaire" value="<?php echo $parametre_etat_des_lieux->debut_horaire; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fin_horaire">Heure de fin :</label>
                        <input type="time" class="form-control" id="fin_horaire" name="fin_horaire" value="<?php echo $parametre_etat_des_lieux->fin_horaire; ?>">
                    </div>
                    
                    <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <form>
            <div class="form-group">
                <label for="numero_maison">Numéro de maison :</label>
                <input type="text" class="form-control" id="numero_maison" name="numero_maison">
            </div>
            <div class="form-group">
                <label for="numero_telephone">Numéro de téléphone :</label>
                <input type="text" class="form-control" id="numero_telephone" name="numero_telephone">
            </div>
            <div class="form-group">
                <label for="Nom">Nom : </label>
                <input type="text" class="form-control" id="Nom" name="Nom">
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

        <?php
        global $wpdb;
        $Creneaux_horaire = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}Creneaux_horaire ");
        ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">debut etat des lieux</th>
                    <th scope="col">fin etat des lieux</th>
                    <th scope="col">Quantité</th>   
                    <th scope="col">choisir</th>             
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Creneaux_horaire as $row) { ?>
                    <tr>
                        <td><?php echo $row->Id_Créneaux_horaire; ?></td>
                        <td><?php echo $row->debut_creneaux_horaire; ?></td>
                        <td><?php echo $row->fin_creneau_horaire; ?></td>
                        <td><?php echo $row->quantite; ?></td>
                        <td>
                            <div>
                            <input type="checkbox" class="form-check-input" name="choix" id="choix" required>
                            </div> 
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>

            </div>
        </div>
    </body>
    </html>
