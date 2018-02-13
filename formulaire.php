<h2>Ajouter une tâche</h2>
<form action="todo.json" method="post" >
	<input type="text" name="tache">
	<input type="submit" value="ajouter">
</form>


<?php
	if(isset($_POST['tache'])){
		$tache = $_POST['tache'];
		$todo = 'todo.json';

		file_put_contents($todo , $tache, FILE_APPEND);

	}

?>
