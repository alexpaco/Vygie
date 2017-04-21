<!DOCTYPE html>
<html>
<head>
	<title>Page principale</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
	<script src="js/creationCarte.js"></script>
</head>
<body>
	<header>
		<a href="{{asset('/')}}"><img src="img/logo-08.svg" id="logo"></a>
	</header>
	<p style="text-align: center">Quand il y a un cas de maladie dans une école, elle s'affichera d'une autre couleur, cliquer dessus pour voir de quelle maladie il s'agit.</p>
	<div id="legende"></div>
	<map  id="map" name="map">
		<div id="areas"></div> 
	</map>
	<img id="canvasMap" id="image" src="img/fondCarte.png" usemap="#map"/>
	<canvas id="canvas">Mettez à jour votre navigateur Internet !</canvas>
	<a id="formulaire" style="visibility: hidden;"></a>
	<a id="formulaire2" style='visibility: hidden;'></a>
	<a id="formulaire3" style="visibility: hidden;"></a>
	<p id="ville"></p>
	<ul id="liste"></ul>
	<p id="ecole"></p>
	<ul id="liste2"></ul>
	<p id="entete_maladie"></p>
	<div id="maladie"></div>

	<footer>
		<p id="mention"> © Vygie projet imaginé par la première promo de l'ACS Picasso. Poursuivi par F. Theveniaux , A. Pacoret et B. Matera apprenant à l'ACS Chalon</p>
	</footer>
	<script type="text/javascript">
		
			
		
		$('document').ready( function(){
			$.ajaxSetup({
				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
			
			for (var i = 1; i <=95; i++) {
				var dept = $("#"+i);
				dept.click(function(event){

					event.preventDefault();
					$.ajax({
						method: 'POST',
						url: 'afficheVille',
						data: {
							"_token": "{{ csrf_token() }}",
							"dept": $('#formulaire').html(),
						},
						success: function(data){
							document.getElementById('ecole').innerHTML = "";
							document.getElementById('entete_maladie').innerHTML = "";
							document.getElementById('maladie').innerHTML = "";
							document.getElementById('ville').innerHTML = "VILLES :";
							document.getElementById('liste').innerHTML = "";
							document.getElementById('liste2').innerHTML = "";
							for (var i = 0; i < data.dept.length; i++) {
								document.getElementById('liste').innerHTML+= "<li data-id='"+data.dept[i].id_Ville+ "'>" + data.dept[i].nom_Ville + "</li>";
							}
						} 
					});
				});
			}

			$('#liste').on("click", "li", function(event){
				var resultat = $(this).attr("data-id");

				$("#formulaire2").html(resultat);

				$.ajax({
					method: 'POST',
					url: 'afficheEcole',
					data: {
						"_token": '{{ csrf_token() }}',
						"ville": $('#formulaire2').html(),
					},
					success: function(data){
						document.getElementById('maladie').innerHTML = "";
						document.getElementById('entete_maladie').innerHTML = "";
						document.getElementById('ecole').innerHTML = " ECOLES : ";
						document.getElementById('liste2').innerHTML = "";
						for (var i = 0; i < data.ville.length; i++) {
							if(data.ville[i].id_Ecole === data.ecole ){
								document.getElementById('liste2').innerHTML += "<li data-id= '"+data.ville[i].id_Ecole+"' style='color: red;'>"+ data.ville[i].nom_Ecole +"</li>";
							}
							else{
								document.getElementById('liste2').innerHTML += "<li data-id= '"+data.ville[i].id_Ecole+"'>"+ data.ville[i].nom_Ecole +"</li>";
							}
							
						}
					}
				});
			});

			$('#liste2').on("click", "li", function(event){

				var resultat = $(this).attr("data-id");

				$('#formulaire3').html(resultat);

				$.ajax({
					method: 'POST',
					url: 'afficheMaladie',
					data: {
						"_token" :'{{ csrf_token() }}',
						"ecole": $('#formulaire3').html(),
					},
					success: function(data){
						document.getElementById('maladie').innerHTML = "";
						document.getElementById('entete_maladie').innerHTML = "";
						if(data.enfant[0].infecter_Actif === 1){							
						document.getElementById('entete_maladie').innerHTML = "MALADIE : ";
						document.getElementById('maladie').innerHTML += "<p>"+ data.ecole[0].nom_Maladie +"</p>"
						document.getElementById('maladie').innerHTML += "<p>Nombre d'élèves malades : "+ data.enfant[0].infecter_NbEnfant +"</p>";
						}


					}
				});

			});
		});
	</script>
</body>
</html>