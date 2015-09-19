<?php
namespace TeachDate\Neo4td\Neo4tdBundle;
use Everyman\Neo4j\Client;
use Everyman\Neo4j\Cypher\Query;
class Neo4td{
    public function __construct(){

//todo:: config file should load here to get username and password

    }
    public function getClient(){
        $client=new Client();
        $client->getTransport()->setAuth('neo4j','ubuntu');
        return $client;
    }
}
