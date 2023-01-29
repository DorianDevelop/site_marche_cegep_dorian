<?php

abstract class FactoryBase
{
    protected function dbConnect()
    {
        //$db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=h23_web2_2310583;charset=utf8', 'dev-2310583', 'King1108');
        //$db = new mysqli("localhost", "root", "", "travail1") or die("Connect failed: %s\n". $conn -> error);
        $db = new mysqli("sql.decinfo-cchic.ca", "dev-2310583", "King1108", "h23_web2_2310583", "33306") or die("Connect failed: %s\n". $conn -> error);
        return $db;
    }
}
