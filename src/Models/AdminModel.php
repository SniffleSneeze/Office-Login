<?php

namespace App\Models;

class AdminModel
{
    private $db;

    /**
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getPasscode()
    {
        $query = $this->db->prepare("SELECT `passcode` FROM `admin`");
        $query->execute();
        return $query->fetch();
    }

}