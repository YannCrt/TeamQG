<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Gérer les utilisateurs</h2>
        <table class="table utilisateurs">
            <thead>
                <tr>
                    <th class="table-header">Prénom</th>
                    <th class="table-header">Nom</th>
                    <th class="table-header">Pseudo</th>
                    <th class="table-header">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><?php echo htmlspecialchars($utilisateur['prenom']); ?></td>
                        <td class="table-cell"><?php echo htmlspecialchars($utilisateur['nom']); ?></td>
                        <td class="table-cell"><?php echo htmlspecialchars($utilisateur['pseudo']); ?></td>
                        <td class="table-cell">
                            <form class="action-form" action="./controller/gererUtilisateurs.php" method="post">
                                <input type="hidden" name="id_utilisateur" value="<?php echo $utilisateur['id']; ?>">
                                
                                <!-- Bouton pour supprimer l'utilisateur -->
                                <button type="submit" class="btn btn-delete" name="action" value="supprimer">Supprimer</button>
                                
                                <!-- Bouton pour ajouter en tant qu'administrateur -->
                                <?php if (!$utilisateur['est_admin']) { ?>
                                    <button type="submit" class="btn btn-add-admin" name="action" value="ajouter_admin">Ajouter admin</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-demote" name="action" value="retrograder">Rétrograder</button>
                                <?php } ?>

</button>

                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
