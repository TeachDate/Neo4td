<?php
namespace TeachDate\Neo4td\Neo4tdBundle\Entity;
use Everyman\Neo4j\Cypher\Query;
use Everyman\Neo4j\Relationship;
use TeachDate\Neo4td\Neo4tdBundle\Neo4td;

class Relation extends Relationship{
    protected $name;
    protected $label;
    protected $properties;
    public function __construct($name,$label,array $properties=null){
        $this->name=$name;
        $this->label=$label;
        $this->properties=$properties;
    }

    public function getName(){
        return $this->name;
    }

    public function getLabel(){
        return $this->label;
    }

    public function getProperties(){
        return $this->properties;
    }
}