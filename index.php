<?php
	include ('formulaire.php');

	$decodeTodo['archives'][] = "";

	if (isset($_POST['checkDo'])) {
		$checkDo = $_POST['checkDo'];

		//On récupère les valeurs des checkbox cochées en appuyant sur "Enregistrer".
 		//Ces valeurs sont disposées dans un array.
 		//Il faut itérer dans cet array pour isoler chaque valeur, sinon, à chaque clic sur "Enregistrer, on enverra l'array en bloc.
 		//Ainsi, on pourra injecter ces valeurs une à une dans l'array "archives".

 		$todoCheck = file_get_contents('todo.json'); //On récupère le fichier json
		$decodeTodo = json_decode($todoCheck, true); //On le convertit en array PHP

		foreach ($checkDo as $index => $valueCheckDo) {
	
			if(isset($decodeTodo['archives']) AND !EMPTY($decodeTodo['archives'])){  //si "archives" dans le .json et qu'il n'est pas vide
				array_push($decodeTodo['archives'], $checkDo[$index]); //on push chaque valeur des checkbox dans l'array "archives".

				} else {

				$decodeTodo['archives'][] = $checkDo[$index]; //Sinon, on crée l'array archive et on push chaque valeur des checkbox
				}
		}

		//On compare les 2 arrays et on remplace "aFaire" avec la différence.
		$newaFaire = array_diff($decodeTodo['aFaire'], $decodeTodo['archives']);
		$decodeTodo['aFaire'] = $newaFaire;

		$newTodo = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json
		file_put_contents('todo.json', $newTodo); //On envoie l'array dans json
	}


	if (isset($_POST['checkArchives'])) { 
		$todoCheck = file_get_contents('todo.json'); //On récupère le fichier json
		$decodeTodo = json_decode($todoCheck, true); //On le convertit en array PHP

		unset($decodeTodo['archives']);
		$decodeTodo['archives'] = [];

		$newTodo = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json
		file_put_contents('todo.json', $newTodo); //On envoie l'array dans json

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ToDoList</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>

	<h1>ToDo List</h1>

	<h2>A Faire</h2>
	<form action="" method="post" id="aFaire">
		
	<?php foreach ($decodeTodo['aFaire'] as $iaFaire => $valueaFaire){ // on itère dans l'array dans la partie 'aFaire'
	?>
		<input type="checkbox" name="checkDo[]" class="checkDo" id="<?php echo $iaFaire ?>" value="<?php echo $valueaFaire ?>">
		<label for="checkDo" class="checkDoLabel">
			<?php echo $valueaFaire ?>	
		</label>
		<br>
			<?php } ?>
	
	</form>

	<h2>Archives</h2>
	<form action="" method="post" id="archives">
	<?php foreach ($decodeTodo['archives'] as $iArchives => $valueArchives) {  ?>
		<input type="checkbox" name="checkArchives" class="checkArchives" value="<?php echo $valueArchives ?>" checked>
		<label for="checkArchives" class="checkArchives">
			<?php echo $valueArchives ?>
		</label>
		<br>
			<?php } ?>
		<input type="submit" name="Effacer" value="Effacer les Archives" class="red">
	</form>

	<h2>Ajouter une tâche</h2>
	<form action="index.php" method="post" >
		<input type="text" name="tache" placeholder="Écrivez une tâche">
		<input type="submit" value="ajouter">
	</form>

</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script type="text/javascript" src="script.js"></script>

</html>

