<?php

define('SEXO_PERRO', [
  "h" => "hembra",
  "m" => "macho"
]);

define('SEXO_KEYS',
  array_keys(SEXO_PERRO) // ["h", "m"]
);


class Perro {

private int $idPerro;
private string $nombre;
private ?string $microchip;
private string $sexo; // F para hembras y M para machos
private ?DateTime $fechaNacimiento;
private ?Perro $padre;
private ?Perro $madre;

public function __construct ($idPerro,string $nombre, string $sexo = SEXO_PERRO['h'], ?DateTime $fechaNacimiento =  null) {
  
  $this -> idPerro = $idPerro;
  $this -> nombre = $nombre;
  $this -> sexo = SEXO_KEYS[1];
  $this -> fechaNacimiento = $fechaNacimiento;
}


public function getIdPerro (): int {
  return $this -> idPerro;
}

public function getNombre (): string {
  return $this -> nombre;
}

public function getSexo (): string {
  return SEXO_PERRO[$this->sexo];
}

public function getFechaNacimiento (): DateTime {
return $this -> fechaNacimiento;
}


function setPadre (Perro $perro) : void {
  $this-> padre = $perro;
}

function setMadre (Perro $perro) : void {
  $this-> madre = $perro;
}

function __toString(): string {
  return sprintf("ID: %d <br> Nombre Perro: %s <br> Sexo: %s <br> Fecha de nacimiento: %s <br>Padre: <blockquote>%s</blockquote>Madre: <blockquote>%s</blockquote>", 
  $this->idPerro, 
  $this->nombre,
  $this->getSexo(),
  $this -> fechaNacimiento?->format('d/m/Y')??'Desconocida',
  $this->padre??'Desconocido',
  $this->madre??'Desconocida'
);

}

}

$papi = new Perro (01, "Gus", SEXO_KEYS[1], new DateTime());
$mami = new Perro (05, "Licra", SEXO_KEYS[0], null);


$hija = new Perro(22, 'Flufy', SEXO_KEYS[0], null);
$hija->setPadre($papi);
$hija->setMadre($mami);
// echo $hija;


?>

<!-- <select name="sexo" id="">
  <?php 
  foreach(SEXO_PERRO as $key => $value) {
    echo "<option value='$key'>$value</option>";
  }
  ?>
</select> -->