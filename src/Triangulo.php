<?php

namespace App;

use InvalidArgumentException;

class Triangulo
{
  public function __construct(
    private float $ladoA,
    private float $ladoB,
    private float $ladoC
  ) {
    if ($ladoA <= 0) {
      throw new InvalidArgumentException("O lado A deve ser maior que zero.");
    }

    if ($ladoB <= 0) {
      throw new InvalidArgumentException("O lado B deve ser maior que zero.");
    }

    if ($ladoC <= 0) {
      throw new InvalidArgumentException("O lado C deve ser maior que zero.");
    }
  }

  public function ehValido(): bool
  {
    return $this->ladoA < $this->ladoB + $this->ladoC
      && $this->ladoB < $this->ladoA + $this->ladoC
      && $this->ladoC < $this->ladoA + $this->ladoB;
  }

  public function classificar(): string
  {
    if (!$this->ehValido()) {
      return "Inválido";
    }

    if ($this->ladoA === $this->ladoB && $this->ladoB === $this->ladoC) {
      return "Equilátero";
    }

    if ($this->ladoA === $this->ladoB || $this->ladoA === $this->ladoC || $this->ladoB === $this->ladoC) {
      return "Isósceles";
    }

    return "Escaleno";
  }

  public function perimetro(): float
  {
    if (!$this->ehValido()) {
      throw new InvalidArgumentException("Não é possível calcular o perímetro.");
    }

    return $this->ladoA + $this->ladoB + $this->ladoC;
  }
}
