<?php
include("config.php");

class ListItem
{

    //privata properties
    private $db;
    private $name;
    private $description;
    private $priority;

    //konstruktor för att connect to database m variabler från config-fil
    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        if ($this->db->connect_errno > 0) {
            die('Fel vid anslutning ' . $this->db->connect_error);
        }
    }

    //metod för att lägga till ett item 
    public function addItem(string $name, string $description, int $priority): bool
    {
        //anropar setfunktionerna med värden som skickats med
        $this->setName($name);
        $this->setDescription($description);
        $this->setPriority($priority);

        //förbereder statement 
        $sql = "INSERT INTO bucketlist (name, description, priority)
            VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        //sätter värdena där frågetecknen fanns - bind parameters - ssi är string string int
        $stmt->bind_param("ssi", $this->name, $this->description, $this->priority);

        $success = $stmt->execute(); //kör vår sql-fråga

        $stmt->close();

        return $success;
    }

    //metod för att hämta alla items
    public function getItems(): array{
        $sql = "SELECT * FROM bucketlist;"; //sql-fråga
        $result = mysqli_query($this->db, $sql); //svaret

        // returnera som assosiativ array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //metod för att radera item med specifikt id
    public function deleteItem(int $id): bool {
        $sql = "DELETE FROM bucketlist WHERE id=$id;";
        return mysqli_query($this->db, $sql);

    }

    //set-funktioner
    public function setName(string $name): string
    {
        $this->name = $name;
        return "Du lade till [$name]";
    }

    //set-funktioner
    public function setDescription(string $description): string
    {
        $this->description = $description;
        return "Du lade till [$description]";
    }

    //set-funktioner
    public function setPriority(string $priority): string
    {
        $this->priority = $priority;
        return "Du lade till [$priority]";
    }
}
