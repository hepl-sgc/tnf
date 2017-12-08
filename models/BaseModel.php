<?php

namespace App\Models;

abstract class BaseModel
{
    public static $instance;

    protected $connection;

    function __construct()
    {
        try {
            $this->connexion = new \PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=utf8', MYSQL_USER, MYSQL_PASSWORD);
            $this->connexion->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function __callStatic($method, $args = []) {
        $method = lcfirst(substr($method, 3));
        return call_user_func_array([self::getInstance(), $method], $args);
    }

    public static function getInstance()
    {
        if(self::$instance) return $self::$instance;
        $class = get_called_class();
        self::$instance = new $class();
        return self::$instance;
    }

    protected function get($sql, $args = [])
    {
        return $this->execute($sql, $args)->fetchAll();
    }

    protected function first($sql, $args = [])
    {
        return $this->execute($sql, $args)->fetch();
    }

    protected function create($sql, $args = [])
    {
        return $this->execute($sql, $args);
    }

    protected function execute($sql, $args = [])
    {
        if(count($args)){
            $result = $this->connexion->prepare($sql);
            $result->execute($args);
            return $result;
        }
        return $this->connexion->query($sql);
    }
}