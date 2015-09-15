<?php
namespace TeachDate\Neo4td\Neo4tdBundle\Entity;
use Everyman\Neo4j\Cypher\Query;
use Everyman\Neo4j\Label as EveryLabel;
use TeachDate\Neo4td\Neo4tdBundle\Neo4td;

class Label extends EveryLabel{

    public function __construct($name=null,array $uniqueProps=null){
        $neo4td=new Neo4td();
        $this->setClient($neo4td->getClient());
        if($uniqueProps!==null){
            foreach($uniqueProps as $property){
                $query="CREATE CONSTRAINT ON ($name:$name) ASSERT $name.$property IS UNIQUE";
                $query=new Query($this->client,$query);
                $this->client->executeCypherQuery($query);
            }
        }
        if($name!==null){
            $this->name=$name;
        }
    }
}