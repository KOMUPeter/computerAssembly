<?php
namespace Model;
use Model\Component;
// Creation de class PowerSupply extends Componen
class Screen extends Component {
    protected int $idComponent; 	
    protected float $size; 	

    public function __clone()
    {

    }
	public function getIdComponent(): int {
		return $this->idComponent;
	}
	
	public function setIdComponent(int $idComponent): self {
		$this->idComponent = $idComponent;
		return $this;
	}


	public function getSize(): float {
		return $this->size;
	}

	public function setSize(float $size): self {
		$this->size = $size;
		return $this;
	}
}
?>