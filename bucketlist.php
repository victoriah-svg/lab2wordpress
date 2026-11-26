<?php
//inkluderar header
include("includes/header.php");
//Inkluderar config-filen med databasanslutningar
include("includes/config.php");
//inkluderar klassfilen 
include("includes/classes/ListItem.class.php");

//defaultvärden för values formulär 
$name = "";
$description = "";


?>
<h1>Bucketlist</h1>

<?php
//instans av klass
$listItem = new ListItem();

//Om deleteid skickats med i adressraden
if(isset($_GET['deleteid'])){
    //spara värdet i variabel
    $deleteid = intval($_GET['deleteid']);

    //kalla på metod deleteItem med id som skickats med
    if($listItem->deleteItem($deleteid)){
        //om det gick bra skriv ut meddelande
        echo "<p class='success'>Radering slutförd</p>";
    }else{
        //annars skriv ut felmeddelande
        echo "<p class='error'>Det gick inte att radera.. testa igen</p>";
    }

}



//kontrollerar om formuläret skickats än 
if (isset($_POST['name'])) {

    //läser ut värden från formuläret och tar bort eventuella html-taggar
    $name = strip_tags($_POST['name']);
    $description = strip_tags($_POST['description']);
    $priority = strip_tags($_POST['priority']);


    //kontroll om tom textsträng för name eller för lång
    if (trim($name) == '' or strlen($name) > 64) {
        echo "<p class='error'>Du måste ange ett namn för det du vill lägga till med max 64 tecken</p>";
    }
    //kontroll om tom textsträng för description eller för lång
    if (trim($description) == '' or strlen($description) > 140) {
        echo "<p class='error'>Du måste ange en beskrivning med max 140 tecken</p>";
    }

    //om allt korrekt ifyllt
    if (trim($name) !== '' && !trim($description) == '') {
        if ($listItem->addItem($name, $description, $priority)) {
            echo "<p class='success'>Tillagt i Bucketlist</p>";
        } else {
            echo "<p class='error'>Det gick inte att lägga till i Bucketlist. Försök igen</p>";
        }
    }
}

?>


<form class="bucket-form" method="POST" action="bucketlist.php">

    <div class="form-group">
        <label for="name">Namn på vad du vill göra:</label>
        <input type="text" id="name" name="name"
            placeholder="Exempel: Resa till Japan" value="<?= $name ?>">
    </div>

    <div class="form-group">
        <label for="description">Beskrivning:</label>
        <textarea id="description" name="description"
            placeholder="Beskriv vad du vill göra..." value="<?= $description ?>"></textarea>
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
            //anropar metod getItems som returnerar array
            $allItems = $listItem->getItems();


            /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) 
    - Skriv ut i tabell*/
            foreach ($allItems as $item) {
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
                    <td>
                        <a href="bucketlist.php?deleteid=<?= $item['id'] ?>">Ta bort</a>
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
