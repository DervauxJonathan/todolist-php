<?php

 	$decodeTodo['aFaire'] = [];

	if(!EMPTY($_POST['tache']) AND isset($_POST['tache'])){

		$todo = file_get_contents('todo.json'); //Appel du fichier .json
		$decodeTodo = json_decode($todo, true); //On convertit le json en array PHP

		$decodeTodo['aFaire'][] = htmlspecialchars($_POST['tache']);
		 //On met la valeur de l'input dans l'array de la clé "aFaire"
		
		$newTodo = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json

		file_put_contents('todo.json', $newTodo); //On envoie l'array dans json
	}
?>


	




