<h2>Ajouter une tâche</h2>
<form action="formulaire.php" method="post" >
	<input type="text" name="tache">
	<input type="submit" value="ajouter">
</form>


<?php
		$afaire = array();
		$archives = array();

	if(isset($_POST['tache'])){


		array_push($afaire, $_POST['tache'] );
		print_r($afaire);
		$todo = json_encode($afaire);

		// $tache = $_POST['tache'];
		// $todo = 'todo.json';

		// file_put_contents($todo , $tache, FILE_APPEND);

	}

?>
