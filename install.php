<?php
/*Inkluderar config-filen med databasanslutningar */
include("includes/config.php");

/* Anslut till databasen med variabler från config-fil*/
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 

/* SQL-fråga för att skapa tabell */
$sql = "DROP TABLE IF EXISTS bucketlist; 
    CREATE TABLE bucketlist(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    description VARCHAR(140),
    priority INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

/* SQL-fråga för att lägga in exempeldata */
$sql .= "INSERT INTO bucketlist (name, description, priority) VALUES
('Japanresa', 'åka till Japan nästa år', 1),
('Italien', 'åka på kulinarisk resa i Italien', 1),
('Spanska', 'Lära mig spanska', 2)
";

/* Skicka SQL-frågan till DB */
if($db->multi_query($sql)) {
    echo "Tabell installerad.";
} else {
    echo "Fel vid installation av Tabell.";
}