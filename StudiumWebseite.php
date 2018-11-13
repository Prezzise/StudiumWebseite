<!DOCTYPE html>

<html lang="de">
	
	<head>
		<link href="Style.css" type="text/css" rel="stylesheet">
		<title>Studium Webseite</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
	<!-- 
	To Do:
		-Navleiste die Schrift nach unten verschieben	
		-Tabelle ohne Abstand zwischen den Spalten
	-->	
	
		<!-- Hier befindet sich die Navigationsleiste
			Das Display ist auf flex gestellt
		  -->
		  
		<?php
			//Hier steht das wichtigste fuer die Datenbank
			$servername = "localhost";
			$benutzer = "root";
			$password = "";
			$datenbank = "studiumwebseite";
			
			$connection = new mysqli($servername, $benutzer, $password, $datenbank);
			
			if($connection->connect_error){
			die("Es konnte nicht mit der Datenbank verbunden werden!");
		}
		?>		  
		  
		<div class="navigation">
			<div id="nav1" class="navDiv"> <a href="StudiumWebseite.html" class="navA"> Lel </a> </div>
			<div id="nav2" class="navDiv"> <a href="StudiumWebseite.html" class="navA"> Boo </a> </div>
			<div id="nav3" class="navDiv"> <a href="StudiumWebseite.html" class="navA"> Juhu </a> </div>
			<div id="nav4" class="navDiv"> <a href="StudiumWebseite.html" class="navA"> ROFL </a> </div>
		</div>
		
		<h1>Studium Webseite</h1>
		
		
		<!-- Hier befindet sich ein To Do- und Wichtige-Termine-Bereich -->
		<div class="wichtigBereich">
			<div class="wB_Divs" id="ToDo">
				<h3>To Do-Liste:</h3>
				
				<?php
					$eintrage = "SELECT * FROM eintraege";
					$result = $connection->query($eintrage);
					
					if(!$result) {
						echo	"Es konnte keine Verbindung hergestellt werden";	
					}
					
					//Hier wird überprüft ob die Anzahl der Reihen größer als 1 ist
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    		//Hier wird der nächste Eintrag genommen
								// _assoc um ein assoziatives Array zurückzubekommen
					        echo "<p>Datum : " . date('d.m.Y', $row['Datum']) . " ToDo: " . $row['ToDo'] . "<p>";
					    }
					} else {
					    echo "Noch keine Einträge";
					}
				?>
				
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
					<input type="text" name="newToDo" />
					<input type="submit" name="submit1" />
				</form>
				
				<?php	
					//Hier wird der Eintrag aus Submit-Button 1 genommen
					if($_SERVER["REQUEST_METHOD"] == "POST") {	
						if(!empty($_POST["newToDo"])){
							$ToDo = $_POST["newToDo"];
							$datum = time();
							$neuerToDoEintrag = "INSERT INTO eintraege (ToDo, datum) VALUES ( '$ToDo', '$datum')";
							
							if($connection->query($neuerToDoEintrag) === true){
								echo "Du wurdest erfolgreich registriert!";
							}
							else {
								//Falls es nicht erfolgreich war, gibt es den Fehler aus
								echo "Du bist ein Lappen" . $connection->error;
							}
						}
					}
				?>
				

			</div>
			<div class="wB_Divs" id="termine">
				<h3>Wichtige Thermine:</h3>
				<p>32.13.2017: dafahfd</p>
				<p>32.13.2017: dafahfd</p>
				<p>32.13.2017: dafahfd</p>
				<p>32.13.2017: dafahfd</p>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
					<input type="text" name="newEvent" />
					<input type="submit" name="submit2" />
				</form>
				
				
				<?php	
				//Hier wird der Eintrag aus Submit-Button 2 genommen
					if($_SERVER["REQUEST_METHOD"]) {	
						if(!empty($_POST["newEvent"])){
							$newEvent = $_POST["newEvent"];
							echo "Gesetzt "  . $newEvent;
						}
					}		
				?>
				
			</div>
		</div>
		
		<!-- Hier steht der Kalender-->		
		<table class="kalender">
			<tr class="kalZeile"> 
				<td class="kalSpalte zeile1">Uhrzeit</td>
				<td class="kalSpalte zeile1">Montag</td>
				<td class="kalSpalte zeile1">Dienstag</td>
				<td class="kalSpalte zeile1">Mittwoch</td>
				<td class="kalSpalte zeile1">Donnerstag</td>
				<td class="kalSpalte zeile1">Freitag</td>
				<td class="kalSpalte zeile1">Samstag</td>
				<td class="kalSpalte zeile1">Sonntag</td>
			</tr>
			<tr class="kalZeile"> 
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
			</tr>
			<tr class="kalZeile"> 
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
			</tr>
			<tr class="kalZeile"> 
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
			</tr>
			<tr class="kalZeile"> 
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">da</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
				<td class="kalSpalte">adf</td>
				<td class="kalSpalte">dad</td>
				<td class="kalSpalte">fa</td>
			</tr>
		</table>		
		
	</body>	
	
</html>