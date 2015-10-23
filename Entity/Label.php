<?php
namespace TeachDate\Neo4td\Neo4tdBundle\Entity;
use Everyman\Neo4j\Cypher\Query;
use Everyman\Neo4j\Label as EveryLabel;
use TeachDate\Neo4td\Neo4tdBundle\Neo4td;

class Label extends EveryLabel{
    protected $name;

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

    public function getName(){
        return $this->name;
    }

    public function findOneByProperty($property,$value){
        $query='MATCH (n:'.$this->name.'{'.$property.':'.'"'.$value.'"}) RETURN n LIMIT 1';
        $query=new Query($this->client,$query);
        $result= $this->client->executeCypherQuery($query);
        return $result;
    }

    public function searchAllByProperty($property,$phrase){
        $query='MATCH (n:'.$this->name.") where n.name=~ '.*".$phrase.".*' RETURN n";
        $query=new Query($this->client,$query);
        $result= $this->client->executeCypherQuery($query);
        $res=array();
        $res['data']=null;
        $res['count']=$result->count();
        for($i=1;$i<=$result->count();$i++){
             $res['data'][]=$result->current()['data']->getProperties();
            $result->next();
        }
        return $res;
    }
}