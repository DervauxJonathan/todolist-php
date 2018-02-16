<?php 
	include ('formulaire.php');

	if (isset($_POST['checkDo'])) {
		$checkDo = $_POST['checkDo'];

		//On récupère les valeurs des checkbox cochées en appuyant sur "Enregistrer".
 		//Ces valeurs sont disposées dans un array.
 		//Il faut itérer dans cet array pour isoler chaque valeur, sinon, à chaque clic sur "Enregistrer, on enverra l'array en bloc.
 		//Ainsi, on pourra injecter ces valeurs une à une dans l'array "archives".
 		//Donc, il faut chaque fois ouvrir le .json, isoler une checkbox, et l'injecter dans .json.

		foreach ($checkDo as $index => $valueCheckDo) {
			$todoCheck = file_get_contents('todo.json'); //On récupère le fichier json
			$decodeTodo = json_decode($todoCheck, true); //On le convertit en array PHP


		if(isset($decodeTodo['archives']) AND !EMPTY($decodeTodo['archives'])){  //si "archives" dans le .json et qu'il n'est pas vide
			
			array_push($decodeTodo['archives'], $checkDo[$index]); //on push chaque valeur des checkbox dans l'array "archives".

		} else {

			$decodeTodo['archives'][] = $checkDo[$index]; //Sinon, on crée l'array archive et on push chaque valeur des checkbox

		}
		
		$newArchive = json_encode($decodeTodo, JSON_PRETTY_PRINT); //On encode l'array json

		file_put_contents('todo.json', $newArchive); //On envoie l'array dans json
		}
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

