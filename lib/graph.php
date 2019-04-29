<?php

class Graph
{

    public static $graph;
    public static $name;
    public static $password;
    public static $host;
    public static $port_default;
    public static $port_bolt;
    public static $client;

    public static function load(stdClass $conf_json)
    {

        foreach ($conf_json as $var => $value) {

            self::$$var = $value;
        }
        $cnx = self::$name . ':' . self::$password . '@' . self::$host . ':';
        self::$client = ClientBuilder::create()
            ->addConnection('default', 'http://' . $cnx . self::$port_default)// Example for HTTP connection configuration (port is optional)
            ->addConnection('bolt', 'bolt://' . $cnx . self::$port_bolt)// Example for BOLT connection configuration (port is optional)
            ->build();

        return true;
    }
}
