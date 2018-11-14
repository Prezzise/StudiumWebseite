<!DOCTYPE html>

<html>

<body>
	<?php
		//Hier kommt eigentlich das ganze PHP-Script für die Seite hin und wird dann included
		
		//Connection Funktion, funktioniert aber nicht
		/*function connectDB() {
			$servername = "localhost";
			$benutzer = "root";
			$password = "";
			$datenbank = "studiumwebseite";
			
			$connection = new mysqli($servername, $benutzer, $password, $datenbank);
			
			if($connection->connect_error){
				die("Es konnte nicht mit der Datenbank verbunden werden!");
			} 	
		}*/
		
		//Hier wird die ToDo-Liste ausgegeben
		function eintaegeAusgeben($connection) {
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
		}
		
		//Hier wird ein neuer Eintrag der ToDo-Liste zur Datenbank hinzugefügt
		function neuerToDoEintrag($connection) {
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
		}
		
		//Hier wird ein neuer Termin zur Datenbank hinzugefügt
		function neuerTerminEintrag($connection) {
			if($_SERVER["REQUEST_METHOD"]) {	
				if(!empty($_POST["newEvent"]) && !empty($_POST["datum"])){
					$newEvent = $_POST["newEvent"];
					$datumTermin = $_POST["datum"];
					$datumEintrag = time();
					$neuerKalenderEintrag = "INSERT INTO termine (datum, termindatum, termineintrag) VALUES ('$datumEintrag', '$datumTermin', '$newEvent' )";
					
					if($connection->query($neuerKalenderEintrag) === true){
						echo "Du wurdest erfolgreich registriert!";
					}
					else {
						//Falls es nicht erfolgreich war, gibt es den Fehler aus
						echo "Du bist ein Lappen" . $connection->error;
					}				
				}
				else {
				echo "Bitte alle Felder ausfüllen";
				}
			}	
		}
		
		//Hier werden die Termine ausgegeben
		function termineAusgeben($connection) {
			$eintrage = "SELECT * FROM termine";
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
			        echo "<p>Datum : " . $row['terminDatum']. " Was???: " . $row['terminEintrag'] . "<p>";
			    }
			} else {
			    echo "Noch keine Einträge";
			}
		}
	?>
	
</body>

</html>