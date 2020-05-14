<?php


namespace App;


class MysqlConnection
{
    private $pdo;
    private static $instance;


    private function __construct()
    {
        $this->setConnection();
    }

    public static function getInstance(): MysqlConnection
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private function setConnection()
    {
        try {
            $dsn = getSettingsParam("DB_CONNECTION") . ':host=' . getSettingsParam(
                    "DB_HOST"
                ) . ';dbname=' . getSettingsParam("DB_DATABASE");
            $user = getSettingsParam("DB_USERNAME");
            $pswd = getSettingsParam("DB_PASSWORD");
            $dbh = new \PDO($dsn, $user, $pswd);
            $this->pdo = $dbh;
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo "Ошибка базы данных. Обратитесь в техподдержку";
            $msg = $e->getMessage() . " File " . $e->getFile() . " Line " . $e->getLine();
            echo $msg;
            return;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}