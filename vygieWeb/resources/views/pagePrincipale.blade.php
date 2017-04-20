<!DOCTYPE html>
<html>
<head>
	<title>Page principale</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
	<script src="js/creationCarte.js"></script>
</head>
<body>
	<div id="legende"></div>
	<map  id="map" name="map">
		<div id="areas"></div> 
	</map>
	<img id="canvasMap" id="image" src="img/fondCarte.png" usemap="#map"/>
	<canvas id="canvas">Mettez à jour votre navigateur Internet !</canvas>
	<a id="formulaire" style="visibility: hidden;"></a>
	<a id="formulaire2" style='visibility: hidden;'></a>
	<ul id="liste"></ul>
	<ul id="liste2"></ul>
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
							document.getElementById('liste2').innerHTML = "";
							document.getElementById('liste').innerHTML = "";
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
				// console.log(resultat);

				$.ajax({
					method: 'POST',
					url: 'afficheEcole',
					data: {
						"_token": '{{ csrf_token() }}',
						"ville": $('#formulaire2').html(),
					},
					success: function(data){
						document.getElementById('liste2').innerHTML = "";
						for (var i = 0; i < data.ville.length; i++) {
							document.getElementById('liste2').innerHTML += "<li data_id= '"+data.ville[i].id_Ecole+"'>"+ data.ville[i].nom_Ecole +"</li>";
						}
						


					}
				});
			});



		});
	</script>
</body>
</html>