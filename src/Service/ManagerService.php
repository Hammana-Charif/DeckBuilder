<?php


namespace DeckBuilder\Service;


use \PDO;

class ManagerService
{
    /**
     * @var PDO
     */
    private static $connection;

    /**
     * ManagerService constructor.
     */
    private function __construct()
    {
        return self::$connection = new PDO(
            "mysql:host=localhost;dbname=deckbuilder;charset=UTF8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if (null === self::$connection) {
            new ManagerService();
        }
        return self::$connection;
    }
}