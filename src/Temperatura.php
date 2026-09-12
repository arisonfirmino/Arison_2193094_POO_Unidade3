<?php

namespace App;

use InvalidArgumentException;

class Temperatura
{
  public function __construct(
    private float $celsius
  ) {}

  public function alterar(float $novoValor): bool
  {
    if ($novoValor < -273.15) {
      throw new InvalidArgumentException("A temperatura não pode ser inferior a -273.15 °C.");
    }

    $this->celsius = $novoValor;

    return true;
  }

  public function emFahrenheit(): float
  {
    return ($this->celsius * 9 / 5) + 32;
  }

  public function emKelvin(): float
  {
    return $this->celsius + 273.15;
  }

  public function descricao(): string
  {
    return "Temperatura em Celsius (°C): {$this->celsius} °C.\n
    Temperatura em Fahrenheit (°F): {$this->emFahrenheit()} °F.\n
    Temperatura em Kelvin (K): {$this->emKelvin()} K.\n";
  }
}
