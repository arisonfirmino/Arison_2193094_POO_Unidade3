<?php

namespace App;

use InvalidArgumentException;

class PlanoDados
{
  private float $franquia;
  private float $dadosRestantes;
  private float $totalConsumido = 0;

  public function __construct(
    public string $titular,
    float $franquia
  ) {
    if ($franquia <= 0) {
      throw new InvalidArgumentException("A franquia deve ser maior que zero.");
    }

    $this->franquia = $franquia;
    $this->dadosRestantes = $franquia;
  }

  public function consumir(float $gb): bool
  {
    if ($gb <= 0) {
      throw new InvalidArgumentException("O consumo deve ser maior que zero.");
    }

    if ($gb > $this->dadosRestantes) {
      return false;
    }

    $this->dadosRestantes -= $gb;
    $this->totalConsumido += $gb;

    return true;
  }

  public function comprarPacote(float $gb): bool
  {
    if ($gb <= 0) {
      throw new InvalidArgumentException("O pacote adicional deve ser maior que zero.");
    }

    $this->dadosRestantes += $gb;

    return true;
  }

  public function saldoRestante(): float
  {
    return $this->dadosRestantes;
  }

  public function totalConsumido(): float
  {
    return $this->totalConsumido;
  }

  public function status(): string
  {
    if ($this->dadosRestantes == 0) {
      $situacao = "Sem dados disponíveis";
    } else {
      $situacao = "Dados disponíveis";
    }

    return "Titular: {$this->titular}\n"
      . "Franquia inicial: {$this->franquia} GB\n"
      . "Saldo restante: {$this->dadosRestantes} GB\n"
      . "Total consumido: {$this->totalConsumido} GB\n"
      . "Situação: {$situacao}\n";
  }
}
