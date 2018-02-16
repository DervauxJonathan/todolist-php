<?php

// session_start ();
	// $todo = file_get_contents('todo.json'); //Appel du fichier .json
	// $decodeTodo = json_decode($todo, true); //On convertit le json en array PHP
	
	// $decodeTodo['aFaire'][];

	// $newTodo = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json
	// file_put_contents('todo.json', $newTodo); //On envoie l'array dans json

	if(!EMPTY($_POST['tache']) AND isset($_POST['tache'])){

		$todo = file_get_contents('todo.json'); //Appel du fichier .json
		$decodeTodo = json_decode($todo, true); //On convertit le json en array PHP

		$decodeTodo['aFaire'][] = htmlspecialchars($_POST['tache']);
		 //On met la valeur de l'input dans l'array de la clé "aFaire" (si ce dernier n'existe pas, il est créé)S
		
		$newTodo = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json

		file_put_contents('todo.json', $newTodo); //On envoie l'array dans json

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


	




