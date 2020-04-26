<?php
const TR_METHOD_BIKE = "Bike";
const TR_METHOD_EBIKE = "EBike";
const TR_METHOD_CAR = "Car";

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

  function getSupportedTransportMethods(){
    return $this->supportedTransportMethods;
  }

  public function __construct($dist, $vert1, $vert2) {
    $this->distance = $dist;
    $this->vertice1 = $vert1;
    $this->vertice2 = $vert2;
  }
}

class Sidewalk extends Edge {
  public $supportedTransportMethods = [TR_METHOD_BIKE];
}

class PavedRoad extends Edge {
  public $supportedTransportMethods = [TR_METHOD_BIKE, TR_METHOD_CAR];
}

class BikeTrail extends Edge {
  public $supportedTransportMethods = [TR_METHOD_BIKE, TR_METHOD_EBIKE];
}

class BikeTrailNoEbike extends BikeTrail {
  public $supportedTransportMethods = [TR_METHOD_BIKE];
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
}




// example implementation
$edges = [new Sidewalk(10, "A", "B"), new PavedRoad(20, "B", "C"), new PavedRoad(100, "A", "C"), new BikeTrailNoEbike(40, "C", "A")];
$vertices = ["A", "B", "C"];
$map = new Map($vertices, $edges);