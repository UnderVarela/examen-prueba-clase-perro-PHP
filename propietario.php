<?php

require_once('./index.php');

class Propietario {
private int $idPropietario;
private ?string $nif;
private string $nombre;
private ?string $apellidos;
private ?string $cp;

public array $perros = [];


function __construct (int $id, 
string $nombre, 
?string $apellidos = null, 
string $nif = '',
?string $cp = '') {

$this->idPropietario = $id;
$this->nombre = $nombre;
$this->apellidos = $apellidos;
$this->nif = $nif;
$this->cp = $cp;
$this->perros = [];

}

function getNombre (): string {
  return $this->nombre;
}

function dimeNombreCompleto (): string {
  return $this->nombre.' '.$this->apellidos;
}

function setPerros (Perro ...$perros) {
  $this->perros = $perros;
}

}

$p = new Propietario(1, "Manolo", "Lopez", );
$p->setPerros($hija, $papi);

echo "Perros que tiene el propietario ".$p->dimeNombreCompleto().":<br>";
foreach($p->perros as $perro) {
  echo $perro;
}
echo '<br>'.count($p->perros).' perros';

// echo "<pre>";
// print_r($p);
// echo "</pre>";