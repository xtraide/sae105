<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<?php require "utile.php"?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css">
		<script defer src="https://pyscript.net/alpha/pyscript.js"></script>
		<link rel="stylesheet" type="text/css" href="Styles/Style.css">
		<title>Discographie</title>
		<py-env>
			- pyodide.http
		</py-env>
	</head>
	<body>
		<header>
			<h1 id="AccH1">Discographie</h1>
			<?php nav() ?>
		</header>
		<section id="Sec">
			<h2 id="gg">CisBox</h2>
			<br>
			<br>
			<py-script>
				from pyodide.http import pyfetch
				import asyncio

				def HTML(text):
					return text.replace("{{", "&lt;").replace("}}", "&gt;") # <!--&lt; = < ,&gt;= >-->


				url = "https://raw.githubusercontent.com/xtraide/tpn/master/sae105.json"

				response = await pyfetch(url, **{"method": "GET", "mode": "cors"})

				output = await response.json()



				data = output[2]["data"]  # output[2]car 3eme ligne de la base de donner ["data"] car on prend la data
				# [i]= compteur  pour passer d'une data a une autre ["song"] car on veux la valer de song  pour avoir le nom de la musique
				
				def GetData(i):
					return "src='Ressources/Song/" + data[i]["song"] + ".mp4'"


				i = 0 
				while i < len(data):
					print(HTML("{{li class='DisLi'}}"+" {{img class='DisImg' src='Ressources/Img/Dialogue De Sourds.jpg' alt='image de l abume'}} {{p class='DisP'}}" + data[i]["song"] + "{{/p}}"+ "{{audio controls id='DisAudio'}}" + "{{source " + GetData(i) + " type='audio/mp4'}}" + "{{/audio}}{{/li}}{{br}}" + " {{/li}}"))
					i=i+1
			</py-script>
			<br>
		</section>
		<footer>
			<p id="FooA">Made by nicolas thieblemont SAE105</p>
		</footer>

	</body>
</html>
