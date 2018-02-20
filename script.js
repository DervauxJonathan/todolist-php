$(document).ready(function(){

		$(".checkArchives").addClass("checked");

		$(".checkArchives").click(function (){
			return false;
		});

		//cacher le bouton "Enregistrer". 
		//Qd on sélectionne une checkbox, on fait apparaître le bouton.
		//Qd on appuie sur "Enregistrer", le bouton disparaît.
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function () {
			if(xhr.readyState === 4){
				var sauvegarder = xhr.responseText;
				var checkbox = $(".checkDo");

				checkbox.change(function (){
							//si checkbox checked ET l'input "enregistrer" n'existe pas
						if (checkbox.is(":checked") && $("#enregistrer").length == 0){
							checkbox.addClass("selected");
							$("#aFaire").append(sauvegarder);
					};
				});

			}
		};
		xhr.open("POST", "enregistrer.php", true);
		xhr.send();
	
	});