<?php

namespace App;

use InvalidArgumentException;

class BateriaDispositivo
{
  public function __construct(
    public string $dispositivo,
    private int $carga
  ) {
    if ($carga < 0 || $carga > 100) {
      throw new InvalidArgumentException("A carga deve estar entre 0 e 100.");
    }
  }

  public function usar(int $minutos): bool
  {
    if ($minutos <= 0) {
      throw new InvalidArgumentException("O tempo de uso deve ser maior que zero.");
    }

    if ($this->carga === 0) {
      return false;
    }

    $cargaNecessaria = 0;

    for ($tempo = 0; $tempo < $minutos; $tempo += 5) {
      $cargaNecessaria++;
    }

    if ($cargaNecessaria > $this->carga) {
      $this->carga = 0;
      return false;
    }

    $this->carga -= $cargaNecessaria;

    return true;
  }

  public function carregar(int $percentual): int
  {
    if ($percentual <= 0) {
      throw new InvalidArgumentException("O percentual de carga deve ser maior que zero.");
    }

    $cargaAnterior = $this->carga;

    $this->carga += $percentual;

    if ($this->carga > 100) {
      $this->carga = 100;
    }

    return $this->carga - $cargaAnterior;
  }

  public function nivel(): int
  {
    return $this->carga;
  }

  public function estaCritica(): bool
  {
    return $this->carga <= 15;
  }

  public function status(): string
  {
    return "Dispositivo: {$this->dispositivo}\n"
      . "Carga: {$this->carga}%\n";
  }
}
