<?php
include("includes/header.php");
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
                <th>Åtgärd</th>
            </tr>
        </thead>

        <tbody>
            <!-- PHP skriver ut aktiviteterna här -->
        </tbody>
    </table>
</div>


<?php
include("includes/footer.php");
