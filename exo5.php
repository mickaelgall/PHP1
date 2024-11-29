<!DOCTYPE html>

<html lang="fr">

<head>

  <title>exo5</title>

  <meta charset="utf-8">

<!-- charset=UTF-8 : pour que les caractères accentués ressortent correctement -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- la balise ci-dessus indique que l'affichage doit se faire sur la totalité de l'écran, par défaut voir Responsive Design -->

</head>

<body>
  <form action="" method="post">
      Nom : <input type="text" name="txtNom"><br>
      Prénom : <input type="text" name="txtPrenom"><br>
      Adresse : <input type="text" name="txtAdresse"><br>
      <input type="submit" name="btnEnvoyer" value="Envoyer" >
      </form>'
  <?php

if(isset($_POST['btnEnvoyer'])) {
require_once('connexion.php');
$stmt = $connexion->prepare("INSERT INTO exo5 (nom, prenom, adresse ) VALUES (:nom, :prenom, :adresse)");

$nom = $_POST['txtNom'];
$prenom = $_POST['txtPrenom'];
$adresse = $_POST['txtAdresse'];

$stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
$stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);

$stmt->execute();
echo 'Ajouté avec succès';


$nb_ligne_affectees = $stmt->rowCount();
echo $nb_ligne_affectees." ligne() insérée(s).<BR>";

$dernier_numero = $connexion->lastInsertId();
echo "Dernier numéro utilisateur généré : ".$dernier_numero."<BR>";

}

?>

</body>

</html>  