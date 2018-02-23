$(document).ready(function(){

		// Donner la class "checked" aux checkbox archives
		$(".checkArchives").addClass("checked");

		//Empêcher le click sur les checkbox archives
		// $(".checkArchives").click(function (){
		// 	return false;
		// });

		//AJAX : Btn Sauvegarder
		//cacher le bouton "Sauvegarder". 
		//Qd on sélectionne une checkbox, on fait apparaître le bouton.
		//Qd on appuie sur "Sauvegarder", le bouton disparaît.
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function () {
			if(xhr.readyState === 4){
				var sauvegarder = xhr.responseText;
				var checkbox = $(".checkDo");

				checkbox.change(function (){
							//si checkbox checked ET l'input "enregistrer" n'existe pas
						if (checkbox.is(":checked") && $("#enregistrer").length == 0){
							$("#aFaire").append(sauvegarder);
					};
				});

			}
		};
		xhr.open("POST", "sauvegarder.php", true);
		xhr.send();

		//DRAG AND DROP
	  	$( function() {
		    $( "#ulaFaire" ).sortable();
		    $( "#ulaFaire" ).disableSelection();
		  } );


	
	});