<?php
function nav()
{
	echo '	
<ul class="nav">
  <li><a href="index.php">index</a></li>
  <li><a href="Discographie.php">Discographie</a></li>
  <li><a href="Biographie.php">Biographie</a></li>
</ul>
	';
}

function play_audio(string $s)
{
	echo '<audio controls>
  <source src="Ressources/Song/' . $s . '.mp4" type="audio/mp4">
</audio>';
}
function Cnx($sql)
{
	$link = mysqli_connect("127.0.0.1", "root", "", "sae105");
	if (!mysqli_set_charset($link, "utf8mb4")) { //encodage  en utf8mb4
		printf(mysqli_error($link));
		exit();
	}
	$req = mysqli_query($link, $sql);
	return $req;
}
function test()
{
	$req = Cnx("SELECT * FROM `song`");
	if ($req) {
		while ($data = mysqli_fetch_array($req, MYSQLI_ASSOC)) {

			echo '<li class="DisLi">
				<img class="DisImg" src="Ressources/Img/Dialogue De Sourds.jpg" alt="image de l abume"><p class="DisP"> <p class="DisP">' . $data["song"] . '</p>
				<audio controls id="DisAudio">
					<source src="Ressources/Song/' . $data["song"] . '.mp4" type="audio/mp4">
				</audio></li><br>';
		}
	}
}
