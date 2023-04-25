<?php
class Perro {
  private int $idPerro;
  private string $nombre;
  private string $microchip;
  private string $sexo; // F para hembras y M para machos
  private DateTime $fechaNacimiento;
  private ?Perro $padre;
  private ?Perro $madre;

  public function __construct(int $idPerro, string $nombre, string $microchip, DateTime $fechaNacimiento, ?Perro $padre = null, ?Perro $madre = null) {
    $this->idPerro = $idPerro;
    $this->nombre = $nombre;
    $this->microchip = $microchip;
    $this->sexo = "F";
    $this->fechaNacimiento = $fechaNacimiento;
    $this->padre = $padre;
    $this->madre = $madre;
  }

  public function getIdPerro(): int {
    return $this->idPerro;
  }

  public function getNombre(): string {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void {
    $this->nombre = $nombre;
  }

  public function getMicrochip(): string {
    return $this->microchip;
  }

  public function setMicrochip(string $microchip): void {
    $this->microchip = $microchip;
  }

  public function getSexo(): string {
    return $this->sexo;
  }

  public function setSexo(string $sexo): void {
    $this->sexo = $sexo;
  }

  public function getFechaNacimiento(): DateTime {
    return $this->fechaNacimiento;
  }

  public function setFechaNacimiento(DateTime $fechaNacimiento): void {
    $this->fechaNacimiento = $fechaNacimiento;
  }

  public function getPadre(): ?Perro {
    return $this->padre;
  }

  public function setPadre(?Perro $padre): void {
    $this->padre = $padre;
  }

  public function getMadre(): ?Perro {
    return $this->madre;
  }

  public function setMadre(?Perro $madre): void {
    $this->madre = $madre;
  }

  public function __toString(): string {
    return "Perro { idPerro: " . $this->idPerro . ", nombre: " . $this->nombre . ", microchip: " . $this->microchip . ", sexo: " . $this->sexo . ", fechaNacimiento: " . $this->fechaNacimiento->format('Y-m-d') . " }";
  }
}

class Propietario {
  private int $idPropietario;
  private ?string $nif;
  private string $nombre;
  private string $apellidos;
  private string $cp;
  private array $perros;

  public function __construct(int $idPropietario, ?string $nif, string $nombre, string $apellidos, string $cp) {
    $this->idPropietario = $idPropietario;
    $this->nif = $nif;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->cp = $cp;
    $this->perros = array();
    }
    
    public function getIdPropietario(): int {
    return $this->idPropietario;
    }
    
    public function getNif(): ?string {
    return $this->nif;
    }
    
    public function setNif(?string $nif): void {
    $this->nif = $nif;
    }
    
    public function getNombre(): string {
    return $this->nombre;
    }
    
    public function setNombre(string $nombre): void {
    $this->nombre = $nombre;
    }
    
    public function getApellidos(): string {
    return $this->apellidos;
    }
    
    public function setApellidos(string $apellidos): void {
    $this->apellidos = $apellidos;
    }
    
    public function getCp(): string {
    return $this->cp;
    }
    
    public function setCp(string $cp): void {
    $this->cp = $cp;
    }
    
    public function getPerros(): array {
    return $this->perros;
    }
    
    public function addPerro(Perro $perro): void {
    array_push($this->perros, $perro);
    }
    
    public function __toString(): string {
    $perrosStr = "";
    foreach($this->perros as $perro) {
    $perrosStr .= $perro->__toString() . ", ";
    }
    return "Propietario { idPropietario: " . $this->idPropietario . ", nif: " . $this->nif . ", nombre: " . $this->nombre . ", apellidos: " . $this->apellidos . ", cp: " . $this->cp . ", perros: [" . rtrim($perrosStr, ", ") . "] }";
    }
    }
    
    // Instanciar la clase y poner en marcha
    $padre = new Perro(1, "Rufus", "123456789", new DateTime("2010-05-20"));
    $madre = new Perro(2, "Lola", "987654321", new DateTime("2012-08-15"));
    $hijo = new Perro(3, "Buddy", "111222333", new DateTime("2020-02-10"), $padre, $madre);
    
    $propietario = new Propietario(1, "12345678A", "Juan", "García Pérez", "28001");
    $propietario->addPerro($hijo);
    
    echo $propietario->__toString() . "\n";
    echo "Madre: " . $hijo->getMadre()->__toString() . "\n";
    echo "Padre: " . $hijo->getPadre()->__toString() . "\n";
    
    
   
    
    // Este código crea la clase Perro con los campos y métodos requeridos, la clase Propietario que incluye un array de perros, y luego instancia y muestra la información de un propietario y un perro, junto con la información de su madre y padre.
    
    
    
    