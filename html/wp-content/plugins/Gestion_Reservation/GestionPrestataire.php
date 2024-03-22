<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php

if (isset($_POST['submit'])) {
    
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $heure_debut_reservation = $_POST['heure_debut_reservation'];
    $heure_fin_reservation = $_POST['heure_fin_reservation'];
    $telephone = $_POST['telephone'];

    
    global $wpdb;
    $table_name = $wpdb->prefix . 'prestataire';
    $wpdb->insert(
        $table_name,
        array(
            'nom' => $nom,
            'description' => $description,
            'heure_debut_reservation' => $heure_debut_reservation,
            'heure_fin_reservation' => $heure_fin_reservation,
            'telephone' => $telephone
        )
    );

}

?>

<h1 style="text-align: center;">Modifier/Ajouter un Prestataire</h1>

<div style="display: flex; justify-content: center;">
    <form method="POST" action="" style="width: 50%;">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control form-control-" name="nom" id="nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control form-control" name="description" id="description" required>
        </div>

        <div class="form-group">
            <label for="heure_debut_reservation">Heure de début de réservation:</label>
            <input type="time" class="form-control form-control-" name="heure_debut_reservation" id="heure_debut_reservation" required>
        </div>

        <div class="form-group">
            <label for="heure_fin_reservation">Heure de fin de réservation:</label>
            <input type="time" class="form-control form-control-" name="heure_fin_reservation" id="heure_fin_reservation" required>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de telephone:</label>
            <input type="number" class="form-control form-control-" name="telephone" id="telephone" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
    </form>
</div>

<br>

<h1>Liste des Prestataires</h1>
<?php
global $wpdb;
$table_name = $wpdb->prefix . 'prestataire';
$prestataire = $wpdb->get_results("SELECT * FROM $table_name");

?>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>téléphone</th>
            <th>Heure de début de réservation</th>
            <th>Heure de fin de réservation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prestataire as $row) { ?>
            <tr>
                <td><?php echo $row->Id_prestataire; ?></td>
                <td><?php echo $row->nom; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><?php echo $row->telephone; ?></td>
                <td><?php echo $row->heure_debut_reservation; ?></td>
                <td><?php echo $row->heure_fin_reservation; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="prestataire_id" value="<?php echo $row->Id_prestataire; ?>">
                        <button type="submit" name="delete_prestataire" class="btn btn-danger">Supprimer</button>
                    </form>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row->Id_prestataire; ?>">
                        Modifier
                    </button>                
                    </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row->Id_prestataire; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier Prestataire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <input type="hidden" name="prestataire_id" value="<?php echo $row->Id_prestataire; ?>">
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $row->nom; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" name="description" id="description" value="<?php echo $row->description; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="heure_debut_reservation">Heure de début de réservation:</label>
                                    <input type="time" class="form-control" name="heure_debut_reservation" id="heure_debut_reservation" value="<?php echo $row->heure_debut_reservation; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="heure_fin_reservation">Heure de fin de réservation:</label>
                                    <input type="time" class="form-control" name="heure_fin_reservation" id="heure_fin_reservation" value="<?php echo $row->heure_fin_reservation; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Numéro de téléphone:</label>
                                    <input type="number" class="form-control" name="telephone" id="telephone" value="<?php echo $row->telephone; ?>" required>
                                </div>

                                <button type="submit" class="btn btn-primary" name="update_prestataire">Modifier</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
        <?php } ?>
    </tbody>
</table>

<?php
if (isset($_POST['delete_prestataire'])) {
    $prestataire_id = $_POST['prestataire_id'];

    $wpdb->delete(
        $table_name,
        array('Id_prestataire' => $prestataire_id)
    );

}
?>

<?php
if (isset($_POST['update_prestataire'])) {
    $prestataire_id = $_POST['prestataire_id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $heure_debut_reservation = $_POST['heure_debut_reservation'];
    $heure_fin_reservation = $_POST['heure_fin_reservation'];
    $telephone = $_POST['telephone'];

    $wpdb->update(
        $table_name,
        array(
            'nom' => $nom,
            'description' => $description,
            'heure_debut_reservation' => $heure_debut_reservation,
            'heure_fin_reservation' => $heure_fin_reservation,
            'telephone' => $telephone
        ),
        array('Id_prestataire' => $prestataire_id)
    );
}
?>
