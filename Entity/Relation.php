<?php
namespace TeachDate\Neo4td\Neo4tdBundle\Entity;
use Everyman\Neo4j\Cypher\Query;
use Everyman\Neo4j\Relationship;
use TeachDate\Neo4td\Neo4tdBundle\Neo4td;

class Relation extends Relationship{
    protected $name;
    protected $label;
    public function __construct($name,$label){
        $this->name=$name;
        $this->label=$label;
    }

    public function getName(){
        return $this->name;
    }

    public function getLabel(){
        return $this->label;
    }
}