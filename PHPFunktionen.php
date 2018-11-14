<!DOCTYPE html>

<html>

<body>
	<?php
		//Hier kommt eigentlich das ganze PHP-Script für die Seite hin und wird dann included
		
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
		
		function neuerKalenderEintrag($connection) {
			if($_SERVER["REQUEST_METHOD"]) {	
				if(!empty($_POST["newEvent"])){
					$newEvent = $_POST["newEvent"];
					echo "Gesetzt "  . $newEvent;
				}
			}	
		}
	?>
	
</body>

</html>