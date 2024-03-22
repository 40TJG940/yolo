<!DOCTYPE html>
<html>
<head>
    <title>Gestion d'Infrastructures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Gérer les horaires des Infrastructures</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="heure_ouverture">Heure d'ouverture:</label>
                <input type="time" class="form-control" name="heure_ouverture" id="heure_ouverture" required>
            </div>

            <div class="form-group">
                <label for="heure_fermeture">Heure de fermeture:</label>
                <input type="time" class="form-control" name="heure_fermeture" id="heure_fermeture" required>
            </div>

            <button type="submit" class="btn btn-primary" name="update">Modifier</button>
        </form>
    </div>

    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'horaire_infrastructure';
    $results = $wpdb->get_results("SELECT heure_ouverture, heure_fermeture FROM $table_name WHERE Id_horaire_infrastructure = 1");

    if ($results) {
        echo '<table class="table">';
        echo '<thead><tr><th>Heure d\'ouverture</th><th>Heure de fermeture</th></tr></thead>';
        echo '<tbody>';
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . $row->heure_ouverture . '</td>';
            echo '<td>' . $row->heure_fermeture . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'Aucun résultat trouvé.';
    }
    ?>
    
</body>
</html>
<?php
if (isset($_POST['update'])) {

    $heureOuverture = $_POST['heure_ouverture'];
    $heureFermeture = $_POST['heure_fermeture'];

    global $wpdb;
    $table_name = $wpdb->prefix . 'horaire_infrastructure';
    $wpdb->update(
        $table_name,
        array(
            'heure_ouverture' => $heureOuverture,
            'heure_fermeture' => $heureFermeture
        ),
        array('Id_horaire_infrastructure' => 1)
    );

    echo "Heure modifiée avec succès.";
}
?>

