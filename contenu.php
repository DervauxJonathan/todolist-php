<?php 
	include ('formulaire.php');
	if (!EMPTY($_POST['tache']) AND isset($_POST['tache'])) {


		$todo = file_get_contents('todo.json'); //On récupère le fichier json
		$decodeTodo = json_decode($todo, true); //On le convertit en array PHP
		
	};


	if (isset($_POST['checkDo'])) {

		$todoCheck = file_get_contents('todo.json'); //On récupère le fichier json
		$decodeTodoCheck = json_decode($todoCheck, true); //On le convertit en array PHP

		var_dump($decodeTodoCheck);

		$checkDo = $_POST['checkDo'];

	
		$decodeTodoCheck['archives'] = $checkDo;
		//On met la valeur de la checkbox dans l'array de la clé "archives" (si ce dernier n'existe pas, il est créé)

		$newArchive = json_encode($decodeTodoCheck, JSON_PRETTY_PRINT); //On encode l'array json

		file_put_contents('todo.json', $newArchive); //On envoie l'array dans json
	} 
?>
array_diff


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	

	<h2>A Faire</h2>
	<form action="" method="post">
		
	<?php foreach ($decodeTodo['aFaire'] as $key => $value){ // on itère dans l'array dans la partie 'aFaire'
	?>
		<input type="checkbox" name="checkDo[]" id="checkDo" value="<?php echo $value ?>"> <!-- !!!Renvoi la dernière checkbox cochée -->
		<label for="checkDo">
		<?php echo $value . "<br>";

		}
	?>	</label>

	<!-- Si la case a été cochée, alors$_POST['case'] aura pour valeur « on ».

    Si elle n'a pas été cochée, alors$_POST['case']n'existera pas. Vous pouvez faire un test avec isset($_POST['case'])pour vérifier si la case a été cochée ou non. -->
	
		<input type="submit" value="Enregistrer" name="enregistrer">
	</form>

	<h2>Archive</h2>
	<form action="" method="post">
		<input type="checkbox" name="checkbox">
		
	</form>

	<h2>Ajouter une tâche</h2>
	<form action="" method="post" >
		<input type="text" name="tache">
		<input type="submit" value="ajouter">
	</form>




</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</html>

