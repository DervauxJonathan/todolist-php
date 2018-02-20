<?php
	include ('formulaire.php');

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

		unset($decodeTodo['archives']); // on supprime l'array "archives"
		$decodeTodo['archives'] = []; //on recrée aussitôt l'array "archives" vide, sinon erreur de variable non définie

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
		<ul id="ulaFaire">
			<?php foreach ($decodeTodo['aFaire'] as $iaFaire => $valueaFaire){ // on itère dans l'array dans la partie 'aFaire'
			?>
				<li>
					<input type="checkbox" name="checkDo[]" class="checkDo" value="<?php echo $valueaFaire ?>">
					<label for="checkDo" class="checkDoLabel">
						<?php echo $valueaFaire ?>	
					</label>
				</li>			
			<?php } ?>
		</ul>
	</form>

	<h2>Archives</h2>
	<form action="" method="post" id="archives">
		<ul>
			<?php foreach ($decodeTodo['archives'] as $iArchives => $valueArchives) {  ?>
				<li>
					<input type="checkbox" name="checkArchives" class="checkArchives" value="<?php echo $valueArchives ?>" checked>
					<label for="checkArchives" class="checkArchives">
						<?php echo $valueArchives ?>
					</label>			
				</li>
			<?php } ?>
		</ul>
		<input type="submit" name="Effacer" value="Effacer les Archives" class="red">		
	</form>

	<h2>Ajouter une tâche</h2>
	<form action="index.php" method="post" >
		<input type="text" name="tache" placeholder="Écrivez une tâche">
		<input type="submit" value="ajouter">
	</form>

</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script type="text/javascript" src="script.js">
		

	</script>

</html>

