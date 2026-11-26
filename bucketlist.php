<?php
//inkluderar header
include("includes/header.php");
//Inkluderar config-filen med databasanslutningar
include("includes/config.php");
//inkluderar klassfilen 
include("includes/classes/ListItem.class.php");

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

<?php
//instans av klass
$listItem = new ListItem(); 
//anropar metod getItems som returnerar array
$allItems = $listItem->getItems();

var_dump($listItem->deleteItem(2)); 
$listItem->getItems();

?>


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
            foreach($allItems as $item ){
            ?>
                <tr>
                    <td>
                        <?= $item['name'] ?>
                    </td>
                    <td>
                        <?= $item['description'] ?>
                    </td>
                    <td>
                        <?= $item['priority'] ?>
                    </td>
                    <td>
                        <?= $item['created_at'] ?>
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
