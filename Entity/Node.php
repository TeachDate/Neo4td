<?php
namespace TeachDate\Neo4td\Neo4tdBundle\Entity;
use Everyman\Neo4j\Node as EveryNode;
use Everyman\Neo4j\Index;
use Everyman\Neo4j\UniqueEntity;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use TeachDate\Neo4td\Neo4tdBundle\Neo4td;
class Node extends  EveryNode{
    public function __construct(){
        $neo4td=new Neo4td();
        $this->setClient($neo4td->getClient());
    }
    public function addNode(array $labels,array $properties){
        foreach($labels as $label){
            if(!$label instanceof Label){
                throw new InvalidParameterException("Labels parameters should be instance of Label class");
            }
        }

        $this->setProperties($properties);
        $this->save();
        $this->addLabels($labels);
    }
}