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
            die('Fel vid anslutning ' . $this->db->connect_error );
        }
    }

    //set-funktioner
    public function setName(string $name) : string {
        $this->name = $name;
        return "Du lade till [$name]";
    }

    //set-funktioner
    public function setDescription(string $description) : string {
        $this->description= $description;
        return "Du lade till [$description]";
    }

    //set-funktioner
    public function setPriority(string $priority) : string {
        $this->priority = $priority;
        return "Du lade till [$priority]";
    }
}
