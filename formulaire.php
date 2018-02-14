<?php
	if(!EMPTY($_POST['tache']) AND isset($_POST['tache'])){

		$todo = file_get_contents('todo.json'); //Appel du fichier .json
		$decodeTodo = json_decode($todo, true); //On convertit le json en array PHP

		// var_dump($decodeTodo);

		$decodeTodo['aFaire'][] = htmlspecialchars($_POST['tache']); //On met la valeur de l'input dans l'array de l'array "aFaire" (si ce dernier n'existe pas, il est créé)
		
		$newTodo = json_encode($decodeTodo, JSON_FORCE_OBJECT); //On convertit l'array en objet json

		file_put_contents('todo.json', $newTodo); //On injecte l'objet dans json

	}
?>


<?php
//Si l'input nouvelle tâche existe et n'est pas vide
// if (ISSET($_POST["tache"]) && !EMPTY($_POST["tache"]))
// {
// // Import les données du fichier
// $file = file_get_contents('todo.json');
// // Si le fichier est vide, créer un objet vide $taches et un tableau vide $aFaire
// if (EMPTY($file))
// {
// $taches = new stdClass();
// $aFaire = array();
// }
// // Sinon, traduction du fichier en objet php dans la variable $taches et copie du tableau de l'objet dans $aFaire
// else
// {
// $taches = json_decode($file);
// $aFaire = $taches->aFaire;
// }
// // Copie de l'input nouvelle tâche
// $newTache = $_POST["tache"];
// // Nettoyage du fichier pour éviter les injections de base
// $newTache = htmlspecialchars($newTache);
// // Ajout de la nouvelle tâche dans le tableau
// $aFaireLength = count($aFaire);
// $aFaire[$aFaireLength] = $newTache;
// // Ecraser l'ancienne la propriété tableau aFaire avec le tableau $aFaire mis à jour
// $taches->aFaire = $aFaire;
// // Traduction au format Json
// $taches = json_encode($taches);
// // Ecraser le fichier avec les nouvelles données
// file_put_contents('todo.json', $taches);
// // AMEN
// }
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<h2>Ajouter une tâche</h2>
	<form action="" method="post" >
		<input type="text" name="tache">
		<input type="submit" value="ajouter">
	</form>

</body>
</html> -->


