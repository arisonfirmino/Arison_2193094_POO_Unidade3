<?php

namespace App;

use InvalidArgumentException;

class LampadaInteligente
{
  private bool $ligada = false;
  private int $intensidade = 50;

  public function __construct(
    public string $comodo
  ) {}

  public function ligar(): void
  {
    $this->ligada = true;
  }

  public function desligar(): void
  {
    $this->ligada = false;
  }

  public function ajustarIntensidade(int $valor): bool
  {
    if ($valor < 0 || $valor > 100) {
      throw new InvalidArgumentException("A intensidade deve estar entre 0 e 100.");
    }

    $this->intensidade = $valor;

    return true;
  }

  public function status(): string
  {
    return "Cômodo: {$this->comodo}\n"
      . "Estado: " . ($this->ligada ? "Ligada" : "Desligada") . "\n"
      . "Intensidade: {$this->intensidade}%" . "\n";
  }
}
