<?php
//inkluderar header
include("includes/header.php");
//Inkluderar config-filen med databasanslutningar
include("includes/config.php");

/* Anslut till databasen med konto för bucketlist */
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if ($db->connect_errno > 0) {
    die('Fel vid anslutning [' . $db->connect_error . ']');
}

/* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
$sql = "SELECT * FROM bucketlist";
if (!$result = $db->query($sql)) {
    die('Fel vid SQL-fråga [' . $db->error . ']');
}

?>
<h1>Bucketlist</h1>
<form class="bucket-form" method="POST" action="bucketlist.php">

    <div class="form-group">
        <label for="name">Namn på vad du vill göra:</label>
        <input type="text" id="name" name="name"
            placeholder="Exempel: Resa till Japan">
    </div>

    <div class="form-group">
        <label for="description">Beskrivning:</label>
        <textarea id="description" name="description"
            placeholder="Beskriv vad du vill göra..."></textarea>
    </div>

    <div class="form-group">
        <label for="priority">Prioritet:</label>
        <select name="priority" id="priority">
            <option value="1">1 – Hög</option>
            <option value="2">2 – Medel</option>
            <option value="3">3 – Låg</option>
        </select>
    </div>

    <button type="submit">Lägg till i min bucketlist</button>

</form>


<div class="table-container">
    <table class="bucket-table">
        <thead>
            <tr>
                <th>Namn</th>
                <th>Beskrivning</th>
                <th>Prioritet</th>
                <th>Tillagd</th>
                <th>Åtgärd</th>
            </tr>
        </thead>

        <tbody>
            <?php

            /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) 
    - Skriv ut i tabell*/
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <?= $row['name'] ?>
                    </td>
                    <td>
                        <?= $row['description'] ?>
                    </td>
                    <td>
                        <?= $row['priority'] ?>
                    </td>
                    <td>
                        <?= $row['created_at'] ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>


<?php
include("includes/footer.php");
/* Stänger databasanslutningen */
$db->close();
