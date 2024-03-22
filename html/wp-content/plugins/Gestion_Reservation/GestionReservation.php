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
    <h1 style="text-align: center;">Faire une commande de grillade/pizza</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#infos">Informations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#produits">Liste des Produits</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="infos" class="tab-pane fade show active">
            <div style="display: flex; justify-content: center;">
                <form method="POST" action="" style="width: 50%;">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control form-control-" name="nom" id="nom" required>
                    </div>

                    <div class="form-group">
                        <label for="id_maison">Numéro de maison:</label>
                        <input type="text" class="form-control form-control" name="id_maison" id="id_maison" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Numéro de téléphone:</label>
                        <input type="number" class="form-control form-control-" name="telephone" id="telephone" required>
                    </div>
                </form>
            </div>
        </div>

        <div id="produits" class="tab-pane fade">
            <?php
            global $wpdb;
            $produit = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}produit WHERE Id_prestataire = 11");
            ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">ID Prestataire</th>
                        <th scope="col">Quantité</th>
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
                                <div>
                                   <input type="number" class="form-control form-control-" name="quantite" id="quantite" required>
                                </div> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
