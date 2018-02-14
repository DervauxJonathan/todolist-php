<?php
if (!EMPTY($_POST['tache']) AND isset($_POST['tache'])) {


	$todo = file_get_contents('todo.json'); //On récupère le fichier json
	$decodeTodo = json_decode($todo, true); //On le convertit en array PHP
	
	}
?>
<?php include ('formulaire.php') ?>
array_diff


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

	<h2>A Faire</h2>
	<form action="contenu.php" method="post">
		
	<?php foreach ($decodeTodo['aFaire'] as $key => $value){ // on itère dans l'array dans la partie 'aFaire'
	?>
		<input type="checkbox" name="checkbox"> <?php echo $value . "<br>";

		}
	?>
	
		<input type="submit" value="Enregistrer">
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