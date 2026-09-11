<?php

namespace App;

use InvalidArgumentException;

class Retangulo
{
  public function __construct(
    private float $largura,
    private float $altura
  ) {
    if ($largura <= 0) {
      throw new InvalidArgumentException("A largura deve ser maior que zero.");
    }

    if ($altura <= 0) {
      throw new InvalidArgumentException("A altura deve ser maior que zero.");
    }
  }

  public function area(): float
  {
    return $this->largura * $this->altura;
  }

  public function perimetro(): float
  {
    return 2 * ($this->largura + $this->altura);
  }

  public function ehQuadrado(): bool
  {
    return $this->largura === $this->altura;
  }
}
