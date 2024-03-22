<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<h1 style="text-align: center;">Modifier/Ajouter un Produit</h1>

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
            <label for="prix">Prix:</label>
            <input type="number" class="form-control form-control-" name="prix" id="prix" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="prestataire">Prestataire:</label>
            <select class="form-control form-control-" name="prestataire" id="prestataire" required>
                <?php
                global $wpdb;
                $prestataires = $wpdb->get_results("SELECT Id_prestataire, nom FROM wp_prestataire");
                foreach ($prestataires as $prestataire) {
                    echo '<option value="' . $prestataire->Id_prestataire . '">' . $prestataire->nom . '</option>';
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'produit';
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $prestataire = $_POST['prestataire'];

    $wpdb->insert(
        $table_name,
        array(
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'Id_prestataire' => $prestataire
        )
    );
}
?>

<br>

<h1>Liste des Produits</h1>

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'produit';
$produit = $wpdb->get_results("SELECT * FROM $table_name");

?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">IDPrestataire</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($produit as $row) { ?>
            <tr>
                <td><?php echo $row->id_produit; ?></td>
                <td><?php echo $row->nom; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><?php echo $row->prix; ?></td>
                <td><?php echo $row->Id_prestataire; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id_produit" value="<?php echo $row->id_produit; ?>">
                        <button type="submit" name="delete_produit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row->id_produit; ?>">
                        Modifier
                    </button>                
                    </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row->id_produit; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_produit" value="<?php echo $row->id_produit; ?>">
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control form-control-" name="nom" id="nom" value="<?php echo $row->nom; ?>" required>                            
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control form-control" name="description" id="description" value="<?php echo $row->description; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix:</label>
                            <input type="number" class="form-control form-control-" name="prix" id="prix" value="<?php echo $row->prix; ?>" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="prestataire">Prestataire:</label>
                            <select class="form-control form-control-" name="prestataire" id="prestataire" required>
                                <?php
                                global $wpdb;
                                $prestataires = $wpdb->get_results("SELECT Id_prestataire, nom FROM wp_prestataire");
                                foreach ($prestataires as $prestataire) {
                                    echo '<option value="' . $prestataire->Id_prestataire . '">' . $prestataire->nom . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_produit">Modifier</button>
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
if (isset($_POST['delete_produit'])) {
    $id_produit = $_POST['id_produit'];

    $wpdb->delete(
        $table_name,
        array('id_produit' => $id_produit)
    );

}
?>


<?php
if (isset ($_POST['update_produit'])) {
    $id_produit = $_POST['id_produit'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $prestataire = $_POST['prestataire'];

    $wpdb->update(
        $table_name,
        array(
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'Id_prestataire' => $prestataire
        ),
        array('id_produit' => $id_produit)
    );
}