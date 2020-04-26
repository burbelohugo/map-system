<?php
const TR_METHOD_BIKE = "Bike";
const TR_METHOD_EBIKE = "EBike";
const TR_METHOD_CAR = "Car";
const EDGE_SIDEWALK = "Sidewalk";
const EDGE_PAVEDROAD = "PavedRoad";
const EDGE_BIKE_TRAIL = "BikeTrail";
const EDGE_BIKE_TRAIL_NO_EBIKE = "BikeTrailNoEbike";

// All valid methods of transportation extend this class
class TransportationMethod {
  public $speed = 10;
}

class Bike extends TransportationMethod {
  public $speed = 20;
  public $name = TR_METHOD_BIKE;
}

class EBike extends Bike {
  public $speed = 30;
  public $name = TR_METHOD_EBIKE;
}

class Car extends TransportationMethod {
  public $speed = 30;
  public $name = TR_METHOD_CAR;
}

// All edge types extend this class, and override the valid transportation methods
class Edge {
  public $supportedTransportMethods = [];
  public $distance;
  public $vertice1;
  public $vertice2;
  public $name;

  function getSupportedTransportMethods(){
    return $this->supportedTransportMethods;
  }

  public function __construct($dist, $vert1, $vert2) {
    $this->distance = $dist;
    $this->vertice1 = $vert1;
    $this->vertice2 = $vert2;
    $this->name = "Edge";
  }

  public function __toString() {
    return sprintf("%s with distance %s, from %s to %s\n", $this->name, $this->distance, $this->vertice1, $this->vertice2);
  }
}

class Sidewalk extends Edge {
  public function __construct($dist, $vert1, $vert2) {
    parent::__construct($dist, $vert1, $vert2);
    $this->supportedTransportMethods = [TR_METHOD_BIKE];
    $this->name = EDGE_SIDEWALK;
  }
}

class PavedRoad extends Edge {
  public function __construct($dist, $vert1, $vert2) {
    parent::__construct($dist, $vert1, $vert2);
    $this->supportedTransportMethods = [TR_METHOD_BIKE, TR_METHOD_CAR];
    $this->name = EDGE_PAVEDROAD;
  }
}

class BikeTrail extends Edge {
  public function __construct($dist, $vert1, $vert2) {
    parent::__construct($dist, $vert1, $vert2);
    $this->supportedTransportMethods = [TR_METHOD_BIKE, TR_METHOD_EBIKE];
    $this->name = EDGE_BIKE_TRAIL;
  }
}

class BikeTrailNoEbike extends BikeTrail {
  public function __construct($dist, $vert1, $vert2) {
    parent::__construct($dist, $vert1, $vert2);
    $this->supportedTransportMethods = [TR_METHOD_BIKE];
    $this->name = EDGE_BIKE_TRAIL_NO_EBIKE;
  }
}

class Vertice {
  public $name;

  function __construct($name) {
    $this->name = $name;
  }
}

class Map {
    public $edges;
    public $vertices;

    function __construct($initialVertices, $initialEdges) {
        $this->vertices = $initialVertices;
        $this->edges = $initialEdges;
    }

    function getShortestDistance($vertA, $vertB, $transportMethod) {
      // path finding algorithm
    }

    function getMap() {
      print(implode($this->edges));
    }
}




// Example implementation

// Each edge contains a distance, plus a starting and ending vertice
$edges = [
  new Sidewalk(10, "A", "B"), 
  new PavedRoad(20, "B", "C"), 
  new PavedRoad(100, "A", "C"), 
  new BikeTrail(120, "A", "C"), 
  new BikeTrailNoEbike(40, "C", "A")
];
// list of vertices
$vertices = ["A", "B", "C"];
$exampleMap = new Map($vertices, $edges);

$exampleMap->getMap();