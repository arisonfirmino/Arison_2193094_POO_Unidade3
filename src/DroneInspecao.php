<?php

namespace App;

use InvalidArgumentException;

class DroneInspecao
{
  public function __construct(
    public string $modelo,
    private int $bateria,
    private float $distanciaTotal = 0,
    private bool $emVoo = false
  ) {
    if ($bateria < 0 || $bateria > 100) {
      throw new InvalidArgumentException("A bateria deve estar entre 0 e 100.");
    }

    if ($distanciaTotal < 0) {
      throw new InvalidArgumentException("A distância não pode ser negativa.");
    }
  }

  public function decolar(): bool
  {
    if ($this->emVoo) {
      return false;
    }

    if ($this->bateria < 20) {
      return false;
    }

    $this->emVoo = true;

    return true;
  }

  public function voar(float $km): bool
  {
    if ($km <= 0) {
      throw new InvalidArgumentException("A distância deve ser maior que zero.");
    }

    if (!$this->emVoo) {
      return false;
    }

    $distanciaPossivel = $this->bateria / 5;

    if ($km > $distanciaPossivel) {
      $this->distanciaTotal += $distanciaPossivel;
      $this->bateria = 0;

      return false;
    }

    $this->distanciaTotal += $km;
    $this->bateria -= $km * 5;

    return true;
  }

  public function pousar(): bool
  {
    if (!$this->emVoo) {
      return false;
    }

    $this->emVoo = false;

    return true;
  }

  public function recarregar(int $percentual): int
  {
    if ($percentual <= 0) {
      throw new InvalidArgumentException("O percentual de recarga deve ser maior que zero.");
    }

    $bateriaAnterior = $this->bateria;

    $this->bateria += $percentual;

    if ($this->bateria > 100) {
      $this->bateria = 100;
    }

    return $this->bateria - $bateriaAnterior;
  }

  public function status(): string
  {
    return "Modelo: {$this->modelo}\n"
      . "Bateria: {$this->bateria}%\n"
      . "Distância total: {$this->distanciaTotal} Km\n"
      . "Situação: " . ($this->emVoo ? "Em voo" : "Disponível") . "\n";
  }
}
