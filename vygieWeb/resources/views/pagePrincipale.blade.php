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
	<ul id="liste"></ul>
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
						url: 'affiche',
						data: {
							"_token": "{{ csrf_token()}}",
							"dept": $('#formulaire').html(),
							
						},
						success:function(data){
							$("#liste").html("<li>"+data.dept[0].codePostal+" "+data.dept[0].nom_Ville+"</li>");
						} 

					});
				});
			}
					
			
		});
	</script>
</body>
</html>