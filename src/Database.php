<?php

class Database
{
    private static $connection = null;
    
    public static function getConnection()
    {
        if (!isset($connection))
        {
            $connection = new PDO(
                'mysql:host=localhost;
                dbname=geoguillaume;
                charset=utf8mb4',
                'geoguillaume',
                'L3EUUXDwC6Rczpym'
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $connection;
    }
    
    public static function fetchAll($sql)
    {
        $db = Database::getConnection();
        $stmt = $db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    public static function fetchOne($sql)
    {
        $db = Database::getConnection();
        $stmt = $db->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        return $row;
    }
    
    public static function exec($sql)
    {
        $db = Database::getConnection();
        $affected = $db->exec($sql);
        return $affected;
    }
}
?>