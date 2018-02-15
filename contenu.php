<?php
if (!EMPTY($_POST['tache']) AND isset($_POST['tache'])) {


	$todo = file_get_contents('todo.json'); //On récupère le fichier json
	$decodeTodo = json_decode($todo, true); //On le convertit en array PHP
	
	}
?>
<?php include ('formulaire.php') ?>

<?php 
	if (isset($_POST['checkDO'])) {

		$todoArchive = file_get_contents('todo.json'); //On récupère le fichier json
		$decodeTodo = json_decode($todoArchive, true); //On le convertit en array PHP

		var_dump($decodeTodo);

		// $decodeTodoArchive['archive'][] = htmlspecialchars($_POST['checkDo']);

		// $newArchive = json_encode($decodeTodoArchive, JSON_FORCE_OBJECT); //On convertit l'array en objet json

		// file_put_contents('todo.json', $newArchive);
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
		<input type="checkbox" name="checkDo" id="checkDo"> 
		<label for="checkDo"><?php echo $value . "<br>";

		}
	?>	</label>

	<!-- Si la case a été cochée, alors$_POST['case'] aura pour valeur « on ».

    Si elle n'a pas été cochée, alors$_POST['case']n'existera pas. Vous pouvez faire un test avecisset($_POST['case'])pour vérifier si la case a été cochée ou non. -->
	
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
</html>