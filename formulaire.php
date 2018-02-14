<?php
	// if(isset($_POST['tache'])){

	// 	$todo = file_get_contents('todo.json');

	// 	$todo = json_decode($todo);

		// if(empty($todo)){
		// 	$todo = array();
		// } 

		// $i = count($todo); // count() = au .length de JS
		// $todo[$i] = $_POST['tache'];
		// var_dump($todo);

		// $todo["afaire"][] = $_POST['tache'];

		
		
		// $todo = json_encode($todo, JSON_FORCE_OBJECT);

		// file_put_contents('todo.json', $todo);

		

		
		// for ($i=0; $i < count($todo); $i++) { 
		// 	# code...
		// }

		// file_put_contents($todolist, $afaire, FILE_APPEND | LOCK_EX);

	// }

?>


<?php
//Si l'input nouvelle tâche existe et n'est pas vide
if (ISSET($_POST["tache"]) && !EMPTY($_POST["tache"]))
{
// Import les données du fichier
$file = file_get_contents('todo.json');
// Si le fichier est vide, créer un objet vide $taches et un tableau vide $aFaire
if (EMPTY($file))
{
$taches = new stdClass();
$aFaire = array();
}
// Sinon, traduction du fichier en objet php dans la variable $taches et copie du tableau de l'objet dans $aFaire
else
{
$taches = json_decode($file);
$aFaire = $taches->aFaire;
}
// Copie de l'input nouvelle tâche
$newTache = $_POST["tache"];
// Nettoyage du fichier pour éviter les injections de base
$newTache = htmlspecialchars($newTache);
// Ajout de la nouvelle tâche dans le tableau
$aFaireLength = count($aFaire);
$aFaire[$aFaireLength] = $newTache;
// Ecraser l'ancienne la propriété tableau aFaire avec le tableau $aFaire mis à jour
$taches->aFaire = $aFaire;
// Traduction au format Json
$taches = json_encode($taches);
// Ecraser le fichier avec les nouvelles données
file_put_contents('todo.json', $taches);
// AMEN
}
?>


<h2>A Faire</h2>
<form action="" method="post">
	<input type="checkbox" name="checkbox">
	<?php 

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




