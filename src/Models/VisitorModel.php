<?php

namespace App\Models;

class VisitorModel
{
    private $db;

    /**
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function addVisitor(array $visitor)
    {
        $query = $this->db->prepare(
            'INSERT INTO `visitors` (`name`, `company`, `entry_time`) 
                    VALUES (:name, :company, :entry_time);');
        return $query->execute(
            [':name' => $visitor['name'], ':company'=>$visitor['company'], ':entry_time'=>$_SERVER['REQUEST_TIME']]);
    }

    public function getVisitors()
    {

        $query = $this->db->prepare("SELECT `name`, `company`, `entry_time`, exit_time, `is_in` FROM `visitors` ORDER BY `entry_time` DESC ");
        $query->execute();
        return $query->fetchAll();
    }


    public function getVisitorByName(array $name)
    {
        $query = $this->db->prepare(
            "SELECT `name`, `company`, `entry_time`, `id` FROM `visitors` WHERE `name` LIKE :name AND `is_in` = 1");
        $query->execute([':name' => '%' . $name['name'] . '%']);
        return $query->fetchAll();
    }

    public function signOutVisitor(array $name) {
        $query = $this->db->prepare(
            "UPDATE `visitors` SET `is_in` = 0, `exit_time` = :exit_time WHERE `name` = :name");
        return $query->execute([':name' => $name['name'], ':exit_time'=> $_SERVER['REQUEST_TIME']]);
    }

//    public function signOutAllVisitor(array $names) {
//        forEach($names as $name) {
//            $query = $this->db->prepare(
//                "UPDATE `visitors` SET `is_in` = 0, `exit_time` = :exit_time WHERE `name` = :name");
//             $result = $query->execute([':name' => $name, ':exit_time' => $_SERVER['REQUEST_TIME']]);
//        }
//        return $result;
//    }

    public function signOutAllVisitor() {
            $query = $this->db->prepare(
                "UPDATE `visitors` SET `is_in` = 0, `exit_time` = :exit_time");
            $result = $query->execute([':exit_time' => $_SERVER['REQUEST_TIME']]);
        return $result;
    }

}