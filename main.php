<?php
const TR_METHOD_BIKE = "Bike";
const TR_METHOD_CAR = "Car";

class TransportationMethod {
  public $speed = 10;
}

class Bike extends TransportationMethod {
  public $speed = 20;
  public $name = TR_METHOD_BIKE;
}

class Car extends TransportationMethod {
  public $speed = 30;
  public $name = TR_METHOD_CAR;
}


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

class Map {
    public $edges;
    public $vertices;

    function __construct($initialEdges, $initialVertices) {
        $this->edges = $initialEdges;
        $this->vertices = $initialVertices;
    }
}

