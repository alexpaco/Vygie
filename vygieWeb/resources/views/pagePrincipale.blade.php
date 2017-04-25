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
	<p class="explication">Pour commencer choisissez un département, ainsi que la ville où se situe l'école.</p>
	<p class="explication">Quand il y a un cas de maladie dans une école, elle s'affichera d'une autre couleur, cliquer dessus pour voir de quelle maladie il s'agit.</p>
	<div id="legende"></div>
	<map  id="map" name="map">
		<div id="areas"></div> 
	</map>
	<form id="formDept">
		<select id="listeDept">s
				<option>Choisissez votre département</option>
			@foreach($dept as $Dept)
				<option value="{{ $Dept->id_Departement }}">{{ $Dept->nom_Departement }}</option>
			@endforeach
		</select>
		<input type="submit" name="submit" id="valider">
	</form>
	<p id="avertissement"></p>
	<form id="formVille">
		<select id="listeVille">
		</select>
		<input type="submit" name="sublit" id="valideVille">	
	</form>
	<p></p>
	<form id="formEcole">
		<select id="listeEcole"></select>
		<input type="submit" name="submit" id="validEcole">
	</form>
	<h5 id="titreMaladie">Maladie :</h5>
	<p id="petiteMaladie"></p>
	<img id="canvasMap" id="image" src="img/fondCarte.png" usemap="#map"/>
	<canvas id="canvas">Mettez à jour votre navigateur Internet !</canvas>
	<a id="formulaire" style="visibility: hidden;"></a>
	<a id="formulaire2" style='visibility: hidden;'></a>
	<a id="formulaire3" style="visibility: hidden;"></a>
	<h5 id="ville"></h5>
	<ul id="liste"></ul>
	<h5 id="ecole"></h5>
	<ul id="liste2"></ul>
	<h5 id="entete_maladie"></h5>
	<div id="maladie"></div>

	<footer>
		<p id="mention"> © Vygie projet imaginé par la première promo de l'ACS Picasso. Poursuivi par F. Theveniaux , A. Pacoret et B. Matera apprenant à l'ACS Chalon</p>
	</footer>
	<script type="text/javascript">
		
			
		
		$('document').ready( function(){
			$.ajaxSetup({
				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});

			//  Ajax pour interaction avec grand écran
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
								document.getElementById('liste').innerHTML+= "<li data-id='"+data.dept[i].id_Ville+ "'>" + data.dept[i].nom_Ville + "</li><hr>";
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
								document.getElementById('liste2').innerHTML += "<li data-id= '"+data.ville[i].id_Ecole+"' style='color: red;'>"+ data.ville[i].nom_Ecole +"</li><hr>";
							}
							else{
								document.getElementById('liste2').innerHTML += "<li data-id= '"+data.ville[i].id_Ecole+"'>"+ data.ville[i].nom_Ecole +"</li><hr>";
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
						document.getElementById('maladie').innerHTML += "<p>"+ data.ecole[0].nom_Maladie +"</p>";
						}
						else{
							document.getElementById('maladie').innerHTML += "<p>Aucune maladie à déclarer.</p>";
						}


					}
				});

			});

			// Ajax interaction avec petit écran
			$('#valider').on("click", function(event){

				var resultat = $('#listeDept').val();
				$('#formulaire').html(resultat);
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
						$('#titreMaladie').css("display", "none");
						document.getElementById('petiteMaladie').innerHTML = "";
						document.getElementById('listeVille').innerHTML = "";
						document.getElementById('listeEcole').innerHTML = "";
						$('#formEcole').css("display", "none");
						if(resultat === "Choisissez votre département"){
							document.getElementById('avertissement').innerHTML = "Veuillez choisir un département";
							$('#formVille').css("display", "none");
						}
						else{
							$('#formVille').css("display", "block");
							document.getElementById('avertissement').innerHTML = "";
							for (var i = 0; i < data.dept.length; i++) {
							document.getElementById('listeVille').innerHTML+= "<option value='"+data.dept[i].id_Ville+ "'>" + data.dept[i].nom_Ville + "</option>";
						}
						
						}
					}
				});
			});

			$('#valideVille').on("click", function(event){

				var resultat = $('#listeVille').val();
				$('#formulaire2').html(resultat);
				event.preventDefault();
				$.ajax({
					method: 'POST',
					url: 'afficheEcole',
					data: {
						"_token": '{{ csrf_token() }}',
						"ville": $('#formulaire2').html(),
					},
					success: function(data){
						document.getElementById('petiteMaladie').innerHTML = "";
						$('#titreMaladie').css("display", "none");
						document.getElementById('liste2').innerHTML = "";
						for (var i = 0; i < data.ville.length; i++) {
							if(data.ville[i].id_Ecole === data.ecole ){
								$('#formEcole').css("display", "block");
								document.getElementById('listeEcole').innerHTML += "<option value= '"+data.ville[i].id_Ecole+"' style='color: red;'>"+ data.ville[i].nom_Ecole +"</option>";
							}
							else{
								$('#formEcole').css("display", "block");
								document.getElementById('listeEcole').innerHTML += "<option value= '"+data.ville[i].id_Ecole+"'>"+ data.ville[i].nom_Ecole +"</option>";
							}
							
						}
					}
				});
			});

			$('#validEcole').on("click", function(event){

				var resultat = $('#listeEcole').val();

				$('#formulaire3').html(resultat);
				event.preventDefault();

				$.ajax({
					method: 'POST',
					url: 'afficheMaladie',
					data: {
						"_token" :'{{ csrf_token() }}',
						"ecole": $('#formulaire3').html(),
					},
					success: function(data){
						document.getElementById('petiteMaladie').innerHTML = "";
						$('#titreMaladie').css("display", "none");
						if(data.enfant[0].infecter_Actif === 1){							
							$('#titreMaladie').css("display", "block");
							document.getElementById('petiteMaladie').innerHTML += data.ecole[0].nom_Maladie ;
						}
						else{
							$('#titreMaladie').css("display", "none");
							document.getElementById('petiteMaladie').innerHTML += "Aucune maladie à déclarer.";
						}


					}
				});

			});
		});

	// remise du css à zéro quand on passe du petit au grand écran
		window.addEventListener ("resize", function() {
            
            if(document.documentElement.clientWidth > 1024){
                formVille.style.cssText = "";
                avertissement.style.cssText = "";
                formEcole.style.cssText = "";
                petiteMaladie.style.cssText = "";
                titreMaladie.style.cssText = "";
                document.getElementById('ecole').innerHTML = "";
                document.getElementById('liste2').innerHTML = "";
                document.getElementById('petiteMaladie').innerHTML = "";
				document.getElementById('entete_maladie').innerHTML = "";
            }
        }, true);
	</script>
</body>
</html>